<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Car;
use App\models\Category;
use App\Traits\Common;

class Carcontroller extends Controller
{
    use common;
    private $columns =['title','description','published','image','category_id'];
    
    /**
     * Display a listing of the resource.
     */
    public function messages()
    {
    return [
        'title.required'=>'العنوان مطلوب',
        'title.string'=>'Should be string',
        'description.required'=> 'should be text',
        'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
        ];
    }



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
        $categories=Category::get();
        return view('addcar', compact('categories'));
        $messages = $this->messages();
        return view('addcar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();

        $data = $request->validate([
             'title'=>'required|string|max:50',
             'description'=> 'required|string',
             'image' => 'required|mimes:png,jpg,jpeg|max:2048',
             'category_id'=> 'required',
            ], $messages);

            $fileName = $this->uploadFile($request->image, 'assets/images');    
        $data['image'] = $fileName;
        $data['published'] = isset($request->published);
        Car::create($data);
        return redirect('cars');
        //$data=$request->only($this->columns);


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
    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'Assets/images';
        $request->image->move($path, $file_name);
        return 'uploaded';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {   
       
        $cars = Car::findOrFail($id);
        $categories=Category::get();
        return view ('editCar', compact('cars','categories'));
       
      
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       //$messages = $this->messages();

        //$data = $request->validate([
             //'title'=>'required|string|max:50',
            // 'description'=> 'required|string',
            // 'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            //], $messages);
           // $fileName = $this->uploadFile($request->image, 'Assets/images');    
        //$data['image'] = $fileName;
        //$data['published'] = isset($request->published);
        $messages = $this->messages();
        $data = $request->validate([
             'title'=>'required|string|max:50',
             'description'=> 'required|string',
             'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
             'category_id'=> 'required|string',
            ], $messages);

            if($request->hasFile('image')){
                $fileName = $this->uploadFile($request->image, 'assets/images');    
                $data['image'] = $fileName;
               
            }else{
                $data ['image']=$request->oldImage;
                //unlink("assets/images/" . $request->oldImage);
            }
             
            $data['published'] = isset($request->published);
                Car::where('id', $id)->update($data);
                return redirect('cars');
            }
            
        
 
       
        //$messages = $this->messages();
        //$data=$request->only($this->columns);
        //$data['published']=isset($request->published);
        
        //Car::where('id',$id)->update($data);
        //return redirect('cars');
    

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