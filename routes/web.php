<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;

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

Route::get('login', function () {
    return view('login');
});

Route::post('logged', function () {
    return 'You are logged in';
})->name('logged');

Route::get('aya',[ExampleController::class,'show']);

Route::post('imageUpload',[ExampleController::class,'upload'])->name('imageUpload');

Route::get('test', function(){
    return view('testHome');
})->name('testHome');

Route::get('404', function(){
    return view('404');
})->name('404');

Route::get('contact', function(){
    return view('contact');
})->name('contact');

Route::get('image', function(){
    return view('image');
});


// Routes for the car table
Route::get('createcar',[CarController::class,'create'])->name('createcar');
Route::get('cars',[CarController::class,'index'])->name('cars');
Route::get('updatecar/{id}',[CarController::class,'edit']);
Route::get('showcar/{id}',[CarController::class,'show'])->middleware('verified')->name('showcar');
Route::get('deletecar/{id}',[CarController::class,'destroy']);
Route::get('trashed',[CarController::class,'trashed'])->name('trashed');
Route::get('restorecar/{id}',[CarController::class,'restore'])->name('restorecar');
Route::get('forceDelete/{id}',[CarController::class,'forceDelete'])->name('forceDelete');
Route::put('update/{id}',[CarController::class,'update'])->name('update');
Route::post('storecar',[CarController::class,'store'])->name('storecar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
