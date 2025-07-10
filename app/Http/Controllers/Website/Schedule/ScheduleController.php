<?php

namespace App\Http\Controllers\Website\Schedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pilgrimage\PilgrimageBatch;
use App\Models\Pilgrimage\PilgrimageType;
use Barryvdh\DomPDF\Facade\Pdf;

class ScheduleController extends Controller
{
    public function __construct()
    {
        view()->share('navbarActive', 'schedule');
    }

    public function index(Request $request)
    {
        // $data['types'] = PilgrimageType::all();
        $filters = $request->only(['search', 'departure_date']);
        $data['schedules'] = PilgrimageBatch::filter($filters)
            ->orderBy('departure_date', 'ASC')
            ->get();

        return view('website.schedule.index', $data);
    }

    public function show(string $slug)
    {
        $data['schedule'] = PilgrimageBatch::where('slug', $slug)->first();
        return view('website.schedule.show', $data);
    }

    public function printItinerary(string $slug)
    {
        $data['schedule'] =  PilgrimageBatch::where('slug', $slug)->firstOrFail();
        $pdf = Pdf::loadView('website.schedule.partials.itinerary-print', $data);
        return $pdf->stream('itinerary.pdf');
    }
}
