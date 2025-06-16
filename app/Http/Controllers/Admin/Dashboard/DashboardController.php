<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Travel;
use App\Models\Car;


class DashboardController extends Controller
{


    public function index()
    {
        $data['travels'] = Travel::all();
        $data['cars'] = Car::all();
        return view('admin.dashboard.index', $data);
    }
}
