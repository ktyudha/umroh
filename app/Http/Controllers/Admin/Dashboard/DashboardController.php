<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Travel;
use App\Models\Car;
use App\Models\Pasengger;

class DashboardController extends Controller
{


    public function index()
    {
        $data['travels'] = Travel::all();
        $data['passengers'] = Pasengger::all();
        $data['cars'] = Car::all();

        $data['passenger_count'] = Pasengger::count();



        return view('admin.dashboard.index', $data);
    }
}
