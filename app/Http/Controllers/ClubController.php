<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clubs = Club::all();  
       return view('clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clubs.create'); 
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
        //validate the data
        $this->validate($request, array(
            'club_name'=> 'required|max:255',
            'city' =>'required|max:255'
        ));

        //store in database
        $club = new Club;

        $club->club_name = $request->club_name;
        $club->city = $request->city;

        $club->save();

        //redirect to other page
        return redirect()->route('clubs.show',$club->id)->with('success','You have sucessfully created club');
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
        $clubs = Club::find($id);
        
        return view('clubs.edit', ['clubs' => $clubs]);
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
         $this->validate($request, array(
            'club_name'=> 'required|max:255',
            'city'=> 'required|max:255'            
        ));

        $clubs = Club::find($id);

        $clubs->club_name = $request->input('club_name');
        $clubs->city = $request->input('city');

        $clubs->save();
        return redirect()->route('clubs.index')->with('success','You have sucessfully updated club');
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
