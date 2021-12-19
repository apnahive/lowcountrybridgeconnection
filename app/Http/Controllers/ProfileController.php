<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Workshop;
use App\Club_membership;
use App\Club_subscription;
use App\Club;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
        dd(request()->all());
    }
    public function processText($text)
    {
        //code to convert spaces to underscore
        $text = strtolower($text);
        //Make alphanumeric (removes all other characters)
        $text = preg_replace("/[^a-z0-9_\s-]/", "", $text);
        //Clean up multiple dashes or whitespaces
        $text = preg_replace("/[\s-]+/", " ", $text);
        //Convert whitespaces and underscore to dash
        $text = preg_replace("/[\s_]/", "_", $text);
        return $text;
    }

    public function processACBL($acbl)
    {
        $acbl = (int)$acbl;
        $acbl = "$acbl";
        //$ac = $acbl->toArray();
        //dd($acbl[0]);
        if($acbl[0] == '1')
        {
            $acbl[0] = 'J';
            return $acbl;
        }
        if($acbl[0] == '2')
        {
            $acbl[0] = 'K';
            return $acbl;
        }
        if($acbl[0] == '3')
        {
            $acbl[0] = 'L';
            return $acbl;
        }
        if($acbl[0] == '4')
        {
            $acbl[0] = 'M';
            return $acbl;
        }
        if($acbl[0] == '5')
        {
            $acbl[0] = 'N';
            return $acbl;
        }
        if($acbl[0] == '6')
        {
            $acbl[0] = 'O';
            return $acbl;
        }
        if($acbl[0] == '7')
        {
            $acbl[0] = 'P';            
            return $acbl;
        }
        if($acbl[0] == '8')
        {
            $acbl[0] = 'Q';            
            return $acbl;
        }
        if($acbl[0] == '9')
        {
            $acbl[0] = 'R';            
            return $acbl;
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
        //
        $profile = User::find($id);
        if($request->input('club'))
        {
            //dd(request()->all());
            $clubs = Club::all();

            foreach ($clubs as $clubkey => $club) {
                $name = $this->processText($club->club_name);
                if(Club_subscription::where('user_id', '=', $id)->where('club_id', '=', $club->id)->exists())
                {
                    $club_subscription = Club_subscription::where('user_id', '=', $id)->where('club_id', '=', $club->id)->first();
                    //$name = $this->processText($club->club_name);
                   
                   if($request->$name === 'true')
                    {
                        $club_subscription->subscription_status = true;
                     }
                    else if($request->$name === 'false')
                    {
                        $club_subscription->subscription_status = false;
                    }
                    $club_subscription->save();
                }
                else
                {
                    $club_subscription = new Club_subscription;
                    $club_subscription->club_id = $club->id;
                    $club_subscription->subscription_id = uniqid('club',true);
                    $club_subscription->user_id = $id;
                   
                   if($request->$name === 'true')
                    {
                        $club_subscription->subscription_status = true;
                     }
                    else if($request->$name === 'false')
                    {
                        $club_subscription->subscription_status = false;
                    }
                    $club_subscription->save();
                }
            }

            /*if(Club_membership::where('user_id', '=', $id)->exists())
            {
                $club_membership = Club_membership::where('user_id', '=', $id)->first();
                foreach ($clubs as $clubkey => $club) 
                {
                   $name = $this->processText($club->club_name);
                   
                   if($request->$name === 'true')
                    {
                        $club_membership->$name = true;
                     }
                    else if($request->$name === 'false')
                    {
                        $club_membership->$name = false;
                    }
                   
                    
                }
                
                $club_membership->save();
                
            }
            else
            {
                $club_memberships = new Club_membership;
                $club_memberships->user_id = $id;
                foreach ($clubs as $clubkey => $club) 
                {
                    $name = $this->processText($club->club_name);
                
                    if($request->$name === 'true')
                    {
                        $club_memberships->$name = true;
                     }
                    else if($request->$name === 'false')
                    {
                        $club_memberships->$name = false;
                    }
                }
                $club_memberships->save();
            }*/
            return redirect()->route('profile')->with('success','You have successfully updated clubs profile');
        }






        if($request->input('name'))
        {
            $this->validate($request, array(
                'name'=> 'required|max:255',            
                'lastname'=> 'required|max:255',
                /*'city'=> 'required|max:255',
                'state'=> 'required|max:255',*/
                'zipcode'=> 'required|digits:5',                
            ));

            //store in database

            $profile->name = $request->input('name');
            $profile->lastname = $request->input('lastname');
            $profile->city = $request->input('city');
            $profile->state = $request->input('state');
            $profile->zipcode = $request->input('zipcode');
            $zip = $request->input('zipcode');
            if($zip)
            {
                if($zip == 29925 || $zip == 29926 || $zip == 29928 || $zip == 29938)
                {
                    $profile->zipgroup = "HH";
                }
                elseif($zip == 29909 || $zip == 29910)
                {
                    $profile->zipgroup = "SC";
                }
                elseif($zip == 29920)
                {
                    $profile->zipgroup = "FR";
                }
                elseif(($zip >= 29901 && $zip <= 29907) || $zip == 29945)
                {
                    $profile->zipgroup = "BU";
                }
                elseif($zip == 29912 || $zip == 29934 || $zip == 29936 || $zip == 29937 || $zip == 29941 || $zip == 29943)
                {
                    $profile->zipgroup = "JA";
                }
                else
                {
                    $profile->zipgroup = " ";
                }
            }
            if($profile->zipgroup == ' ')
            {
                return redirect()->back()->with('error','zipcode is not valid');
            }
        }
        elseif($request->input('old_password'))
        {
            //dd(request()->all());
            $this->validate($request, array(           
               'old_password' => 'required|string|min:6',
               'new_password' => 'required|string|min:6',
               'password_confirmation' => 'required|string|same:new_password',
            ));

        
            $old_password = $request->old_password;
            $cpassword = $profile->password;
            if (Hash::check($old_password, $cpassword)) {
            //store in database
            $profile->password = Hash::make($request->new_password);
            //return redirect()->route('profile')->with('success','Password is updated sucessfully');
            }
            else
            {
                return redirect()->back()->with('password','Password is not matched');
            }
        }
        elseif($request->input('mailing_options'))
        {
            $profile->mailing_options = $request->input('mailing_options');            
        }

        if($request->input('attended_classes'))
        {
            //dd(request()->all()); 
            $profile->attended_classes = $request->input('attended_classes');
        }
        if($request->new_partner_interested == 'true')
            $profile->new_partner_interested = true;
        elseif($request->new_partner_interested == 'false')
            $profile->new_partner_interested = false;

        if($request->absolute_beginner || $request->beginner_plus || $request->polish_your_skills || $request->competitive_bidding || $request->conventions || $request->leads || $request->defense || $request->ph_no_trump || $request->ph_suit || $request->cuebids || $request->over_1 || $request->doubles || $request->counting || $request->strayman_transfers || $request->other)
        {   
            if(Workshop::where('user_id', '=', $profile->id)->exists())
            {
                $workshop1 = Workshop::where('user_id', '=', $profile->id)->first();
                $workshop = Workshop::find($workshop1->id);
                if($workshop)
                {
                    if($request->absolute_beginner == 'true')
                    {
                        $workshop->absolute_beginner = true;
                     }
                    else
                    {
                        $workshop->absolute_beginner = false;
                    }

                    if($request->beginner_plus == 'true')
                    {
                        $workshop->beginner_plus = true;
                    }
                    else
                    {
                        $workshop->beginner_plus = false;
                    }

                    if($request->polish_your_skills == 'true')
                    {
                        $workshop->polish_your_skills = true;
                    }
                    else
                    {
                        $workshop->polish_your_skills = false;
                    }

                    if($request->competitive_bidding == 'true')
                    {
                        $workshop->competitive_bidding = true;
                    }
                    else
                    {
                        $workshop->competitive_bidding = false;
                    }

                    if($request->conventions == 'true')
                    {
                        $workshop->conventions = true;
                    }
                    else
                    {
                        $workshop->conventions = false;
                    }

                    if($request->leads == 'true')
                    {
                        $workshop->leads = true;
                    }
                    else
                    {
                        $workshop->leads = false;
                    }

                    if($request->defense == 'true')
                    {
                        $workshop->defense = true;
                    }
                    else
                    {
                        $workshop->defense = false;
                    }

                    if($request->ph_no_trump == 'true')
                    {
                        $workshop->ph_no_trump = true;
                    }
                    else
                    {
                        $workshop->ph_no_trump = false;
                    }

                    if($request->ph_suit == 'true')
                    {
                        $workshop->ph_suit = true;
                    }
                    else
                    {
                        $workshop->ph_suit = false;
                    }

                    if($request->cuebids == 'true')
                    {
                        $workshop->cuebids = true;
                    }
                    else
                    {
                        $workshop->cuebids = false;
                    }

                    if($request->over_1 == 'true')
                    {
                        $workshop->over_1 = true;
                    }
                    else
                    {
                        $workshop->over_1 = false;
                    }

                    if($request->doubles == 'true')
                    {
                        $workshop->doubles = true;
                    }
                    else
                    {
                        $workshop->doubles = false;
                    }

                    if($request->counting == 'true')
                    {
                        $workshop->counting = true;
                    }
                    else
                    {
                        $workshop->counting = false;
                    }

                    if($request->strayman_transfers == 'true')
                    {
                        $workshop->strayman_transfers = true;
                    }
                    else
                    {
                        $workshop->strayman_transfers = false;
                    }

                    if($request->other == 'true')
                    {
                        $workshop->other = true;
                    }
                    else
                    {
                        $workshop->other = false;
                    }
                    $workshop->save();                    
                }
            }
            else
            {
                $workshop = new Workshop;
                $workshop->user_id = $profile->id;
                if($request->absolute_beginner == 'true')
                {
                    $workshop->absolute_beginner = true;
                }
                else
                {
                    $workshop->absolute_beginner = false;
                }

                if($request->beginner_plus == 'true')
                {
                    $workshop->beginner_plus = true;
                }
                else
                {
                    $workshop->beginner_plus = false;
                }

                if($request->polish_your_skills == 'true')
                {
                    $workshop->polish_your_skills = true;
                }
                else
                {
                    $workshop->polish_your_skills = false;
                }

                if($request->competitive_bidding == 'true')
                {
                    $workshop->competitive_bidding = true;
                }
                else
                {
                    $workshop->competitive_bidding = false;
                }

                if($request->conventions == 'true')
                {
                    $workshop->conventions = true;
                }
                else
                {
                    $workshop->conventions = false;
                }

                if($request->leads == 'true')
                {
                    $workshop->leads = true;
                }
                else
                {
                    $workshop->leads = false;
                }

                if($request->defense == 'true')
                {
                    $workshop->defense = true;
                }
                else
                {
                    $workshop->defense = false;
                }

                if($request->ph_no_trump == 'true')
                {
                    $workshop->ph_no_trump = true;
                }
                else
                {
                    $workshop->ph_no_trump = false;
                }

                if($request->ph_suit == 'true')
                {
                    $workshop->ph_suit = true;
                }
                else
                {
                    $workshop->ph_suit = false;
                }

                if($request->cuebids == 'true')
                {
                    $workshop->cuebids = true;
                }
                else
                {
                    $workshop->cuebids = false;
                }

                if($request->over_1 == 'true')
                {
                    $workshop->over_1 = true;
                }
                else
                {
                    $workshop->over_1 = false;
                }

                if($request->doubles == 'true')
                {
                    $workshop->doubles = true;
                }
                else
                {
                    $workshop->doubles = false;
                }

                if($request->counting == 'true')
                {
                    $workshop->counting = true;
                }
                else
                {
                    $workshop->counting = false;
                }

                if($request->strayman_transfers == 'true')
                {
                    $workshop->strayman_transfers = true;
                }
                else
                {
                    $workshop->strayman_transfers = false;
                }

                if($request->other == 'true')
                {
                    $workshop->other = true;
                }
                else
                {
                    $workshop->other = false;
                }
                $workshop->save();
            }
            

             /* 
              
              "new_partner_interested" => "false"*/

        }
        if($request->input('play_frequency'))
        {            
            $profile->play_frequency = $request->input('play_frequency');
        }
        if($request->input('skill_level'))
        {
            $profile->skill_level = $request->input('skill_level');
        }
        if($request->input('master_points'))
        {
            $this->validate($request, array(
                'master_points'=> 'required|numeric',
            ));
            $profile->master_points = $request->input('master_points');
        }
        if($request->input('acbl'))
        {
            $this->validate($request, array(
                'acbl'=> 'required|min:7|max:7',
            ));
            $acbl = $request->input('acbl');
            if($acbl[0] == 'J' || $acbl[0] == 'K' || $acbl[0] == 'L' || $acbl[0] == 'M' || $acbl[0] == 'N' || $acbl[0] == 'O' || $acbl[0] == 'P' || $acbl[0] == 'Q' || $acbl[0] == 'R' || is_numeric($acbl[0]))
            {
                $acbl = $this->processACBL($acbl);
                $profile->acbl = $acbl;
            }
            else
            {
                return redirect()->route('profile')->with('error','ABCL you have provided is not a valid one');
            }
        }
        $profile->update_code = "RU";
        $profile->updated_by_admin = 0;
        $profile->updated_by_member = 1;

        $profile->save();

        //redirect to other page
        return redirect()->route('profile')->with('success','You have successfully updated your member profile');
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
}
