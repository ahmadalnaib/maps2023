<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Arr;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locales=config('locales.languages');
        if(!array_key_exists($request->segment(1),$locales)){
            $segments=$request->segments();

            $segments=Arr::prepend($segments,config('locales.fallback_locale'));
            return redirect()->to(implode('/',$segments));
        }
        return $next($request);
    }
}
