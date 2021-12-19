<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\User;
use App\Class_subscription;
use App\Classroom;
use App\Class_series;
use App\Series_subscription;
use App\Waitlist_subscription;
use Illuminate\Support\Facades\Auth;
use App\Series_class;

class Unitclass_subscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:unitadmin');
    }
    
    public function index()
    {
        //$id1 = Auth::id();
        $classes = Classroom::where('class_status', '=', 1)->get();        
        //$classes = Classroom::all(); 
        foreach ($classes as $classkey => $class) {
            if(Series_class::where('classroom_id', $class->classroom_id)->exists())
            {
                $class_series = Series_class::where('classroom_id', $class->classroom_id)->first();   
                $series =  Class_series::find($class_series->series_id);
                $class->series_name = $series->name;
            }
            else
            {
                $class->series_name = 'N/A';
            }
        }
        return view('unitclasssub.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $players = Player::all();
        $classes = Classroom::where('seats_available', '>=', 1)->where('class_status', '=', 1)->get();
        return view('unitclasssub.create', compact('players'), compact('classes'));
    }
    public function create1()
    {
        //
        $members = User::all();
        $classes = Classroom::where('seats_available', '>=', 1)->where('class_status', '=', 1)->get();
        return view('unitclasssub.create1', compact('members'), compact('classes'));
    }
    public function select()
    {
        return view('unitclasssub.inter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request()->all());
        $this->validate($request, array(
            'class_name'=> 'required|max:255',
            'player_name'=> 'required|max:255'           
        ));
        $classid = $request->class_name;
        $playerid = $request->player_name;
        $classes = Classroom::findOrFail($classid);
        //$players = Class_subscription::where('user_id', $playerid)->get();
        //$a = $classes->seats_booked;
        //check if player_id exists in class_subscription and is not a member
        //show message that player already enrolled in class
      
        $player_id = Class_subscription::where('user_id', '=', $playerid)->where('classroom_id', '=', $classes->classroom_id)->where('is_member', '=', '0')->first(); 
      //  $class_subscription1 = Class_subscription::findOrFail($classid);
        if($player_id)
            {
                return redirect()->route('unitclass_subscription.create')->with('success','Player already enrolled in class'); 
            }
        else{
            if($classes->seats_available)
        {
           
            $class_sub = new Class_subscription;
            $class_sub->classroom_id = $classes->classroom_id;
            $class_sub->user_id = $playerid;
            $class_sub->subscription_id = uniqid('sb',true);
            $class_sub->subscription_status = true;
            $class_sub->is_member = false;

            $classes->seats_booked = $classes->seats_booked+1;
            $classes->seats_available = $classes->seats_available-1;
            $classes->save();


            $class_sub->save();
            return redirect()->route('unitclass_subscription.index')->with('success','You have successfully enrolled the class'); 
            //->with('success','You have sucessfully subscribed the class')
        }        
        } 

        
        
        
    }
    public function store1(Request $request)
    {
         $this->validate($request, array(
            'class_name'=> 'required|max:255',
            'member_name'=> 'required|max:255'           
        ));
        //dd(request()->all());
        $classid = $request->class_name;
        $memberid = $request->member_name;
        $classes = Classroom::findOrFail($classid);
        //$a = $classes->seats_booked;
        $member_id = Class_subscription::where('user_id', '=', $memberid)->where('classroom_id', '=', $classes->classroom_id)->where('is_member', '=', '1')->first(); 
      //  $class_subscription1 = Class_subscription::findOrFail($classid);
        if($member_id){
                return redirect()->route('unitclass_subscription.create1')->with('success','Member already enrolled in class'); 
            }
        
        else{
          if($classes->seats_available)
          {
             
              $class_sub = new Class_subscription;
              $class_sub->classroom_id = $classes->classroom_id;
              $class_sub->user_id = $memberid;
              $class_sub->subscription_id = uniqid('sb',true);
              $class_sub->subscription_status = true;
              $class_sub->is_member = true;

              $classes->seats_booked = $classes->seats_booked+1;
              $classes->seats_available = $classes->seats_available-1;
              $classes->save();


              $class_sub->save();
              return redirect()->route('unitclass_subscription.index')->with('success','Member has successfully enrolled the class');
              //->with('success','You have sucessfully subscribed the class')
          }
        }
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd(request()->all());
        $classes = Classroom::findOrFail($id);
        //return view('playerclass.show', ['classes' => $classes]);
        $classid = $classes->classroom_id;
        $class_sub = Class_subscription::all();
        //where('classroom_id', $classid)->get();
        $players = Player::all();
        $users = User::all();
        //return view('playerclass.show', ['users' => $users]);
        //return view('playerclass.show', ['class_sub' => $class_sub], ['users' => $users], ['classid' => $classid], ['players' => $players]); 
        return view('unitclasssub.show', compact('class_sub', 'users', 'classid', 'players', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $players = Player::find($id);
         $classes = Classroom::where('class_status', '=', 1)->where('seats_available', '>=', 1)->get();
         $series = Class_series::select('id', 'name')->get();
         return view('unitclasssub.edit', compact('players', 'series'), compact('classes'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       if($request->class_name)
        {
            $classid = $request->class_name;
            $classes = Classroom::findOrFail($classid);
            //$a = $classes->seats_booked;
            if($classes->seats_available)
            {
               
                $class_sub = new Class_subscription;
                $class_sub->classroom_id = $classes->classroom_id;
                $class_sub->user_id = $id;
                $class_sub->subscription_id = uniqid('sb',true);
                $class_sub->subscription_status = true;
                $class_sub->is_member = false;

                $classes->seats_booked = $classes->seats_booked+1;
                $classes->seats_available = $classes->seats_available-1;
                $classes->save();


                $class_sub->save();
                return redirect()->route('playerunits.index')->with('success','You have successfully enrolled the class'); 
                //->with('success','You have sucessfully subscribed the class')
            }
        }
        else if($request->series_name)
        {
           
            if(Series_subscription::where('user_id', '=', $id)->where('series_id', '=', $request->series_name)->where('is_member', '=', 0)->exists())
            {
                return redirect()->back()->with('info', 'Series is already subscribed');
            }
            else
            {
                $series = new Series_subscription;
                $series->user_id = $id;
                $series->subscription_id = uniqid('ser',true);
                $series->series_id = $request->series_name;
                $series->subscription_status = true;
                $series->is_member = false;
                $series->save();

                $message = 'Series Sucessfully subscribed. Except these classes, '; 

                $classes = Classroom::leftJoin('series_classes', 'classrooms.classroom_id', '=', 'series_classes.classroom_id')->where('series_classes.series_id', $request->series_name)->select('classrooms.class_name', 'series_classes.subscription_status', 'classrooms.classroom_id', 'classrooms.id', 'classrooms.seats_available', 'classrooms.seats_booked', 'classrooms.teacher_id')->get();

                $already_subscribed = 0;
                $subscribed = 0;
                $waiting = 0;
                foreach ($classes as $classkey => $class)
                {
                    
                    if(Class_subscription::where('user_id', '=', $id)->where('is_member', '=', 0)->where('classroom_id', '=', $class->classroom_id)->exists())
                    {
                        $already_subscribed ++;
                       
                    }
                    else
                    {

                        if($class->seats_available)
                        {
                           
                            $class_sub = new Class_subscription;
                            //$id1 = Auth::id();

                            $class_sub->classroom_id = $class->classroom_id;
                            $class_sub->user_id = $id;
                            $class_sub->subscription_id = uniqid('sb',true);
                            $class_sub->subscription_status = true;
                            $class_sub->is_member = false;

                            $class->seats_booked = $class->seats_booked+1;
                            $class->seats_available = $class->seats_available-1;
                            $class->save();          


                            $class_sub->save();
                            if(!$class->seats_available)
                            {
                                $teach = $class->teacher_id;
                                $teacher = Teacher::findOrFail($teach);
                                Mail::to($teacher->email)->send(new Classfull($teacher, $class));
                            }
                            $subscribed++;
                           
                        }
                        else
                        {
                            //waiting code
                        }
                    }
                } 

                $message = 'Series Successfully enrolled. Except '.$already_subscribed.' classes as they are already subscribed';
                
                return redirect()->back()->with('success', $message); 
            }
        }
        else
        {
            //dd("none selected");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd(request()->all());
        $classes = Classroom::findOrFail($id);
        $classes->class_status = false;
        $class_sub = Class_subscription::where('classroom_id', $classes->classroom_id)->where('subscription_status', '=', 1)->get();
        foreach ($class_sub as $key => $value) {
            $sub = Class_subscription::find($value->id);
            $sub->subscription_status = false;

            $sub->save();
            $classes->seats_booked = $classes->seats_booked-1;
            $classes->seats_available = $classes->seats_available+1;
        }
        $classes->save();

        return redirect()->route('unitclass_subscription.index')->with('success','You have cancelled the class');

    } 
    public function destroy1($id)
    {
        //dd(request()->all());
        $class_sub = Class_subscription::find($id);
        $class = Classroom::where('classroom_id', '=', $class_sub->classroom_id)->first();        
        $class->seats_available = $class->seats_available+1;; 
        $class->seats_booked = $class->seats_booked-1;
        $class->save();
        $class_sub->delete();

        return redirect()->route('unitclass_subscription.index')->with('success','You have cancelled the enrollment');

    }
}
