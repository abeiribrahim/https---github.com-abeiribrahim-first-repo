<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('about',function(){
    return view('about');
});
Route::get('contact-us',function(){
    return view('contact-us');
});
Route::prefix('blog')->group(function(){
    Route::get('test',function(){
        return view('test');
    
    });
    Route::get('activity/{category}',function($cat){
        return 'the category is '.$cat;
    })->whereIn ('category',['science','math','medical','sport']);
    });
    Route::get('science{id?}',function($id){
        return 'Welcome to our :'.$id . 'page';
    });
    Route::get('math',function($id){
        return 'Welcome to our :'.$id .'page';
    });
    Route::get('medical',function($id){
        return 'Welcome to our :'.$id . 'page';
    });
    Route::get('sport',function($id){
        return 'Welcome to our :'.$id .'page';
    });

  




//Route::fallback(function(){
 //   return redirect('/');

//});
//Route::get('food',function(){
   // return view('food');

//});

Route::prefix('lar')->group(function(){

Route::get('test',function(){
    return view('test');

});
Route::get('test1/{id}',function($id){
    return 'Welcome to our :'.$id;
});
Route::get('test2/{id?}',function($id=0){
    return 'the id 2 is :'.$id;
})->where (['id'=>'[0-9]+']);
Route::get('test2/{id?}',function($id=0){
    return 'the id 2 is :'.$id;
})->whereNumber ('id');
Route::get('test3/{name?}',function($name=null){
    return 'the name  is :'.$name;
})->whereAlpha ('name');
Route::get('test4/{id}/{name}',function($id,$name){
    return 'the age is '.$id . 'the name  is :'.$name;
})->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);
Route::get('product/{category}',function($cat){
    return 'the category is '.$cat;
})->whereIn ('category',['laptop','mobile']);
});

