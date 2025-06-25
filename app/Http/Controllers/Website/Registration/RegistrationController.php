<?php

namespace App\Http\Controllers\Website\Registration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Pilgrimage\PilgrimageBatch;
use App\Models\Pilgrimage\PilgrimageType;

class RegistrationController extends Controller
{
    public function __construct()
    {
        view()->share('navbarActive', 'registration');
    }

    public function index()
    {
        $data['pilgrimageTypes'] = PilgrimageType::all();
        $data['pilgrimageBatches'] = PilgrimageBatch::all();
        return view('website.registration.index', $data);
    }

    public function store(Request $request)
    {
        $payload = $request->all();

        $fileFields = [
            'ktp' => 'customers/ktp',
            'kk' => 'customers/kk',
            'image' => 'customers/image',
            'passport' => 'customers/passport',
            'vaccine_certificate' => 'customers/vaccine',
            'payment_proof' => 'customers/payment',
        ];

        foreach ($fileFields as $field => $path) {
            if ($request->hasFile($field)) {
                $payload[$field] = $request->file($field)->store($path, 'public');
            }
        }

        $customer = new Customer($payload);
        $customer->save();

        return redirect()
            ->back()
            ->with(['status' => 'success', 'message' => 'Save Successfully']);
    }
}
