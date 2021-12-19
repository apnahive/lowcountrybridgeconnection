<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use Image;
use File;
use App\Tournament_flyer;

class UnittournamentController extends Controller
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
        $tournaments = Tournament::all();
        return view('unittournament.index', compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unittournament.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'tournament_name'=> 'required|max:455',                        
            'tournament_description'=> 'required|max:2024',            
            'tournament_flyer' => 'sometimes|required|mimes:pdf|max:8192'
        ));
        $tournament = new Tournament;
        $tournament->name = $request->tournament_name;
        $tournament->description = $request->tournament_description;
        $tournament->flyer = 'none';
        $tournament->save();

        if($request->tournament_flyer)
        {
          $flyer = new Tournament_flyer;

          $image = $request->file('tournament_flyer');
          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          
          $flyer->tournament_id = $tournament->id;
          $flyer->flyer = $input['imagename'];
          $flyer->save();  
          $destinationPath = storage_path('/flyer/tournament');
          //$img = Image::make($image->getRealPath());
          /*$img->resize(100, 100, function ($constraint) {
              $constraint->aspectRatio();
          })->save($destinationPath.'/'.$input['imagename']);*/

          $destinationPath = storage_path('/flyer/tournament');
          $image->move($destinationPath, $input['imagename']);
          
        }

        //redirect to other page
        return redirect()->back()->with('success','You have successfully created the tournament');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tournaments = Tournament::findOrFail($id);
        $fly1 = Tournament_flyer::where('tournament_id', $id)->first();
        if($fly1)
        {
        $flyer = $fly1->flyer;
        }
        else
        {
        //$fly = null;
        $flyer = null;
        }
        return view('unittournament.show', compact('tournaments', 'flyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tournaments = Tournament::find($id);
        $fly1 = Tournament_flyer::where('tournament_id', $id)->first();
        if($fly1)
        {
        $flyer = $fly1->flyer;
        }
        else
        {
        //$fly = null;
        $flyer = null;
        }
        return view('unittournament.edit', compact('tournaments', 'flyer'));
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
        $this->validate($request, array(
            'tournament_name'=> 'required|max:455',                        
            'tournament_description'=> 'required|max:2024',            
            'tournament_flyer' => 'sometimes|required|mimes:pdf|max:8192'
        ));
        $tournament = Tournament::find($id);
        $tournament->name = $request->tournament_name;
        $tournament->description = $request->tournament_description;
        $tournament->flyer = 'none';
        $tournament->save();

        if($request->tournament_flyer)
        {

          /*$this->validate($request, array(
              'image' => 'sometimes|required|mimes:pdf,zip|max:2048'
          ));*/
          
          //dd('flyer entered');
          $flyer = Tournament_flyer::where('tournament_id', $id)->first();

          if($flyer == null)
          {
            //dd('new flyer is required');
            $flyer = new Tournament_flyer;
            $flyer->tournament_id = $id;
          }
          else
          {
            $file = $flyer->flyer;
            //File::delete('tournament_flyer/'.$file);
            unlink(storage_path('flyer/tournament/'.$file));
          }

          $image = $request->file('tournament_flyer');
          
          //dd($image, $request->class_flyer_address);
          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          
          //$flyer->class_id = $class->id;
          $flyer->flyer = $input['imagename'];
          $flyer->save();  
          $destinationPath = public_path('flyer/tournament/');
          /*$img = Image::make($image->getRealPath());
          $img->resize(100, 100, function ($constraint) {
              $constraint->aspectRatio();
          })->save($destinationPath.'/'.$input['imagename']);*/

          $destinationPath = public_path('flyer/tournament/');
          $image->move($destinationPath, $input['imagename']);
          
        }

        //redirect to other page
        return redirect()->back()->with('success','You have successfully updated the tournament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tournament = Tournament::find($id)->delete();        
        return redirect()->route('unittournament.index')->with('success','You have successfully deleted tournament');
    }

    public function delete_flyer($id)
    {
      //dd('delete flyer is hitted');
      $flyer = Tournament_flyer::where('tournament_id', $id);
      $flyer1 = Tournament_flyer::where('tournament_id', $id)->first();
      
      $file = $flyer1->flyer;
      //File::delete('tournament_flyer/'.$file);
      unlink(storage_path('flyer/tournament/'.$file));
      //dd($file);
      $flyer->delete();
      return redirect()->route('unittournament.edit', $id)->with('success', 'You have successfully removed the Flyer');

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
