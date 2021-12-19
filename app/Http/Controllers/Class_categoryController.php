<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Class_category;

class Class_categoryController extends Controller
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
        $categories = Class_category::all();  
       return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');  
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
            'category_name'=> 'required|max:255'            
        ));

        //store in database
        $category = new Class_category;

        $category->category_name = $request->category_name;
        
        $category->save();

        //redirect to other page
        return redirect()->route('categories.index')->with('success','category is created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('categories.index', ['category' => Classroom::findOrFail($id)]);
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
        $categories = Class_category::find($id);
        
        return view('categories.edit', ['categories' => $categories]);
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
            'category_name'=> 'required|max:255'            
        ));

        $category = Class_category::find($id);

        $category->category_name = $request->input('category_name');

        $category->save();

        //redirect to other page
        return redirect()->route('categories.index')->with('success','Category has successfully updated!');
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
        $category = Class_category::find($id)->delete();
        //$clubs->delete();
        return redirect()->route('categories.index')->with('success','You have successfully deleted club');
    }
}
