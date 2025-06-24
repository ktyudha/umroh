<?php

namespace App\Http\Controllers\Website\Schedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function __construct()
    {
        view()->share('navbarActive', 'schedule');
    }

    public function index()
    {
        return view('website.schedule.index');
    }
}
