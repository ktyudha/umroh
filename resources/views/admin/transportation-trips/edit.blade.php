@extends('admin.layout')

@section('title', 'Transportations')

@section('content')
    <div class="block w-full bg-gray-100 py-6 rounded-lg dark:bg-gray-800">
        <h1 class="text-4xl font-medium text-black px-10 dark:text-white">Transportations</h1>
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
        <form class="form-horizontal flex flex-col gap-4" id="form-transportation-trips"
            action="{{ route('admin.transportation-trips.update', $model->id) }}" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Airline
                    <small class="text-red-500 font-bold">*</small>
                </label>

                <select id="transportation_id" name="transportation_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled @if (!old('transportation_id')) selected @endif>Choose a airline</option>
                    @foreach ($transportations as $key => $class)
                        <option value="{{ $class->id }}" {{ @$model->id == $class->id ? 'selected' : '' }}>
                            [{{ $class->code }}] {{ ucfirst($class->name) }} - {{ ucfirst($class->class) }} -
                            {{ $class->capacity }} Seat
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Date of Departure
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="datetime-local" id="date_departure" name="date_departure"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('date_departure') ?: $model->date_departure }}" required />
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Date of Return
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="datetime-local" id="date_return" name="date_return"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('date_return') ?: $model->date_return }}" required />
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        From the Airport
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="text" id="from_airport" name="from_airport"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="From Airport of transportation trips"
                        value="{{ old('from_airport') ?: $model->from_airport }}" maxlength="3" required />
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        To the Airport
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="text" id="to_airport" name="to_airport"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="To Airport of transportation trips"
                        value="{{ old('to_airport') ?: $model->to_airport }}" maxlength="3" required />
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Status
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <div class="grid grid-cols-3">

                        @php
                            $transportationStatus = ['scheduled', 'completed', 'cancelled'];
                        @endphp

                        @foreach ($transportationStatus as $status)
                            <div class="flex items-center">
                                <input {{ old('status', $model->status) == $status ? 'checked' : '' }} id="status"
                                    type="radio" value="{{ $status }}" name="status"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="status"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ ucfirst($status) }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="mr-auto">
                <button type="submit"
                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Update</button>
            </div>
        </form>
    </div>
@stop
