<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Pilgrimage\PilgrimageBatch;
use App\Models\Pilgrimage\PilgrimageType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:pilgrimage type read');
        // $this->middleware('permission:pilgrimage type create')->only('create', 'store');
        // $this->middleware('permission:pilgrimage type update')->only('edit', 'update');
        // $this->middleware('permission:pilgrimage type delete')->only('destroy');

        view()->share('menuActive', 'customers');
        view()->share('subMenuActive', 'customers');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['models'] = Customer::orderBy('id', 'desc')->paginate(10);
        return view('admin.customers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pilgrimageTypes'] = PilgrimageType::all();
        $data['pilgrimageBatches'] = PilgrimageBatch::all();
        return view('admin.customers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {

        $payload = $request->validated();

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
            ->route('admin.customers.index')
            ->with(['status' => 'success', 'message' => 'Save Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $data['customer'] = $customer;
        return view('admin.customers.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer)
    {

        $payload =  $request->validated();

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
                // Hapus file lama jika ada
                if (Storage::exists($customer->$field)) {
                    unlink('storage/' . $customer->field);
                }

                $payload[$field] = $request->file($field)->store($path, 'public');
            }
        }

        $customer->update($payload);

        return redirect()
            ->route('admin.customers.index')
            ->with(['status' => 'success', 'message' => 'Update successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $fileFields = [
            'ktp',
            'kk',
            'image',
            'passport',
            'vaccine_certificate',
            'payment_proof',
        ];

        // Hapus file jika ada
        foreach ($fileFields as $field) {
            if ($customer->$field) {
                Storage::disk('public')->delete($customer->$field);
            }
        }

        // Hapus record dari database
        $customer->delete();

        return redirect()
            ->route('admin.customers.index')
            ->with(['status' => 'success', 'message' => 'Customer deleted successfully']);
    }
}
