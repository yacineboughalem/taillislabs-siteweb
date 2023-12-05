<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

class HomeController extends Controller
{
    public function index( )
    {
        return view('frontend.pages.index');
    }

    public function lang($lang){
        Session::put('locale', $lang);
        Session::save();
        return back();
    }

}
