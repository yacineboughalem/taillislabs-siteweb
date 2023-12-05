<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;

class SetLocale
{

    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setlocale(Session::get('locale'));
        }
        return $next($request);
    }
}
