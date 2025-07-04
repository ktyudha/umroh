<?php

namespace App\Http\Controllers\Admin\Pilgrimage;

use App\Models\Pilgrimage\PilgrimageBatch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel\Hotel;
use App\Models\Pilgrimage\PilgrimageType;
use App\Models\Transportation\TransportationTrip;
use Illuminate\Support\Facades\Storage;

class PilgrimageBatchController extends Controller
{

    public function __construct()
    {
        // $this->middleware('permission:pilgrimage type read');
        // $this->middleware('permission:pilgrimage type create')->only('create', 'store');
        // $this->middleware('permission:pilgrimage type update')->only('edit', 'update');
        // $this->middleware('permission:pilgrimage type delete')->only('destroy');

        view()->share('menuActive', 'pilgrimage');
        view()->share('subMenuActive', 'pilgrimage-batch');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['models'] = PilgrimageBatch::orderBy('id', 'desc')->paginate(10);
        return view('admin.pilgrimage-batch.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pilgrimageTypes'] = PilgrimageType::all();
        $data['hotels'] = Hotel::all();
        $data['transportationTrips'] = TransportationTrip::all();

        return view('admin.pilgrimage-batch.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'description'  => 'nullable|string',
            'pilgrimage_type_id'  => 'required|exists:pilgrimage_types,id',
            'departure_date'  => 'required|date',
            'return_date' => 'required|date|after_or_equal:departure_date',
            'price' => 'required|numeric|min:0',
            'quota'  => 'required|integer|min:0',
            'status' => 'required|in:sold,available,pending',
            'image' => 'required|image',

            // Hotels
            'hotel_ids' => 'required|array',
            'hotel_ids.*' => 'exists:hotels,id',

            // Transportation Trips
            'transportation_trip_ids' => 'required|array',
            'transportation_trip_ids.*' => 'exists:transportation_trips,id',
        ]);

        $path = $request->file('image')->store('pilgrimage_batches');

        $social = new PilgrimageBatch($request->all());
        $social->image = $path;

        $social->save();

        // Save Relation
        $social->transportationTrips()->attach($request->transportation_trip_ids);
        $social->hotels()->attach($request->hotel_ids);

        return redirect()
            ->route('admin.pilgrimage-batch.index')
            ->with(['status' => 'success', 'message' => 'Save Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(PilgrimageBatch $pilgrimageBatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PilgrimageBatch $pilgrimageBatch)
    {
        $data['model'] = $pilgrimageBatch;

        $data['pilgrimageTypes'] = PilgrimageType::all();
        $data['hotels'] = Hotel::all();
        $data['transportationTrips'] = TransportationTrip::all();

        return view('admin.pilgrimage-batch.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PilgrimageBatch $pilgrimageBatch)
    {
        $request->validate([
            'name' => 'required|max:250',
            'description'  => 'nullable|string',
            'pilgrimage_type_id'  => 'required|exists:pilgrimage_types,id',
            'departure_date'  => 'required|date',
            'return_date' => 'required|date|after_or_equal:departure_date',
            'price' => 'required|numeric|min:0',
            'quota'  => 'required|integer|min:0',
            'status' => 'required|in:sold,available,pending',
            'image' => 'image|max:2048',

            // Relations
            'hotel_ids' => 'required|array',
            'hotel_ids.*' => 'exists:hotels,id',
            'transportation_trip_ids' => 'required|array',
            'transportation_trip_ids.*' => 'exists:transportation_trips,id',
        ]);

        $payload = $request->all();

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if (Storage::exists($pilgrimageBatch->image)) {
                Storage::delete($pilgrimageBatch->image);
            }

            $path = $request->file('image')->store('pilgrimage_batches');
            $payload['image'] = $path;
        }

        $pilgrimageBatch->update($payload);

        $pilgrimageBatch->hotels()->sync($request->hotel_ids);
        $pilgrimageBatch->transportationTrips()->sync($request->transportation_trip_ids);

        return redirect()->route('admin.pilgrimage-batch.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PilgrimageBatch $pilgrimageBatch)
    {
        if (Storage::exists($pilgrimageBatch->image)) {
            Storage::delete($pilgrimageBatch->image);
        }

        if ($pilgrimageBatch->delete()) {
            return redirect()->route('admin.pilgrimage-batch.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }

        return redirect()->route('admin.pilgrimage-batch.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
