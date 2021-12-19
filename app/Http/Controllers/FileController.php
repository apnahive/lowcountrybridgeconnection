<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\User;
use App\Game;
use App\Club;
use App\Classroom;
use App\Class_subscription;
use App\Club_membership;
use Hash;
//use Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\collection;
use DateTime;
use App\Club_subscription;

class FileController extends Controller
{
    //
    public function availability($value)
    {
        if($value)
            return 1;
        else
            return 0;
    }

    public function zipGroup($zip)
    {    
        if($zip == 29925 || $zip == 29926 || $zip == 29928 || $zip == 29938)
        {
            return "HH";
        }
        elseif($zip == 29909 || $zip == 29910)
        {
            return "SC";
        }
        elseif($zip == 29920)
        {
            return "FR";
        }
        elseif($zip == 29912 || $zip == 29934 || $zip == 29936 || $zip == 29937 || $zip == 29941 || $zip == 29943)
        {
            return "JA";
        }
        elseif(($zip >= 29901 && $zip <= 29907) || $zip == 29945)
        {
            return "BU";
        }
        
        else
            return ' ';
    }
    public function attending($value)
    {
        if($value)
            return 'Attending';
        else
            return 'Not attending';
    }
    public function userAllData($id)
    {
        $user = User::findOrFail();
        return $user;
    }
    public function classData($id)
    {
        $class = Class_subscription::findOrFail();
        return $class;
    }
    public function clubData($id)
    {
        $club = Club_membership::findOrFail();
        return $club;
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
    public function userData($id)
    {
        //geting the data
        $users = User::find($id);
        $classes = Classroom::all();
        $clubs = Club::all();
        if($users->new_partner_interested)
                $users->new_partner_interested = 'Yes';
            else
                $users->new_partner_interested = 'No';

        //finding data
        $data = array($users->acbl, $users->name, $users->lastname, $users->email, $users->zipcode, $users->zipgroup, $users->attended_classes);              
        foreach ($clubs as $clubkey => $club) {            
            if(Club_subscription::where('user_id', '=', $id)->where('club_id', '=', $club->id)->where('subscription_status', '=', '1')->exists())
                array_push($data, 'Enrolled');
            else
                array_push($data, 'Not Enrolled');
        }

        array_push($data, $users->mailing_options);
        array_push($data, $users->master_points);
        array_push($data, $users->skill_level);
        array_push($data, $users->play_frequency);
        array_push($data, $users->new_partner_interested);
        array_push($data, $users->update_code);
        array_push($data, $users->updated_at->format('m/d/Y'));

        return $data;
    }

    public function playerData($id)
    {
        //geting the data
        $player = Player::find($id);
        //$classes = Classroom::all();
        $clubs = Club::all();
        if($player->new_partner_interested)
                $player->new_partner_interested = 'Yes';
            else
                $player->new_partner_interested = 'No';

        //finding data
        $data = array($player->acbl, $player->name, $player->lastname, $player->email, $player->zipcode, $player->zipgroup, ' ');              
        foreach ($clubs as $clubkey => $club) {
                array_push($data, 'Not Enrolled');
        }

        array_push($data, $player->mailing_options);
        array_push($data, $player->master_points);
        array_push($data, $player->skill_level);
        array_push($data, $player->play_frequency);
        array_push($data, $player->new_partner_interested);
        array_push($data, $player->update_code);
        array_push($data, $player->updated_at->format('m/d/Y'));

        return $data;
    }

    public function downloadUserReport($type){
        //getting data
        $users = User::all();
        $players = Player::all();
        $clubs = Club::all();        
        //$classes = Classroom::all();

        //for filling data in first row
        $array = array('acbl', 'firstname', 'lastname', 'email', 'zipcode', 'zipgroup', 'attended_classes');
        foreach ($clubs as $clubkey => $club) {
            $name1 = $this->processText($club->club_name);
            array_push($array, $name1);
        }
        array_push($array, 'mailing_options');
        array_push($array, 'master_points');
        array_push($array, 'skill_level');
        array_push($array, 'play_frequency');
        array_push($array, 'new_partner_interested');
        array_push($array, 'update_code');
        array_push($array, 'last_update_date');
        // pushing user data and first row to excel sheet
        return \Excel::create('General User Reports', function($excel) use ($array, $users, $players) {
            $excel->sheet('sheet name', function($sheet) use ($array, $users, $players)
            {   
                $sheet->row(1, $array);
                $count = 2; //counter to tell the row number in the sheet
                foreach ($users as $userkey => $user) {
                    $data = $this->userData($user->id); // sending user id to get the processed data to fill sheet
                    $sheet->row($count, $data); //now pushing that data into the sheet
                    $count++;
                }
                foreach ($players as $playerkey => $player) {
                    $data = $this->playerData($player->id); // sending user id to get the processed data to fill sheet
                    $sheet->row($count, $data); //now pushing that data into the sheet
                    $count++;
                }
                //$sheet->fromArray($users, null, 'A2', false, false);           
            });
        })->download($type);
    }
    public function downloadExcelFile($type){
        $players = Player::leftJoin('clubs', 'players.club_id', '=', 'clubs.id')->select('players.acbl' ,'players.name AS first_name', 'players.lastname', 'players.email', 'players.zipcode', 'players.zipgroup', 'players.updated_at', 'players.update_code')->get();
        /*foreach ($players as $playerkey => $player) {
            if($player->new_partner_interested)
                $player->new_partner_interested = 'Yes';
            else
                $player->new_partner_interested = 'No';
        }*/
       
        $players->toArray();
        return \Excel::create('Player_list', function($excel) use ($players) {            
            $excel->sheet('sheet name', function($sheet) use ($players)
            {
                $sheet->row(1, array(
                     'acbl', 'firstname', 'lastname', 'email', 'zipcode', 'zipgroup', 'Last Updated At', 'Update Code'
                ));
                $sheet->fromArray($players, null, 'A2', false, false);
            });
        })->download($type);
    }
     public function downloadWorkshop($type){
        $users = User::leftJoin('workshops', 'users.id', '=', 'workshops.user_id')->select('users.acbl', 'users.name','users.lastname','users.email', 'workshops.beginner_plus', 'workshops.polish_your_skills', 'workshops.competitive_bidding', 'workshops.conventions', 'workshops.leads', 'workshops.defense', 'workshops.ph_no_trump', 'workshops.ph_suit', 'workshops.cuebids', 'workshops.over_1', 'workshops.doubles', 'workshops.counting', 'workshops.strayman_transfers', 'workshops.other', 'users.update_code', 'users.updated_at')->get();

        foreach ($users as $userkey => $user) {
            $user->beginner_plus = $this->attending($user->beginner_plus);
            $user->polish_your_skills = $this->attending($user->polish_your_skills);
            $user->competitive_bidding = $this->attending($user->competitive_bidding);
            $user->conventions = $this->attending($user->conventions);
            $user->leads = $this->attending($user->leads);
            $user->defense = $this->attending($user->defense);
            $user->ph_no_trump = $this->attending($user->ph_no_trump);
            $user->ph_suit = $this->attending($user->ph_suit);
            $user->cuebids = $this->attending($user->cuebids);
            $user->over_1 = $this->attending($user->over_1);
            $user->doubles = $this->attending($user->doubles);
            $user->counting = $this->attending($user->counting);
            $user->strayman_transfers = $this->attending($user->strayman_transfers);
            $user->other = $this->attending($user->other);
        }

        return \Excel::create('Workshop_report', function($excel) use ($users) {
            $excel->sheet('sheet name', function($sheet) use ($users)
            {
                $sheet->row(1, array(
                    'acbl', 'firstname', 'lastname', 'email', 'beginner_plus', 'polish_your_skills', 'competitive_bidding', 'conventions', 'leads', 'defense', 'ph_no_trump', 'ph_suit', 'cuebids', '2_over_1', 'doubles', 'counting', 'strayman_transfers', 'other', 'update_code', 'last_update_date'
                ));
                $sheet->fromArray($users, null, 'A2', false, false);//, null, 'A1', false, 'slugged_with_count'
            });
        })->download($type);
    }
    public function downloadMailReport($type){
        $no_mail = User::where('mailing_options', '=', 'N')->select('id')->get();
        //dd($no_email);
        $users = User::whereNotIn('id', $no_mail)->select('acbl', 'name','lastname','email', 'zipgroup', 'mailing_options', 'update_code', 'updated_at')->get();
        $no_email_mail = Player::where('email', '=', NULL)->orWhere('email', '=', '')->orWhere('mailing_options', '=', 'N')->select('id')->get();
        //dd($no_email_mail);
        $players = Player::whereNotIn('id', $no_email_mail)->select('acbl', 'name','lastname','email', 'zipgroup', 'mailing_options', 'update_code', 'updated_at')->get();
        return \Excel::create('Mailing_report', function($excel) use ($users, $players) {
            $excel->sheet('sheet name', function($sheet) use ($users, $players)
            {
                $sheet->row(1, array(
                    'acbl', 'firstname', 'lastname', 'email', 'zipgroup', 'mailing_options', 'update_code', 'last_update_date'
                ));
                $sheet->fromArray($users, null, 'A2', false, false);//, null, 'A1', false, 'slugged_with_count'
                $sheet->fromArray($players, null, 'A2', false, false);
            });
        })->download($type);
    }
    public function downloadClass($type){
        $classes = Classroom::join('clubs', 'classrooms.club_id', '=', 'clubs.id')->join('teachers', 'classrooms.teacher_id', '=', 'teachers.id')->leftJoin('class_series', 'classrooms.series_id', '=', 'class_series.id')->select('classrooms.class_name', 'classrooms.class_description', 'classrooms.class_from', 'classrooms.class_till', 'classrooms.start_time', 'classrooms.class_size', 'classrooms.seats_booked', 'classrooms.seats_available', 'classrooms.payment_option', 'classrooms.class_flyer_address', 'classrooms.fee_amount', 'classrooms.class_status', 'clubs.club_name', 'teachers.name AS teacher_name', 'class_series.name AS series_name', 'classrooms.updated_at')->get();
        foreach ($classes as $classkey => $class) {
            if($class->class_status)
                $class->class_status = 'Available';
            else
                $class->class_status = 'Unavailable';
        }
        $classes->toArray();
        return \Excel::create('Class_report', function($excel) use ($classes) {
            $excel->sheet('sheet name', function($sheet) use ($classes)
            {
                $sheet->row(1, array(
                    'Class Name', 'Class Description', 'Class Start From', 'Class ends on', 'Class Time', 'Class Size', 'Seats Booked', 'Seats Available', 'Payment Option', 'Flyer Address', 'Fee Ammount', 'Class Status', 'Club Name', 'Teacher Name', 'Series Name', 'Last Updated At'
                ));
                $sheet->fromArray($classes, null, 'A2', false, false);//, null, 'A1', false, 'slugged_with_count'
            });
        })->download($type);
    }
    public function downloadGame($type){
        $games = Game::join('clubs', 'games.club_id', '=', 'clubs.id')->join('managers', 'games.manager_id', '=', 'managers.id')->select('games.game_name', 'games.game_description' , 'games.game_date' , 'games.start_time', 'games.team_size' , 'games.seats_booked' , 'games.seats_available' , 'games.max_enroll' ,  'games.game_status' , 'clubs.club_name', 'managers.name AS manager_name', 'games.updated_at')->get();
        foreach ($games as $gamekey => $game) {            
            if($game->game_status)
                $game->game_status = 'Available';
            else
                $game->game_status = 'Unavailable';
        }

        $games->toArray();
        return \Excel::create('Game_report', function($excel) use ($games) {
            $excel->sheet('sheet name', function($sheet) use ($games)
            {
                $sheet->row(1, array(
                    'Game Name', 'Game Description', 'Game Date', 'Game Time', 'Team Size', 'Seats Booked', 'Seats Available', 'Maximum Enrollment', 'Game Status', 'Club Name', 'Manager Name', 'Last Updated At'
                ));
                $sheet->fromArray($games, null, 'A2', false, false);
            });
        })->download($type);
    }

    public function downloadBlank($type){
        $clubs = Club::all();        
       
        $array = array('acbl', 'firstname', 'lastname', 'email', 'zipcode', 'master_points', 'mailing_options');
        foreach ($clubs as $clubkey => $club) {
            $name1 = $this->processText($club->club_name);
            array_push($array, $name1);
        }
        
        //$array[] = $name1;
        return \Excel::create('Blank_template', function($excel) use ($array) {
            $excel->sheet('sheet name', function($sheet) use ($array)
            {                
                $sheet->row(1, $array);
                           
            });
        })->download($type);
    }
    
    public function downloadMember($type){

        $players = User::get()->toArray();
        return \Excel::create('Member_list', function($excel) use ($players) {
            $excel->sheet('sheet name', function($sheet) use ($players)
            {
                $sheet->fromArray($players);
            });
        })->download($type);        
    }
    public function importMember(Request $request){
        $now = new DateTime();
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();
            //$member = User::all();
            if($data->count()){
                foreach ($data as $key => $value) {
                    if (User::where('email', '=', $value->email)->exists()) 
                    {
                      $member = User::where('email', '=', $value->email)->first();
                      $memberx = User::find($member->id);                      
                      if($memberx)
                      {
                        $memberx->name = $value->name;
                        $memberx->lastname = $value->lastname;
                        //$member->email = $value->email;
                        $memberx->city = $value->city;
                        $memberx->state = $value->state;
                        $memberx->zipcode = $value->zipcode;
                        $memberx->zipgroup = $value->zipgroup;
                        $memberx->mailing_options = $value->mailing_options; 
                        $memberx->acbl = $value->acbl;
                        $memberx->master_points = $value->master_points;
                        $memberx->skill_level = $value->skill_level;
                        $memberx->play_frequency = $value->play_frequency;
                        $memberx->attended_classes = $value->attended_classes;
                        $memberx->update_code = 'L';
                        $memberx->updated_by_admin = 1;
                        $memberx->updated_by_member = 0;
                        $memberx->updated_at = $now;
                        $memberx->new_partner_interested = $value->new_partner_interested;
                        $memberx->save();
                       }
                    }
                    else
                    {
                        $now = new DateTime();
                        $arr[] = ['name' => $value->name, 'lastname' => $value->lastname, 'email' => $value->email, 'password' => Hash::make('password'),'city' => $value->city, 'state' => $value->state, 'zipcode' => $value->zipcode, 'zipgroup' => $value->zipgroup, 'mailing_options' => $value->mailing_options, 'acbl' => $value->acbl, 'master_points' => $value->master_points, 'skill_level' => $value->skill_level, 'play_frequency' => $value->play_frequency, 'attended_classes' => $value->attended_classes, 'update_code' => 'L', 'updated_by_admin' => $value->updated_by_admin, 'updated_by_member' => $value->updated_by_member, 'new_partner_interested' => $value->new_partner_interested, 'created_at' => $now, 'updated_at' => $now];
                    }    
                }
                if(!empty($arr)){
                    \DB::table('users')->insert($arr);
                    dd('Insert Record successfully.');
                }
            }
        }
        dd('Request data does not have any files to import.');      
    }

    //ACBL conversion      

    public function processACBL($acbl)
    {
        
        $acbl1 = (int)$acbl;
        $acbl1 = "$acbl";
        //dd($acbl1[0] == '1');
        //$acbl1 = {string}$acbl1;
        
        //$ac = $acbl->toArray();
        //
        //dd($acbl1[0]);
        if($acbl1[0] == '1')
        {
            $acbl1[0] = 'J';
            return $acbl1;
        }
        if($acbl1[0] == '2')
        {
            $acbl1[0] = 'K';
            return $acbl1;
        }
        if($acbl1[0] == '3')
        {
            $acbl1[0] = 'L';
            return $acbl1;
        }
        if($acbl1[0] == '4')
        {
            $acbl1[0] = 'M';
            return $acbl1;
        }
        if($acbl1[0] == '5')
        {
            $acbl1[0] = 'N';
            return $acbl1;
        }
        if($acbl1[0] == '6')
        {
            $acbl1[0] = 'O';
            return $acbl1;
        }
        if($acbl1[0] == '7')
        {
            $acbl1[0] = 'P';            
            return $acbl1;
        }
        if($acbl1[0] == '8')
        {
            $acbl1[0] = 'Q';            
            return $acbl1;
        }
        if($acbl1[0] == '9')
        {
            $acbl1[0] = 'R';            
            return $acbl1;
        }
        else
        {
            return $acbl;
        }

    }


//update record function
    public function updaterecord($value, $member, $usertype)
    {
        $now = new DateTime();
        //dd($value);
        if($usertype == 1)
        {
            $memberx = User::find($member->id);
            if ($memberx->exists())
            { 
                if($value->firstname)
                $memberx->name = $value->firstname;

                if($value->lastname)
                $memberx->lastname = $value->lastname;

                if($value->email)
                $member->email = $value->email;

                if($value->zipcode)                    
                $memberx->zipcode = $value->zipcode;

                if($value->acbl)
                $memberx->acbl = $this->processACBL($value->acbl);

                
                if($value->master_points)
                $memberx->master_points = $value->master_points;

                $memberx->updated_at = $now;
                $memberx->update_code = 'L';

                if(!$value->zipcode == NULL)
                $memberx->zipgroup = $this->zipGroup($value->zipcode);
                //dd($memberx->zipgroup);

                $memberx->save();
                $clubs = Club::all();

                foreach ($clubs as $clubkey => $club) {
                    $name = $this->processText($club->club_name);
                    if(Club_subscription::where('user_id', '=', $memberx->id)->where('club_id', '=', $club->id)->exists())
                    {
                        $club_subscription = Club_subscription::where('user_id', '=', $memberx->id)->where('club_id', '=', $club->id)->first();
                        $name = $this->processText($club->club_name);
                       
                       if($value->$name === 'true')
                        {
                            $club_subscription->subscription_status = true;
                         }
                        else if($value->$name === 'false' || $value->$name === NULL)
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
                        $club_subscription->user_id = $memberx->id;
                       
                       if($value->$name === 'true')
                        {
                            $club_subscription->subscription_status = true;
                         }
                        else if($value->$name === 'false' || $value->$name === NULL)
                        {
                            $club_subscription->subscription_status = false;
                        }
                        //dd($club_subscription);
                        $club_subscription->save();
                    }
                }

                
                $checksum = 0;
            }
        }
        elseif($usertype == 2)
        {
            $playerx = Player::find($member->id);
            if ($playerx->exists())
            {   
                if($value->firstname)             
                $playerx->name = $value->firstname;

                if($value->lastname)
                $playerx->lastname = $value->lastname;

                if($value->email)
                $playerx->email = $value->email;

                if($value->zipcode)
                $playerx->zipcode = $value->zipcode;

                $zipgroups = $this->zipGroup($value->zipcode);                                   
                if($zipgroups != ' ')
                $playerx->zipgroup = $zipgroups;

                if($value->mailing_options)                    
                $playerx->mailing_options = $value->mailing_options;
                
                //$playerx->zipgroup = $value->zipgroup;
                if($value->acbl)
                    $playerx->acbl = $this->processACBL($value->acbl);
                if($value->master_points)
                    $playerx->master_points = $value->master_points;
               
                $playerx->update_code = 'L';
                //$playerx->updated_by_admin = $value->updated_by_admin;
                //$playerx->updated_by_member = $value->updated_by_member;
                $playerx->updated_at = $now;

                $playerx->save();
                
            }
        }

    }

    

//File upload code
    public function importFileIntoDB(Request $request)
    {
        $nm = 0;
        $np = 0;
        $nn = 0;
        $nor = 0;
        $now = new DateTime();
        if($request->hasFile('sample_file'))
        {
            $members = User::all();
            $path = $request->file('sample_file')->getRealPath();

            $data = \Excel::load($path)->get();            
            //dd($data->count());
            if($data->count())
            { 
                /*$counterx = 0;
                foreach ($data as $key => $value) 
                {
                    $counterx ++;
                }              
                dd($counterx);*/
                foreach ($data as $key => $value) 
                {
                    if($value->email == ' ')
                    $result = 1;
                    else  
                    $result = filter_var($value->email, FILTER_VALIDATE_EMAIL);

                    if(($value->acbl == NULL && $value->email == NULL) || $result == false)
                    {
                        //dd($value->email);
                        $key = $key+2;
                        $mess = 'Request file is invalid. There is error on '.$key.'  row. Please fix and try to upload again';
                        return redirect()->route('playerunits.index')->with('error', $mess);
                        //return redirect()->route('playerunits.index')->with('error', 'Request file is invalid. Please upload a Valid file to upload');
                    } 
                    if($value->zipcode)
                    {
                        $zipgroup = $this->zipGroup($value->zipcode);
                        if($zipgroup == ' ')
                        {
                            $value->zipcode = null;
                            //$key = $key+2;
                            //dd($key);
                            /*$nor ++;
                            continue;    */
                        }
                    }

                    if($value->mailing_options == 'A' || $value->mailing_options == 'G' || $value->mailing_options == 'T' || $value->mailing_options == 'N')
                    {

                    }
                    else
                    {
                        $value->mailing_options = 'A';
                    }
                    
                    //dd($value['zipcode']);
                    /*if($result == false)
                    {
                        //dd($value->email);
                        $nor ++;
                        continue;
                    }*/
                    //$checksum = 1;
                    
                    if($value->acbl)
                    {
                        $acbl1 = $this->processACBL($value->acbl);
                        //dd($acbl1[0]);
                        if($acbl1[0] == 'J' || $acbl1[0] == 'K' || $acbl1[0] == 'L' || $acbl1[0] == 'M' || $acbl1[0] == 'N' || $acbl1[0] == 'O' || $acbl1[0] == 'P' || $acbl1[0] == 'Q' || $acbl1[0] == 'R')
                        {
                            if(User::where('acbl', '=', $acbl1)->exists()) {
                                $member = User::where('acbl', '=', $acbl1)->first();
                                $usertype = 1;
                                $this->updaterecord($value, $member, $usertype);
                                $nm ++;
                            }
                            elseif (Player::where('acbl', '=', $acbl1)->exists()) {
                                $player = Player::where('acbl', '=', $acbl1)->first();
                                $usertype = 2;
                                $this->updaterecord($value, $player, $usertype);
                                $np ++;
                            }
                            elseif (Player::where('email', '=', $value->email)->exists())
                            {
                                $player = Player::where('email', '=', $value->email)->first();
                                $usertype = 2;
                                $this->updaterecord($value, $player, $usertype);
                                $np ++;
                                //continue;
                            }
                            else
                            { 
                                $zipgroup = $this->zipGroup($value->zipcode);                           
                                $arr[] = ['name' => $value['firstname'], 'lastname' => $value['lastname'], 'email' => $value['email'], 'user_id' => 'x', 'zipcode' => $value->zipcode, 'master_points' => $value['master_points'], 'acbl' =>$acbl1, 'update_code' => 'G', 'created_at' => $now, 'updated_at' => $now, 'mailing_options' => $value->mailing_options, 'zipgroup' => $zipgroup];
                                $nn ++;
                               
                            }
                        }
                        else
                        {
                            //dd($acbl1[0]);                            
                            $nor ++;
                        }
                    }
                    elseif($value->master_points && !$value->email == NULL)
                    {
                        if (User::where('email', '=', $value->email)->exists()) {
                            $member = User::where('email', '=', $value->email)->first();
                            $usertype = 1;
                            $this->updaterecord($value, $member, $usertype);
                            $nm ++;
                        }
                        elseif (Player::where('email', '=', $value->email)->exists()) {
                            $player = Player::where('email', '=', $value->email)->first();
                            $usertype = 2;
                            $this->updaterecord($value, $player, $usertype);
                            $np ++;
                        }                       
                        else
                        { 
                            $zipgroup = $this->zipGroup($value->zipcode);                        
                            $arr[] = ['name' => $value['firstname'], 'lastname' => $value['lastname'], 'email' => $value['email'], 'user_id' => 'x', 'zipcode' => $value->zipcode, 'master_points' => $value['master_points'], 'acbl' =>$value['acbl'], 'update_code' => 'G', 'created_at' => $now, 'updated_at' => $now, 'mailing_options' => $value->mailing_options, 'zipgroup' => $zipgroup];
                            $nn ++;
                        }
                    }
                    elseif(!$value->master_points && !$value->email == NULL)
                    {
                        if (User::where('email', '=', $value->email)->exists()) {
                            $member = User::where('email', '=', $value->email)->first();
                            $usertype = 1;
                            $this->updaterecord($value, $member, $usertype);
                            $nm ++;
                        }
                        elseif (Player::where('email', '=', $value->email)->exists()) {
                            $player = Player::where('email', '=', $value->email)->first();
                            $usertype = 2;
                            $this->updaterecord($value, $player, $usertype);
                            $np ++;
                        }                       
                        else
                        { 
                            $zipgroup = $this->zipGroup($value->zipcode);                        
                            $arr[] = ['name' => $value['firstname'], 'lastname' => $value['lastname'], 'email' => $value['email'], 'user_id' => 'x', 'zipcode' => $value->zipcode, 'master_points' => $value['master_points'], 'acbl' =>$value['acbl'], 'update_code' => 'C', 'created_at' => $now, 'updated_at' => $now, 'mailing_options' => $value->mailing_options, 'zipgroup' => $zipgroup];
                            $nn ++;
                        }
                    }
                    else
                    {
                        $nor ++;
                    }
                }
                if(!empty($arr))
                {
                    //dd($arr);
                    \DB::table('players')->insert($arr);
                    
                    $message = 'Member Updated = '.$nm.'. Non-member Updated = '.$np.'. New Records Created = '.$nn.'. Records not created due to error = '.$nor;
                    return redirect()->back()->with('success', $message);
                }
                elseif($nm > 0 || $np > 0 || $nor > 0) 
                {
                    $message = 'Member Updated = '.$nm.'. Non-member Updated = '.$np.'. New Records Created = '.$nn.'. Records not created due to error = '.$nor;
                    return redirect()->back()->with('success', $message);
                }
                else
                {
                       
                    return redirect()->back()->with('error', 'Request data does not have any files to import.');
                }
            }
        }
    }



}
