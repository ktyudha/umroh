<?php

namespace App\Http\Controllers\Admin\Pilgrimage;

use App\Models\Pilgrimage\PilgrimageType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PilgrimageTypeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('permission:pilgrimage type read');
        // $this->middleware('permission:pilgrimage type create')->only('create', 'store');
        // $this->middleware('permission:pilgrimage type update')->only('edit', 'update');
        // $this->middleware('permission:pilgrimage type delete')->only('destroy');

        view()->share('menuActive', 'pilgrimage');
        view()->share('subMenuActive', 'pilgrimage-type');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['models'] = PilgrimageType::orderBy('id', 'desc')->paginate(10);
        return view('admin.pilgrimage-type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pilgrimage-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'description'  => 'nullable|string',
        ]);

        $social = new PilgrimageType($request->all());
        $social->save();

        return redirect()
            ->route('admin.pilgrimage-type.index')
            ->with(['status' => 'success', 'message' => 'Save Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(PilgrimageType $pilgrimageType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PilgrimageType $pilgrimageType)
    {
        $data['model'] = $pilgrimageType;

        return view('admin.pilgrimage-type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PilgrimageType $pilgrimageType)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'description'  => 'nullable|string',
        ]);

        $pilgrimageType->update($request->all());

        return redirect()->route('admin.pilgrimage-type.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PilgrimageType $pilgrimageType)
    {
        if ($pilgrimageType->delete()) {
            return redirect()->route('admin.pilgrimage-type.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }

        return redirect()->route('admin.pilgrimage-type.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
