@extends('admin.layout')

@section('title', 'Pilgrimage Batch')


@section('content')
    <div class="block w-full bg-gray-100 py-6 rounded-lg dark:bg-gray-800">
        <h1 class="text-4xl font-medium text-black px-10 dark:text-white">Pilgrimage Batch</h1>
    </div>

    @if ($errors->any())
        <div class="mt-10 flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Danger</span>
            <div>
                <span class="font-medium">Ensure that these requirements are met:</span>
                <ul class="mt-1.5 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li class="capitalize">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="mt-10 dark:bg-gray-800 rounded-lg p-6">
        <form class="form-horizontal flex flex-col gap-4" id="form-posts"
            action="{{ route('admin.pilgrimage-batch.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Name
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of pilgrimage batch" value="{{ old('name') }}" required />
            </div>
            <div class="col-span-1">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Description
                </label>
                <textarea type="text" name="description" id="description" rows="3"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Description of pilgrimage batch" required>{{ old('description') }}</textarea>
            </div>
            <div class="grid grid-cols-2 mb-4 gap-4">
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Date of Departure
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="datetime-local" id="departure_date" name="departure_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('departure_date') }}" required />
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Date of Return
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="datetime-local" id="return_date" name="return_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('return_date') }}" required />
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Pilgrimage Type
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <div>
                        <select id="type" name="pilgrimage_type_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled @if (!old('pilgrimage_type_id')) selected @endif>Choose a type</option>
                            @foreach ($pilgrimageTypes as $key => $type)
                                <option value="{{ $type->id }}" {{ @$model->id == $type ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Price <span class="italic font-light text-xs">(ex:120000) without "." or ","</span>
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="text" id="price" name="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Price of pilgrimage batch" value="{{ old('price') }}" required />
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Quota
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="number" id="quota" min="0" name="quota"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Quota of pilgrimage batch" value="{{ old('quota') }}" required />
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Status
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <div class="grid grid-cols-3">
                        {{-- <div class="flex items-center ps-4 border border-gray-200 rounded-sm dark:border-gray-700">
                            <input id="bordered-radio-1" type="radio" value="" name="status"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default
                                radio</label>
                        </div>
                        <div class="flex items-center ps-4 border border-gray-200 rounded-sm dark:border-gray-700">
                            <input checked id="bordered-radio-2" type="radio" value="" name="status"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Checked
                                state</label>
                        </div> --}}

                        <div class="flex items-center">
                            <input checked id="radio-available" type="radio" value="available" name="status"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="radio-available"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Available</label>
                        </div>
                        <div class="flex items-center">
                            <input id="radio-pending" type="radio" value="pending" name="status"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="radio-pending"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pending</label>
                        </div>
                        <div class="flex items-center">
                            <input id="radio-sold" type="radio" value="sold" name="status"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="radio-sold"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sold</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5 form-group">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Image
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="image" type="file" name="image"
                    onchange="document.querySelector('.form-group img').src = window.URL.createObjectURL(this.files[0])"
                    accept="image/*">
                <p class="my-1 text-sm text-red-500 italic" id="file_input_help"> PNG, JPG, JPEG
                    (MAX.
                    2MB).</p>

                <img src="{{ asset('static/admin/images/default.png') }}" class="rounded object-cover h-48 w-48"
                    alt="photo">
            </div>

            <div class="mr-auto">
                <button type="submit"
                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Create</button>
            </div>
        </form>
    </div>
@stop
