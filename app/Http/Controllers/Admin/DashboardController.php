<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ad;
use App\Models\AdType;
use App\Models\AdCategory;
use App\Models\City;
use App\Models\Neighborhood;
use App\Models\Admin;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data = [
            // "ads_count"             => Ad::count(),
            // "ad_categories_count"   => AdCategory::count(),
            // "ad_types_count"        => AdType::count(),
            // "cities_count"          => City::count(),
            // "neighborhoods_count"   => Neighborhood::count(),
            // "agents_count"          => Admin::count(),
        ];

        return view('admin.pages.dashboard',compact('data'));
    }
}
