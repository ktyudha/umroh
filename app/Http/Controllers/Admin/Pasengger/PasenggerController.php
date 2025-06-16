<?php

namespace App\Http\Controllers\Admin\Pasengger;

use App\Models\Pasengger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasenggerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'passenger' => ['required', 'string'],
            'travel_id' => ['required', 'exists:travel,id'],
            'pickup_location' => ['required'],
        ]);

        $parsePassenger = parsePassenger($request->passenger);
        $code = Pasengger::generateBookingCode($request->travel_id);

        $payload = [
            'code' => $code,
            'name' => $parsePassenger['name'],
            'age' => $parsePassenger['age'],
            'city' => $parsePassenger['city'],
            'travel_id' => $request->travel_id,
            'pickup_location' => $request->pickup_location,
            'whatsapp' => $request->whatsapp
        ];

        $passenger = new Pasengger($payload);
        $passenger->save();

        return redirect()->back()->with(['status' => 'success', 'message' => 'Data penumpang berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasengger $pasengger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasengger $pasengger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasengger $pasengger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasengger $pasengger)
    {
        //
    }
}
