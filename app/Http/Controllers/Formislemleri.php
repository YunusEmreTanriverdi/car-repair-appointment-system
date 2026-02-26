<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Formislemleri extends Controller
{
    public function forms(){
 
        return view('form');
    }

    public function sonuc(Request $request){
        return $request->metin;
    }
}
