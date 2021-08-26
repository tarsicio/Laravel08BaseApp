<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Lenguaje
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
         /*
         * If esta a true el valor de la variable status que tenemos en locale.php
         */
        if (config('local.status')) {
            if (session()->has('local') &&
                in_array(session()->get('local'), array_keys(config('local.languages')))) {
                /*
                 * Establece el locale de Laravel
                 */
                app()->setLocale(session()->get('local'));
                setlocale(LC_TIME, config('local.languages')[session()->get('local')][1]);
                Carbon::setLocale(config('local.languages')[session()->get('local')][0]);
                if (config('local.languages')[session()->get('local')][2]) {
                    session(['lang-rtl' => true]);
                } else {
                    session()->forget('lang-rtl');
                }
            }
        }
        return $next($request);
    }
}
