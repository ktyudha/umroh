<?php

namespace App\Http\Controllers\Admin\Pilgrimage;

use App\Models\Pilgrimage\PilgrimageBatch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pilgrimage\PilgrimageType;

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
        return view('admin.pilgrimage-batch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'description'  => 'nullable|string',
            'departure_date'  => 'required|date',
            'return_date' => 'required|date|after_or_equal:departure_date',
            'price' => 'required|numeric|min:0'
        ]);

        $social = new PilgrimageBatch($request->all());
        $social->save();

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
            'departure_date'  => 'required|date',
            'return_date' => 'required|date|after_or_equal:departure_date',
            'price' => 'required|numeric|min:0'
        ]);

        $pilgrimageBatch->update($request->all());

        return redirect()->route('admin.pilgrimage-batch.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PilgrimageBatch $pilgrimageBatch)
    {
        if ($pilgrimageBatch->delete()) {
            return redirect()->route('admin.pilgrimage-batch.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }

        return redirect()->route('admin.pilgrimage-batch.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
