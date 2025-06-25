@extends('admin.layout')

@section('title', 'Customer')

@section('content')
    <div class="block w-full bg-gray-100 py-6 rounded-lg dark:bg-gray-800 mb-10">
        <h1 class="text-4xl font-medium text-black px-10 dark:text-white">Customer</h1>
    </div>

    <div class="mt-10 dark:bg-gray-800 rounded-lg p-6 ">
        <h4>Individu</h4>
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Name
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->name }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    NIK
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->nik }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Birth Place
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="birth_place" name="birth_place"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->birth_place }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Birth Date
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="birth_date" name="birth_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->birth_date }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Gender
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="gender" name="gender"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->gender }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Marital Status
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="marital_status" name="marital_status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->marital_status }}" readonly disabled />
            </div>
            <div class="col-span-2">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Address
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <textarea type="text" name="address" id="address" rows="2"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>{{ @$customer->address }}</textarea>
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Province
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="province" name="province"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->province }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    City
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="city" name="city"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->city }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    District
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="district" name="district"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->district }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Postal Code
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="postal_code" name="postal_code"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->postal_code }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Phone
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="phone" name="phone"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->phone }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Email
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="email" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->email }}" readonly disabled />
            </div>
        </div>

        <h4>Family</h4>
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Name of Father
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="name_father" name="name_father"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->name_father }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Name of Mother
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="name_mother" name="name_mother"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->name_mother }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Name of Partner
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="name_partner" name="name_partner"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->name_partner }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Children Count
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="children_count" name="children_count"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->children_count }}" readonly disabled />
            </div>
        </div>

        <h4>Passport</h4>
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Passport Number
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="passsport_number" name="passsport_number"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->passport_number }}" readonly disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Passport Issuer Date
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="passport_issuer_date" name="passport_issuer_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->passport_issuer_date }}" readonly
                    disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Passport Expiry Date
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="passsport_expiry_date" name="passsport_expiry_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->passport_expiry_date }}" readonly
                    disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Passport Place Issued
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="passport_place_issued" name="passport_place_issued"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->passport_place_issued }}" readonly
                    disabled />
            </div>
        </div>

        <h4>Pilgrimage</h4>
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Pilgrimage Type
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="pilgrimage_type" name="pilgrimage_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->pilgrimageType->name }}" readonly
                    disabled />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Pilgrimage Batch
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="pilgrimage_batch" name="pilgrimage_batch"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ $customer->pilgrimageBatch->name }}" readonly
                    disabled />
            </div>
        </div>

        <h4>Document</h4>
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Photo 4x6
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <img src="{{ asset('storage/' . $customer->image) }}" alt="">
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    KTP
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <img src="{{ asset('storage/' . $customer->ktp) }}" alt="">
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    KK
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <img src="{{ asset('storage/' . $customer->kk) }}" alt="">
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Passport
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <img src="{{ asset('storage/' . $customer->passport) }}" alt="">
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Vaccine Certificate
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <img src="{{ asset('storage/' . $customer->vaccine_certificate) }}" alt="">
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Payment Proof
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <img src="{{ asset('storage/' . $customer->payment_proof) }}" alt="">
            </div>
        </div>
    </div>
@stop
