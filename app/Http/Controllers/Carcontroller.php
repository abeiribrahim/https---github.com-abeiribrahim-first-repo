<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Car;

class Carcontroller extends Controller
{
    private $columns =['title','description','published'];
    
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
       $data=$request->validate([
        'title'=>'required|string|max:50',
        'description'=>'required|string'
       ]);
        //$data=$request->only($this->columns);
        $data['published']=isset($request->published);
        car::create($data);
        return redirect('cars');

        /*$cars=new car();
        $cars->title=$request->title;
        $cars->description=$request->description;
        if(isset($request->published))
        {$cars->published=1;}
    else{
        $cars->published=0;
    }$cars->save();


        
        
        return 'Data added successfully';*/
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
        $cars = Car::findOrFail($id);
        return view ('showcar', compact('cars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        $cars = Car::findOrFail($id);
        return view ('editCar', compact('cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->only($this->columns);
        $data['published']=isset($request->published);
        
        car::where('id',$id)->update($data);
        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        car::where('id',$id)->delete();
        
        return redirect('cars');
    }

public function trashed()
{
    $cars = car::onlyTrashed()->get();
    return view('trashedcars', compact('cars'));
}
public function forceDelete(string $id)
{
    car::where('id',$id)->forceDelete();
        
    return redirect('cars');
}
public function restore(string $id)
{
    car::where('id',$id)->restore();
        
    return redirect('cars');
}
}