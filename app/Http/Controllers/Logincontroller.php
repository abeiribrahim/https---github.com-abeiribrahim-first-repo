<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class Logincontroller extends Controller
{
    public function logged(Request $request){
      $IncomeFields=$request->validate([
         'email'=>'required',
         'pwd'=>'required',
         'name'=>'required',
      ]);

        return $IncomeFields ;
       }
     
    }
