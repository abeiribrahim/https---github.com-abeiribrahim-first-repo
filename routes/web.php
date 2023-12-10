<?php

use Illuminate\Support\Facades\Route;
//use App\Http\controllers\ExampleController;
//use App\Http\controllers\LoginController;
use App\Http\controllers\PostController;
use App\Http\controllers\CarController;

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

Route::get('posts',[PostController::class,'index']);
Route::get('storepost',[PostController::class,'store']);
Route::get('createpost',[PostController::class,'create']);
Route::post('storepost',[PostController::class,'store'])->name('storepost');

//Route::get('cars',[CarController::class,'index']);
//Route::get('storecar',[CarController::class,'store']);
//Route::get('createcar',[CarController::class,'create']);
//Route::post('storecar',[CarController::class,'store'])->name('storecar');



//Route::get('/', function () {
   // return view('login');
//});


//Route::post('login',[LoginController::class,'login']);
  


//Route::get('login',function(){
 // return view('login');
//});
/*Route::post('logged',function(){
    return'you are logged in ';
})->name('logged');*/
//Route::post('logged',[LoginController::class,'logged'])->name('logged');
  

//Route::get('test', [LoginController::class, 
//'my_data']);

//Route::get('test', [exampleController::class, 
//'my_data']);


/*Route::get('about',function(){
    return view('about');
});
Route::get('contact-us',function(){
    return view('contact-us');
});
Route::prefix('blog')->group(function(){
    Route::get('science',function(){
        return'science page';
    });
    Route::get('math',function(){
        return'Math page';
    });
    Route::get('sport',function(){
        return'sport page';
    });
    Route::get('medical',function(){
        return'medical page';
    });

});*/






//Route::fallback(function(){
 //   return redirect('/');

//});
//Route::get('food',function(){
   // return view('food');

//});

//Route::prefix('lar')->group(function(){

//Route::get('test',function(){
    //return view('test');

//});
//Route::get('test1/{id}',function($id){
    //return 'Welcome to our :'.$id;
//});
/*Route::get('test2/{id?}',function($id=0){
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
});*/

