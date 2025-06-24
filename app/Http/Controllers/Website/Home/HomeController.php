<?php

namespace App\Http\Controllers\Website\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        view()->share('navbarActive', 'home');
    }

    public function index()
    {
        return view('website.home.index');
    }
}
