<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Travel;
use App\Models\Car;
use App\Models\Pasengger;

class DashboardController extends Controller
{
    public function __construct()
    {
        view()->share('menuActive', 'dashboard');
        view()->share('subMenuActive', 'dashboard');
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }
}
