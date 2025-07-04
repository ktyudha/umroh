<?php

namespace App\Http\Controllers\Admin\Transportation;

use App\Models\Transportation\Transportation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TransportationController extends Controller
{
    public function __construct()
    {
        view()->share('menuActive', 'transportations');
        view()->share('subMenuActive', 'transportation-airlines');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['models'] = Transportation::orderBy('id', 'desc')->paginate(10);
        return view('admin.transportations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.transportations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'code' => 'required|string|max:3',
            'class'  => 'nullable|string',
            'capacity'  => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $path = $request->file('image')->store('transportations', 'public');

        $transportation = new Transportation($request->all());
        $transportation->image = $path;

        $transportation->save();

        return redirect()
            ->route('admin.transportations.index')
            ->with(['status' => 'success', 'message' => 'Save Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transportation $transportation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transportation $transportation)
    {
        $data['model'] = $transportation;
        return view('admin.transportations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transportation $transportation)
    {
        $request->validate([
            'name' => 'required|max:250',
            'code' => 'required|string|max:3',
            'class'  => 'nullable|string',
            'capacity'  => 'required|numeric|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $payload = $request->all();

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if (Storage::exists($transportation->image)) {
                Storage::delete($transportation->image);
            }

            $path = $request->file('image')->store('transportations', 'public');
            $payload['image'] = $path;
        }

        $transportation->update($payload);

        return redirect()->route('admin.transportations.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transportation $transportation)
    {
        if (Storage::exists($transportation->image)) {
            Storage::delete($transportation->image);
        }

        if ($transportation->delete()) {
            return redirect()->route('admin.transportations.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }

        return redirect()->route('admin.transportations.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
