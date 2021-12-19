<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Classroom;
use Mail;
use App\Teacher;
use App\User;
use App\Club;
use App\Class_subscription;
use App\Class_flyer;
use App\Waitlist_subscription;
use Illuminate\Support\Facades\Auth;
use App\Mail\Classfull;
use App\Mail\Classwaiting;
use App\Mail\Cancelled_subscription;
use App\Mail\Class_subscription_cancel;
use App\Mail\Class_subscription_cancelled;

use DateTime;


class Class_subscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()    
    { 
        $id1 = Auth::id();
        $classes = Classroom::all();
        $now = new DateTime();
        $class_subscription = Class_subscription::where('user_id', $id1)->paginate(10); 
        return view('subscription.index', compact('classes', 'now'), compact('class_subscription'));        
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classes = Classroom::findOrFail($id);
        $classes->payment_option = str_replace('_', ' ', $classes->payment_option);
        $date1 = new DateTime($classes->class_from);
        $date2 = new DateTime($classes->class_till);
        $d = date_diff($date1, $date2);
        if($d->y == 10)
        { 
            $classes->class_till = 'N/A';
        }
        $fly1 = Class_flyer::where('class_id', $id)->first();
        if($fly1)
        {
        $flyer = $fly1->flyer;
        }
        else
        {
        //$fly = null;
        $flyer = null;
        }
        return view('subscription.show', compact('classes', 'flyer'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //if subscription_status is true
        $sub = Class_subscription::find($id);
        $id1 = Auth::id();
        $classes = Classroom::all();
        $class_subscription = Class_subscription::where('user_id', $id1)->get(); 
        if($sub->subscription_status)
        {
            $sub->subscription_status = false;

            $sub->save();
            
            //find classroom_id from class_subscriptions table
            $classroom_id = $sub->classroom_id;
            //find classroom_id from classroom table
            $class2 = Classroom::where('classroom_id', $classroom_id)->first();

            //Update classroom table for seats available and seats booked
            
            $class2->seats_booked = $class2->seats_booked-1;
            $class2->seats_available = $class2->seats_available+1;
            $class2->save();

            //mail
            $user = User::findOrFail($id1);
            
            $teacher = Teacher::findOrFail($class2->teacher_id);
            Mail::to($teacher->email)->send(new Class_subscription_cancel($user, $teacher, $class2));

            
            Mail::to($user->email)->send(new Cancelled_subscription($user, $class2));

            $clubs = Club::findOrFail($class2->club_id);
            Mail::to($clubs->email)->send(new Class_subscription_cancelled($user, $clubs, $class2));

            return redirect()->route('class_enrollment.index')->with('success','You have successfully unsubscribed a class!');        
        }
        else
        {
            return redirect()->route('class_enrollment.index')->with('error','Error! cannot unsubscribe class');           
        }
        
        
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
        //dd(request()->all());
        $classes = Classroom::findOrFail($id);
        //$a = $classes->seats_booked;
        //$sub = ;
        //dd($sub);
        $id1 = Auth::id();
        if(Class_subscription::where('user_id', '=', $id1)->where('subscription_status', '=', 1)->where('classroom_id', '=', $classes->classroom_id)->exists())
        {
            //return redirect()->route('classlist')->with('info','You have already subscribed this class!');
            return redirect()->back()->with('info','You are already enrolled this class!');
            
        }
        elseif(Class_subscription::where('user_id', '=', $id1)->where('subscription_status', '=', 0)->where('classroom_id', '=', $classes->classroom_id)->exists())
        {
            //return redirect()->route('classlist')->with('info','You have already subscribed this class!');
            return redirect()->back()->with('info','Your enrollment has already been cancelled');
            
        }
        else
        {

            if($classes->seats_available)
            {
               
                $class_sub = new Class_subscription;
                $id1 = Auth::id();

                $class_sub->classroom_id = $classes->classroom_id;
                $class_sub->user_id = $id1;
                $class_sub->subscription_id = uniqid('sb',true);
                $class_sub->subscription_status = true;
                $class_sub->is_member = true;

                $classes->seats_booked = $classes->seats_booked+1;
                $classes->seats_available = $classes->seats_available-1;
                $classes->save();          


                $class_sub->save();
                if(!$classes->seats_available)
                {
                    $teacher = Teacher::findOrFail($classes->teacher_id);
                    Mail::to($teacher->email)->send(new Classfull($teacher, $classes));
                }
                return redirect()->route('classlist')->with('success','You are successfully enrolled in a class!'); 
                //->with('success','You have successfully subscribed the class')
            }
            else
            {
                /*$classes->seats_booked = $classes->seats_booked+1;
                $classes->seats_available = $classes->seats_available-1;
                $classes->save();*/

                if(Waitlist_subscription::where('user_id', '=', $id1)->where('classroom_id', '=', $classes->classroom_id)->exists())
                {
                    //return redirect()->route('classlist')->with('info','You have already subscribed this class!');
                    return redirect()->route('classlist')->with('info','You are already enrolled this class!');
                    
                }
                
                $wait = new Waitlist_subscription;
                $id1 = Auth::id();

                $wait->classroom_id = $classes->classroom_id;
                $wait->user_id = $id1;
                $wait->waitlist_id = uniqid('Wl',true);
                //$wait->subscription_status = true;

                $wait->save();
                $user = User::findOrFail($id1);
                $teacher = Teacher::findOrFail($classes->teacher_id);
                Mail::to($teacher->email)->send(new Classwaiting($user, $teacher, $classes));
                return redirect()->route('classlist')->with('info','You have been added to the waiting list of the class'); 

            }
        }

        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //
    }

    public function cancelsubscription(Request $request, $id)
    {
        
        //
    }
    
}
