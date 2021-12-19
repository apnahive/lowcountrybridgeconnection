<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewUserWelcome;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Classroom;
use App\Class_subscription;
use App\Waitlist_subscription;
use App\Game_subscription;
use App\Game;
use App\User;
use App\Club;
use App\Class_series;
use App\Class_category;
use App\Club_subscription;
use App\Game_waitlist_subscription;
use App\Workshop;
use App\Series_subscription;
use DateTime;
use App\Tournament;
use App\Tournament_flyer;
use App\Teacher;
use App\Series_flyer;
use App\Special_game;
use App\Series_class;
use App\Club_membership;
use App\Mail\Cancelled_subscription;
use App\Mail\Class_subscription_cancel;
use App\Mail\Class_subscription_cancelled;
use App\Mail\Message_Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','isVerified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = Auth::user();
       // return view('home', compact('user'));
     //  return redirect('/profile');
        $id1 = Auth::id();        
        $profile = User::find($id1);
        $clubs = Club::all();
        $workshop = Workshop::where('user_id', $id1)->first();
        return view('profile', compact('profile', 'clubs', 'workshop'));
    }
    public function email()
    {
        //send the email
        Mail::to(Auth::user()->email)->send(new NewUserWelcome());
        return redirect('/profile');
    }

    public function showWaiting()
    {        
        $id1 = Auth::id();        
        $classes = Classroom::join('waitlist_subscriptions', 'classrooms.classroom_id', '=', 'waitlist_subscriptions.classroom_id')->where('waitlist_subscriptions.user_id', $id1)->select('classrooms.class_name')->get();

        $games = Game::join('game_waitlist_subscriptions', 'games.game_id', '=', 'game_waitlist_subscriptions.game_id')->where('game_waitlist_subscriptions.user_id', $id1)->select('games.game_name')->get();
        
        return view('waiting', compact('classes', 'games'));
    }

    public function showSeries($id)
    {
        //$classes = Classroom::where('series_id', $id)->get(); 

        $classes = Classroom::leftJoin('series_classes', 'classrooms.classroom_id', '=', 'series_classes.classroom_id')->where('series_classes.series_id', $id)->select('classrooms.class_name', 'series_classes.subscription_status', 'classrooms.classroom_id', 'classrooms.id')->get();


        $series = Class_series::find($id);
        $series->payment_option = str_replace('_', ' ', $series->payment_option);
        $date1 = new DateTime($series->start_date);
        $date2 = new DateTime($series->end_date);
        $d = date_diff($date1, $date2);
        if($d->y == 10)
        {
            $series->end_date = 'N/A'; 
        }
        $fly1 = Series_flyer::where('series_id', $id)->first();
        if($fly1)
        {
        $flyer = $fly1->flyer;
        }
        else
        {
        //$fly = null;
        $flyer = null;
        }
        //dd($series->end_date);
        return view('series', compact('classes', 'series', 'flyer'));
    }

    public function seriesEnroll()
    {
        //dd('series enrollment');
        $id1 = Auth::id();
        $series = Series_subscription::leftJoin('class_series', 'series_subscriptions.series_id', '=', 'class_series.id')->where('user_id', '=', $id1)->select('class_series.name', 'class_series.start_date', 'series_subscriptions.subscription_status', 'class_series.id', 'class_series.end_date')->get();
        $now = new DateTime();
        return view('series_enroll', compact('series', 'now')); 
    }

    public function classUnsub($id)
    {
        $classes = Series_class::where('series_id', '=', $id)->select('classroom_id')->get();
            //dd($classes);
        $unsub = 0;

        foreach ($classes as $classkey => $class) 
        {
            $classroomid = $class->classroom_id;
            $id1 = Auth::id();
            $sub = Class_subscription::where('user_id', '=', $id1)->where('classroom_id', '=', $classroomid)->first();
            
            if($sub->subscription_status)
            {
                $sub->subscription_status = false;

                $sub->save();
                //dd($sub);
                //find classroom_id from class_subscriptions table
                $classroom_id = $sub->classroom_id;
                //find classroom_id from classroom table
                $class2 = Classroom::where('classroom_id', $classroom_id)->first();

                //Update classroom table for seats available and seats booked
                
                $class2->seats_booked = $class2->seats_booked-1;
                $class2->seats_available = $class2->seats_available+1;
                $class2->save();

                //mail
                $teacher = Teacher::findOrFail($class2->teacher_id);
                Mail::to($teacher->email)->send(new Class_subscription_cancel($teacher, $class2));

                $user = User::findOrFail($id1);
                Mail::to($user->email)->send(new Cancelled_subscription($user, $class2));

                $clubs = Club::findOrFail($class2->club_id);
                Mail::to($clubs->email)->send(new Class_subscription_cancelled($clubs, $class2));

                //return redirect()->route('class_enrollment.index')->with('success','You have successfully unsubscribed a class!');        
            }
            else
            {
                $unsub ++;
            }
            
        }
        return $unsub;
    }



    public function seriesEnrolls($id)
    {
        //dd('series cancelled');        
        $id1 = Auth::id();
        if(Series_subscription::where('series_id', '=', $id)->where('user_id', '=', $id1)->where('is_member', '=', 1)->exists())
        {
            $series_subscription = Series_subscription::where('series_id', '=', $id)->where('user_id', '=', $id1)->where('is_member', '=', 1)->first();
            $series_subscription->subscription_status = false;

            $unsubscribed = $this->classUnsub($id);
            $series_subscription->save();
        }
         $message = 'Series unsubscribed. And '.$unsubscribed.' classes are not unsubscribed due to error';
            return redirect()->back()->with('success', $message);


    }

    public function seriesSubscription($id)
    {
        //$classes = Classroom::where('series_id', $id)->get();
        $id1 = Auth::id();
        if(Series_subscription::where('user_id', '=', $id1)->where('series_id', '=', $id)->where('is_member', '=', 1)->exists())
        {
            return redirect()->back()->with('info', 'Series is already subscribed');
        }
        else
        {
            $series = new Series_subscription;
            $series->user_id = $id1;
            $series->subscription_id = uniqid('ser',true);
            $series->series_id = $id;
            $series->subscription_status = true;
            $series->is_member = true;
            $series->save();

            $classes = Classroom::leftJoin('series_classes', 'classrooms.classroom_id', '=', 'series_classes.classroom_id')->where('series_classes.series_id', $id)->select('classrooms.class_name', 'series_classes.subscription_status', 'classrooms.classroom_id', 'classrooms.id', 'classrooms.seats_available', 'classrooms.seats_booked', 'classrooms.teacher_id')->get();

            $already_subscribed = 0;
            $subscribed = 0;
            $waiting = 0;
            foreach ($classes as $classkey => $class)
            {
                $id1 = Auth::id();
                if(Class_subscription::where('user_id', '=', $id1)->where('classroom_id', '=', $class->classroom_id)->exists())
                {
                    $already_subscribed++;
                }
                else
                {

                    if($class->seats_available)
                    {
                       
                        $class_sub = new Class_subscription;
                        $id1 = Auth::id();

                        $class_sub->classroom_id = $class->classroom_id;
                        $class_sub->user_id = $id1;
                        $class_sub->subscription_id = uniqid('sb',true);
                        $class_sub->subscription_status = true;
                        $class_sub->is_member = true;

                        $class->seats_booked = $class->seats_booked+1;
                        $class->seats_available = $class->seats_available-1;
                        $class->save();          


                        $class_sub->save();
                        if(!$class->seats_available)
                        {
                            $teacher = Teacher::findOrFail($class->teacher_id);
                            Mail::to($teacher->email)->send(new Classfull($teacher, $class));
                        }
                        $subscribed++;
                        //->with('success','You have sucessfully subscribed the class')
                    }
                    else
                    {
                        $wait = new Waitlist_subscription;
                        $id1 = Auth::id();

                        $wait->classroom_id = $class->classroom_id;
                        $wait->user_id = $id1;
                        $wait->waitlist_id = uniqid('Wl',true);
                        //$wait->subscription_status = true;

                        $wait->save();
                        $teacher = Teacher::findOrFail($class->teacher_id);
                        Mail::to($teacher->email)->send(new Classwaiting($teacher, $class));
                        $waiting++;
                    }
                }
            }       
            $message = 'You’ve successfully enrolled! You are currently in a waiting list for '.$waiting.' classes'; 
            return redirect()->back()->with('success', $message); 
        }
    }

    public function getSummer()
    {
        $seasons = new \stdClass();    
        $seasons->name = 'summer';
        $now = new \DateTime();
        $seasons->clubs = Classroom::join('clubs', 'classrooms.club_id', '=', 'clubs.id')->whereMonth('class_from', '>=', '06')->whereMonth('class_from', '<=', '08')->where('class_till', '>=', $now)->where('class_status', '=', 1)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        $series_club = Class_series::join('clubs', 'class_series.club_id', '=', 'clubs.id')->whereMonth('start_date', '>=', '06')->whereMonth('start_date', '<=', '08')->where('end_date', '>=', $now)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        $seasons->clubs = $seasons->clubs->merge($series_club);

        $class = Series_class::select('classroom_id')->get();
        foreach ($seasons->clubs as $clubkey => $club) 
        {
            $club->classes = Classroom::whereNotIn('classroom_id', $class)->where('club_id', '=', $club->id)->whereMonth('class_from', '>=', '06')->whereMonth('class_from', '<=', '08')->where('class_till', '>=', $now)->where('class_status', '=', 1)->select('class_name', 'id')->get();
            $club->series = Class_series::where('club_id', '=', $club->id)->whereMonth('start_date', '>=', '06')->whereMonth('start_date', '<=', '08')->select('name', 'id')->get();
        }
        return $seasons;
    }
    public function getFall()
    {
        $seasons = new \stdClass();    
        $seasons->name = 'fall';

        $now = new \DateTime();
        //$class1 = Classroom::where('class_till', '>=', $now)->get();
        //dd($class1);

        $seasons->clubs = Classroom::join('clubs', 'classrooms.club_id', '=', 'clubs.id')->whereMonth('class_from', '>=', '09')->whereMonth('class_from', '<=', '11')->where('class_till', '>=', $now)->where('class_status', '=', 1)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        $series_club = Class_series::join('clubs', 'class_series.club_id', '=', 'clubs.id')->whereMonth('start_date', '>=', '09')->whereMonth('start_date', '<=', '11')->where('end_date', '>=', $now)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        $seasons->clubs = $seasons->clubs->merge($series_club);
        //dd($seasons->clubs);
        $class = Series_class::select('classroom_id')->get();
        foreach ($seasons->clubs as $clubkey => $club) 
        {
            
            $club->classes = Classroom::whereNotIn('classroom_id', $class)->where('club_id', '=', $club->id)->whereMonth('class_from', '>=', '09')->whereMonth('class_from', '<=', '11')->where('class_till', '>=', $now)->where('class_status', '=', 1)->select('class_name', 'id')->get();
            //dd($club->classes);
            $club->series = Class_series::where('club_id', '=', $club->id)->whereMonth('start_date', '>=', '09')->whereMonth('start_date', '<=', '11')->select('name', 'id')->get();
        }
        return $seasons;
    }
    public function getWinter()
    {
        $seasons = new \stdClass();    
        $seasons->name = 'winter';
        $now = new \DateTime();
        $janfeb = Classroom::join('clubs', 'classrooms.club_id', '=', 'clubs.id')->whereMonth('class_from', '>=', '01')->whereMonth('class_from', '<=', '02')->where('class_till', '>=', $now)->where('class_status', '=', 1)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        $dec = Classroom::join('clubs', 'classrooms.club_id', '=', 'clubs.id')->whereMonth('class_from', '=', '12')->where('class_till', '>=', $now)->where('class_status', '=', 1)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        $series_jan = Class_series::join('clubs', 'class_series.club_id', '=', 'clubs.id')->whereMonth('start_date', '>=', '01')->whereMonth('start_date', '<=', '02')->where('end_date', '>=', $now)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        $series_dec = Class_series::join('clubs', 'class_series.club_id', '=', 'clubs.id')->whereMonth('start_date', '>=', '12')->where('end_date', '>=', $now)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        
        $seasons->clubs = $janfeb->merge($dec);
        $seasons->clubs = $seasons->clubs->merge($series_jan);
        $seasons->clubs = $seasons->clubs->merge($series_dec);
        //dd($dec);
        /*$seasons->clubs = Classroom::join('clubs', 'classrooms.club_id', '=', 'clubs.id')->whereMonth('class_from', '>=', '01')->whereMonth('class_from', '<=', '02')->select('clubs.id', 'clubs.club_name')->distinct()->get();*/

        $class = Series_class::select('classroom_id')->get();
        foreach ($seasons->clubs as $clubkey => $club) 
        {
            $classjanfeb = Classroom::whereNotIn('classroom_id', $class)->where('club_id', '=', $club->id)->whereMonth('class_from', '>=', '01')->whereMonth('class_from', '<=', '02')->where('class_till', '>=', $now)->where('class_status', '=', 1)->select('class_name', 'id')->get();
            $classdec = Classroom::whereNotIn('classroom_id', $class)->where('club_id', '=', $club->id)->whereMonth('class_from', '=', '12')->where('class_till', '>=', $now)->where('class_status', '=', 1)->select('class_name', 'id')->get();
            $seriesjanfeb = Class_series::where('club_id', '=', $club->id)->whereMonth('start_date', '>=', '01')->whereMonth('start_date', '<=', '02')->select('name', 'id')->get();
            $seriesdec = Class_series::where('club_id', '=', $club->id)->whereMonth('start_date', '=', '12')->select('name', 'id')->get();

            
            $club->classes = $classjanfeb->merge($classdec);
            $club->series = $seriesjanfeb->merge($seriesdec);
            //dd($club->classes);
        }
        //dd($seasons);
        return $seasons;
    }
    public function getSpring()
    {
        $seasons = new \stdClass();    
        $seasons->name = 'spring';
        $now = new \DateTime();
        $seasons->clubs = Classroom::join('clubs', 'classrooms.club_id', '=', 'clubs.id')->whereMonth('class_from', '>=', '03')->whereMonth('class_from', '<=', '05')->where('class_till', '>=', $now)->where('class_status', '=', 1)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        $series_club = Class_series::join('clubs', 'class_series.club_id', '=', 'clubs.id')->whereMonth('start_date', '>=', '03')->whereMonth('start_date', '<=', '05')->where('end_date', '>=', $now)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        $seasons->clubs = $seasons->clubs->merge($series_club);
        $class = Series_class::select('classroom_id')->get();
        foreach ($seasons->clubs as $clubkey => $club) 
        {
            $club->classes = Classroom::whereNotIn('classroom_id', $class)->where('club_id', '=', $club->id)->whereMonth('class_from', '>=', '03')->whereMonth('class_from', '<=', '05')->where('class_till', '>=', $now)->where('class_status', '=', 1)->select('class_name', 'id')->get();
            $club->series = Class_series::where('club_id', '=', $club->id)->whereMonth('start_date', '>=', '03')->whereMonth('start_date', '<=', '05')->select('name', 'id')->get();
        }
        return $seasons;
    }

    public function showClass()
    {
       
        $data[] = null; 
        $now = new DateTime();
        $month = $now->format('m');
        if($month == '06' || $month == '07' || $month == '08')
        {
            $data[0] = $this->getSummer(); //$seasons;
            $data[1] = $this->getFall();
            $data[2] = $this->getWinter();
            $data[3] = $this->getSpring();
        }  
        if($month == '09' || $month == '10' || $month == '11')
        {
            $data[3] = $this->getSummer(); //$seasons;
            $data[0] = $this->getFall();
            $data[1] = $this->getWinter();
            $data[2] = $this->getSpring();
        }  
        if($month == '01' || $month == '02' || $month == '12')
        {
            $data[2] = $this->getSummer(); //$seasons;
            $data[3] = $this->getFall();
            $data[0] = $this->getWinter();
            $data[1] = $this->getSpring();
        }  
        if($month == '03' || $month == '04' || $month == '05')
        {
            $data[1] = $this->getSummer(); //$seasons;
            $data[2] = $this->getFall();
            $data[3] = $this->getWinter();
            $data[0] = $this->getSpring();
        }       
        
        return view('classes', compact('data'));
    }


    public function getSummerGame()
    {
        $seasons = new \stdClass();    
        $seasons->name = 'summer';
        $now = new \DateTime();
        $seasons->clubs = Game::join('clubs', 'games.club_id', '=', 'clubs.id')->whereMonth('game_date', '>=', '06')->whereMonth('game_date', '<=', '08')->where('game_date', '>=', $now)->where('game_status', '=', 1)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        
        foreach ($seasons->clubs as $clubkey => $club) 
        {
            $club->games = Game::where('club_id', '=', $club->id)->whereMonth('game_date', '>=', '9')->whereMonth('game_date', '<=', '11')->where('game_date', '>=', $now)->where('game_status', '=', 1)->select('game_name', 'id')->get();
        }
        return $seasons;
    }

    public function getFallGame()
    {
        $seasons = new \stdClass();    
        $seasons->name = 'fall';
        $now = new \DateTime();
        $seasons->clubs = Game::join('clubs', 'games.club_id', '=', 'clubs.id')->whereMonth('game_date', '>=', '09')->whereMonth('game_date', '<=', '11')->where('game_date', '>=', $now)->where('game_status', '=', 1)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        
        foreach ($seasons->clubs as $clubkey => $club) 
        {
            $club->games = Game::where('club_id', '=', $club->id)->whereMonth('game_date', '>=', '09')->whereMonth('game_date', '<=', '11')->where('game_date', '>=', $now)->where('game_status', '=', 1)->select('game_name', 'id')->get();
        }
        return $seasons;
    }
    public function getWinterGame()
    {
        $seasons = new \stdClass();    
        $seasons->name = 'winter';
        $now = new \DateTime();
        $janfeb = Game::join('clubs', 'games.club_id', '=', 'clubs.id')->whereMonth('game_date', '<=', '02')->where('game_date', '>=', $now)->where('game_status', '=', 1)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        $dec = Game::join('clubs', 'games.club_id', '=', 'clubs.id')->whereMonth('game_date', '=', '12')->where('game_date', '>=', $now)->where('game_status', '=', 1)->select('clubs.id', 'clubs.club_name')->distinct()->get();

        $seasons->clubs = $janfeb->merge($dec);
        
        foreach ($seasons->clubs as $clubkey => $club) 
        {
            $gamejanfeb = Game::where('club_id', '=', $club->id)->whereMonth('game_date', '>=', '01')->whereMonth('game_date', '<=', '02')->where('game_date', '>=', $now)->where('game_status', '=', 1)->select('game_name', 'id')->get();
            $gamedec = Game::where('club_id', '=', $club->id)->whereMonth('game_date', '>=', '01')->whereMonth('game_date', '=', '12')->where('game_date', '>=', $now)->where('game_status', '=', 1)->select('game_name', 'id')->get();
            $club->games = $gamejanfeb->merge($gamedec);
        }
        //dd($seasons);
        return $seasons;
    }
    public function getSpringGame()
    {
        $seasons = new \stdClass();    
        $seasons->name = 'spring';
        $now = new \DateTime();
        $seasons->clubs = Game::join('clubs', 'games.club_id', '=', 'clubs.id')->whereMonth('game_date', '>=', '03')->whereMonth('game_date', '<=', '05')->where('game_date', '>=', $now)->where('game_status', '=', 1)->select('clubs.id', 'clubs.club_name')->distinct()->get();
        
        foreach ($seasons->clubs as $clubkey => $club) 
        {
            $club->games = Game::where('club_id', '=', $club->id)->whereMonth('game_date', '>=', '03')->whereMonth('game_date', '<=', '05')->where('game_date', '>=', $now)->where('game_status', '=', 1)->select('game_name', 'id')->get();
        }
        return $seasons;
    }

    public function showGame()
    {
        $data[] = null;
        $now = new DateTime();
        $month = $now->format('m');
        if($month == '06' || $month == '07' || $month == '08')
        {
            $data[0] = $this->getSummerGame(); //$seasons;
            $data[1] = $this->getFallGame();
            $data[2] = $this->getWinterGame();
            $data[3] = $this->getSpringGame();
        }
        if($month == '09' || $month == '10' || $month == '11')
        {
            $data[3] = $this->getSummerGame(); //$seasons;
            $data[0] = $this->getFallGame();
            $data[1] = $this->getWinterGame();
            $data[2] = $this->getSpringGame();
        }
        if($month == '01' || $month == '02' || $month == '12')
        {
            $data[2] = $this->getSummerGame(); //$seasons;
            $data[3] = $this->getFallGame();
            $data[0] = $this->getWinterGame();
            $data[1] = $this->getSpringGame();
        }
        if($month == '03' || $month == '04' || $month == '05')
        {
            $data[1] = $this->getSummerGame(); //$seasons;
            $data[2] = $this->getFallGame();
            $data[3] = $this->getWinterGame();
            $data[0] = $this->getSpringGame();
        }


        
        //dd($data);
        $counter = 1;
        foreach ($data as $datakey => $value) {
            if(count($value->clubs) > 0)
                $counter = 0;
        }
        

        //dd($counter);
        $special_games = Special_game::all();
        $tournaments = Tournament::all();
        foreach ($tournaments as $tournamentkey => $tournament) {
            if(Tournament_flyer::where('tournament_id', $tournament->id)->exists())
            {
                $tour = Tournament_flyer::where('tournament_id', $tournament->id)->first();
                $tournament->flyer1 = $tour->flyer;
            }
        }
        return view('games', compact('data', 'special_games', 'tournaments', 'counter'));        
    }

    public function showContact()
    {
        return view('contact');
    }

    public function showProfile()
    {
        $id1 = Auth::id();        
        $profile = User::find($id1);
        $clubs = Club::all();
        foreach ($clubs as $clubkey => $club) {
            $club->name = strtolower($club->club_name);
            $club->name = preg_replace("/[^a-z0-9_\s-]/", "", $club->name);            
            $club->name = preg_replace("/[\s-]+/", " ", $club->name);            
            $club->name = preg_replace("/[\s_]/", "_", $club->name);
            $club->subscription = Club_subscription::where('user_id', $id1)->where('club_id', '=', $club->id)->first();
        }
        //dd($clubs);
        $membership = Club_membership::where('user_id', $id1)->first();
        $workshop = Workshop::where('user_id', $id1)->first();
        return view('profile', compact('profile', 'clubs', 'workshop', 'membership'));        
    }

    public function showNews()
    {
        return view('news');
    }
    
    public function messagex(Request $request)
    {
        /*dd(request()->all());
        dd('send mail');*/
        $this->validate($request, array(
            'message'=> 'required|max:1024'
        ));
        $data = [
      'msg' => $request->message,
        ];
        
      //  $msg1 = $request->message;
        //dd($request->message);   
        $id1 = Auth::id();
        $user = User::find($id1);
        Mail::to('unit.admin@lowcountrybridgeconnection.com')->send(new Message_Admin($data, $user));
        return redirect()->back()->with('success', 'Your message is been send to administrator');
    }

    public function getclass($filename)
    {
        /*$user = Auth::check();
        dd($user);*/
        //$user = Session::get('user');
        //dd($user);
        $fullpath="flyer/class/{$filename}";
        return response()->download(storage_path($fullpath), null, [], null);
    }
    public function getseries($filename)
    {
        /*$user = Auth::check();
        dd($user);*/
        //$user = Session::get('user');
        //dd($user);
        $fullpath="flyer/series/{$filename}";
        return response()->download(storage_path($fullpath), null, [], null);
    }
    public function gettournament($filename)
    {
        /*$user = Auth::check();
        dd($user);*/
        //$user = Session::get('user');
        //dd($user);
        $fullpath="flyer/tournament/{$filename}";
        return response()->download(storage_path($fullpath), null, [], null);
    }

}


