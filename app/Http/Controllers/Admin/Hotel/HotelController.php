<?php

namespace App\Http\Controllers\Admin\Hotel;

use App\Models\Hotel\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel\HotelImage;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function __construct()
    {
        view()->share('menuActive', 'hotels');
        view()->share('subMenuActive', 'hotels');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['models'] = Hotel::orderBy('id', 'desc')->paginate(10);
        return view('admin.hotels.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'description'  => 'nullable|string',
            'address'  => 'required',
            'rating'  => 'required|numeric|min:0',
            'gmap' => 'required',
            'facility' => 'required',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $payload = $request->only(['name', 'description', 'address', 'rating', 'gmap', 'facility']);

        $hotel = new Hotel($payload);

        if ($hotel->save()) {
            foreach ($request->file('images') as $image) {

                $hotelImage = new HotelImage();
                $pathHotelImage = $image->store('hotels', 'public');

                $hotelImage->hotel_id = $hotel->id;
                $hotelImage->image = $pathHotelImage;
                $hotelImage->save();
            }
        }

        return redirect()
            ->route('admin.hotels.index')
            ->with(['status' => 'success', 'message' => 'Save Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        $data['model'] = $hotel;
        return view('admin.hotels.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required|max:250',
            'description' => 'nullable|string',
            'address' => 'required',
            'rating' => 'required|numeric|min:0',
            'gmap' => 'required',
            'facility' => 'required',

            // Optional: hanya jika user upload gambar baru
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $recentImage  = HotelImage::where('hotel_id', $hotel->id)->get();

        // gambar Update
        foreach ($recentImage as  $result) {

            if ($request->file('image-' . $result->id)) {
                $newImage = $request->file('image-' . $result->id)->store('hotels');

                if ($newImage) {
                    Storage::delete($result->image);
                }

                $result->update(['hotel_id' => $hotel->id, 'image' => $newImage]);
            }
            // gambar dihapus
            elseif (!$request->input('isimage-' . $result->id)) {
                Storage::delete($result->image);  // hapus gambar di storage
                $result->delete(); // hapus data
            }
        }

        // image baru
        if ($request->hasFile('images')) {
            foreach ($request->images as $value) {
                if ($value) {
                    $image                = new HotelImage();
                    $imagex               = $value->store('hotels', 'public');
                    $image->hotel_id    = $hotel->id;
                    $image->image         = $imagex;
                    $image->save();
                }
            }
        }

        $hotel->update($request->all());

        return redirect()->route('admin.hotels.index')->with(['status' => 'success', 'message' => 'Update successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        if (Storage::exists($hotel->image)) {
            Storage::delete($hotel->image);
        }

        if ($hotel->images) {
            foreach ($hotel->images as $value) {
                Storage::delete($value->image);
            }
        }

        if ($hotel->delete()) {
            return redirect()->route('admin.pilgrimage-batch.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }

        return redirect()->route('admin.pilgrimage-batch.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
