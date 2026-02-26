<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Deneme extends Controller
{
    function test($isim){
        return "<h1>Fenerbahce sen cok yasa $isim </h1>";
        // ilk olarak web.phpye parametreyi ekliyorsun {} bunun içine
        // sonra buradaki fonksiyona parametreyi yolluyosun ve sonra da yazdırıyorsun.
    }
}
