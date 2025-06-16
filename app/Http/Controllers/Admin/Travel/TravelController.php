<?php

namespace App\Http\Controllers\Admin\Travel;

use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TravelController extends Controller
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
        // dd($request);
        $request->validate([
            'name' => ['required', 'string'],
            'quota' => ['required', 'integer', 'min:0'],
            'car_id' => ['required', 'exists:cars,id'],
            'departure_date' => ['required', 'date'],
            'departure_time' => ['required'], // Format 24jam
        ]);

        $travel = new Travel($request->all());
        $travel->save();

        return redirect()->back()->with(['status' => 'success', 'message' => 'Data travel berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'quota' => ['required', 'integer', 'min:0'],
            'car_id' => ['required', 'exists:cars,id'],
            'departure_date' => ['required', 'date'],
            'departure_time' => ['required', 'date_format:H:i'],
        ]);

        $travel->update($request->all());

        return redirect()->back()->with(['status' => 'success', 'message' => 'Data travel berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        if ($travel->delete()) {
            return redirect()->route('admin.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
