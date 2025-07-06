<?php

namespace App\Http\Controllers\Admin\Itinerary;

use App\Models\Itinerary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pilgrimage\PilgrimageBatch;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class ItineraryController extends Controller
{
    public function __construct()
    {
        view()->share('menuActive', 'itineraries');
        view()->share('subMenuActive', 'itineraries');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['models'] =  Itinerary::orderBy('date', 'DESC')->paginate(10);
        return view('admin.itineraries.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pilgrimageBatches'] = PilgrimageBatch::orderBy('id', 'DESC')->get();
        return view('admin.itineraries.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pilgrimage_batch_id' => 'required|exists:pilgrimage_batches,id',
            'description'  => 'nullable|string',
            'location'  => 'required|string',
            // 'day_number'  => 'required|numeric|min:0',
            'date' => 'required|date'
        ]);


        $itinerary = new Itinerary($request->all());
        $itinerary->save();

        return redirect()
            ->route('admin.itineraries.index')
            ->with(['status' => 'success', 'message' => 'Save Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Itinerary $itinerary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Itinerary $itinerary)
    {
        $data['model'] = $itinerary;
        $data['pilgrimageBatches'] = PilgrimageBatch::orderBy('id', 'DESC')->get();
        return view('admin.itineraries.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Itinerary $itinerary)
    {
        $request->validate([
            'pilgrimage_batch_id' => 'required|exists:pilgrimage_batches,id',
            'description'  => 'nullable|string',
            'location'  => 'required|string',
            'date' => 'required|date'
        ]);

        $itinerary->update($request->all());

        return redirect()->route('admin.itineraries.index')->with(['status' => 'success', 'message' => 'Update successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Itinerary $itinerary)
    {
        if ($itinerary->images) {
            foreach ($itinerary->images as $value) {
                Storage::delete($value->image);
            }
        }

        if ($itinerary->delete()) {
            return redirect()->route('admin.itineraries.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }

        return redirect()->route('admin.itineraries.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }

    public function createBatch($slug)
    {
        $data['pilgrimageBatch'] = PilgrimageBatch::where('slug', $slug)->first();

        $departure = Carbon::parse($data['pilgrimageBatch']->departure_date)->startOfDay();
        $return = Carbon::parse($data['pilgrimageBatch']->return_date)->endOfDay();

        $data['travelDates'] = collect(CarbonPeriod::create($departure, $return))
            ->map(fn($date) => $date->toDateString())
            ->toArray();

        $data['existingItineraries'] = Itinerary::where('pilgrimage_batch_id', $data['pilgrimageBatch']->id)
            ->get()
            ->keyBy(fn($item) => Carbon::parse($item->date)->toDateString());

        return view('admin.itineraries.batch', $data);
    }

    public function storeBatch(Request $request)
    {
        $request->validate([
            'pilgrimage_batch_id' => 'required|exists:pilgrimage_batches,id',
            'locations' => 'required|array',
            'locations.*' => 'required|string',
            'dates' => 'required|array',
            'dates.*' => 'required|date',
            'descriptions' => 'required|array',
            'descriptions.*' => 'required|string',
        ]);

        $batchId = $request->pilgrimage_batch_id;

        foreach ($request->locations as $index => $location) {
            Itinerary::updateOrCreate(
                [
                    'pilgrimage_batch_id' => $batchId,
                    'date' => $request->dates[$index],
                ],
                [
                    'location' => $location,
                    'description' => $request->descriptions[$index],
                ]
            );
        }

        return redirect()
            ->route('admin.pilgrimage-batch.index')
            ->with(['status' => 'success', 'message' => 'Save Successfully']);
    }
}
