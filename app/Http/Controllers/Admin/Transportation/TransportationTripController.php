<?php

namespace App\Http\Controllers\Admin\Transportation;

use App\Models\Transportation\TransportationTrip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transportation\Transportation;

class TransportationTripController extends Controller
{
    public function __construct()
    {
        view()->share('menuActive', 'transportations');
        view()->share('subMenuActive', 'transportation-trip');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['models'] = TransportationTrip::orderBy('id', 'desc')->paginate(10);
        return view('admin.transportation-trips.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['transportations'] = Transportation::all();
        return view('admin.transportation-trips.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'transportation_id' => 'required|exists:transportations,id',
            'date_departure' => 'required|date',
            'date_return'  => 'required|date',
            'from_airport'  => 'required|string',
            'to_airport' => 'required|string',
            'status' => 'required|string',
        ]);

        $payload = $request->all();

        $transportation = Transportation::findOrFail($request->transportation_id);
        $payload['flight_number'] = TransportationTrip::generateFlightNumber($transportation->code);

        $transportationTrip = new TransportationTrip($payload);
        $transportationTrip->save();

        return redirect()
            ->route('admin.transportation-trips.index')
            ->with(['status' => 'success', 'message' => 'Save Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(TransportationTrip $transportationTrip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransportationTrip $transportationTrip)
    {
        $data['model'] = $transportationTrip;
        $data['transportations'] = Transportation::all();
        return view('admin.transportation-trips.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransportationTrip $transportationTrip)
    {
        $request->validate([
            'date_departure' => 'required|date',
            'date_return'  => 'required|date',
            'from_airport'  => 'required|string',
            'to_airport' => 'required|string',
            'status' => 'required|string',
        ]);

        $transportationTrip->update($request->all());
        return redirect()->route('admin.transportation-trips.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransportationTrip $transportationTrip)
    {
        if ($transportationTrip->delete()) {
            return redirect()->route('admin.transportation-trips.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }

        return redirect()->route('admin.transportation-trips.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
