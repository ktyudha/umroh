<?php

namespace App\Http\Controllers\Website\Regulation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegulationController extends Controller
{
    public function __construct()
    {
        view()->share('navbarActive', 'regulation');
    }

    public function index()
    {
        return view('website.regulation.index');
    }
}
