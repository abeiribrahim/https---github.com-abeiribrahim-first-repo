<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Car;

class Carcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars= car::get();
        return view('cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addcar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cars=new car();
        $cars->title=$request->title;
        $cars->description=$request->description;
        if(isset($request->published))
        {$cars->published=1;}
    else{
        $cars->published=0;
    }$cars->save();


        
        
        return 'Data added successfully';
        //$cars=new car();
        //$cars->title='BMW';
        //$cars->description='BMW description';
        //$cars->published=1;
        //$cars->save();
        //return 'Data added successfully';

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
