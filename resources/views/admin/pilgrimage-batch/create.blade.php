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
            action="{{ route('admin.pilgrimage-batch.store') }}" method="post">
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
                {{-- <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Pilgrimage Type
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <div>
                        <select id="type" name="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled @if (!old('type')) selected @endif>Choose a type</option>
                            @foreach ($pilgrimageTypes as $key => $type)
                                <option value="{{ $type->id }}" {{ @$model->id == $type ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div> --}}
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Price <span class="italic font-light text-xs">(ex:120000) without "." or ","</span>
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="text" id="price" name="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Price of pilgrimage batch" value="{{ old('price') }}" required />
                </div>
            </div>

            <div class="mr-auto">
                <button type="submit"
                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Create</button>
            </div>
        </form>
    </div>
@stop
