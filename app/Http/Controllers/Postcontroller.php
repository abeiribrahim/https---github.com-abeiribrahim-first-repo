<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;

class Postcontroller extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    //private $columns =['post_title','description','published','auther'];
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
        $data=$request->validate([
            'post_title'=>'required|string|max:50',
            'description'=>'required|string',
            'auther'=>'required|string'

           ]);
        //$data=$request->only($this->columns);
        $data['published']=isset($request->published);
        post::create($data);
        return redirect('posts');

        //$posts=new post();
        //$posts->post_title=$request->post_title;
        //$posts->description=$request->description;
        //$posts->auther=$request->auther;
        //if(isset($request->published))
        //{$posts->published=1;}
    //else{
        //$posts->published=0;
    //}$posts->save();


        
        
        return 'Data added successfully';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        {
            $posts = post::findOrFail($id);
            return view ('showpost', compact('posts'));
        }
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {        $posts = post::findOrFail($id);
        return view ('editpost', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->only($this->columns);
        $data['published']=isset($request->published);
        
        post::where('id',$id)->update($data);
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        post::where('id',$id)->delete();
        
        return redirect('posts');
    }
    public function trashed()
{
    $posts = post::onlyTrashed()->get();
    return view('trashedposts', compact('posts'));
}
public function forceDelete(string $id)
{
    post::where('id',$id)->forceDelete();
        
    return redirect('posts');
}
public function restore(string $id)
{
    post::where('id',$id)->restore();
        
    return redirect('posts');
}
}
