<?php

namespace App\Http\Controllers\Website\Schedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pilgrimage\PilgrimageBatch;
use App\Models\Pilgrimage\PilgrimageType;

class ScheduleController extends Controller
{
    public function __construct()
    {
        view()->share('navbarActive', 'schedule');
    }

    public function index(Request $request)
    {
        // $filter = $request->validate(['type' => 'string|nullable']);
        $search = $request->get('search');

        $data['types'] = PilgrimageType::all();

        // $data['schedulesHaji'] = PilgrimageBatch::whereRelation('pilgrimageType', 'name', 'haji')->orderBy('departure_date', 'ASC')->get();
        // $data['schedulesUmroh'] = PilgrimageBatch::whereRelation('pilgrimageType', 'name', 'umroh')->orderBy('departure_date', 'ASC')->get();
        $data['schedules'] = PilgrimageBatch::where('name', 'like', "%{$search}%")->orderBy('departure_date', 'ASC')->get();

        return view('website.schedule.index', $data);
    }
}
