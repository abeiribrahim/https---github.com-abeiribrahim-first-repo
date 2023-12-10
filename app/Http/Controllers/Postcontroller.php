<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;

class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts= post::get();
        return view('posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addpost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $posts=new post();
        $posts->post_title=$request->post_title;
        $posts->description=$request->description;
        $posts->auther=$request->auther;
        if(isset($request->published))
        {$posts->published=1;}
    else{
        $posts->published=0;
    }$posts->save();


        
        
        return 'Data added successfully';
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
