<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Formkontrol
{

    public function handle(Request $request, Closure $next): Response
    {
        if($request->metin=="gs"){
            return redirect()->back()->withInput()->withErrors(['metin' => 'Bu değer kabul edilmiyor.']);
        }
        return $next($request);
    }
}
