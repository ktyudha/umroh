@extends('admin.layout')

@php
    $title = 'Trips';
    $breadcrumbs = [['label' => 'Home', 'url' => route('admin.index')], ['label' => $title, 'url' => null]];
@endphp

@section('title', $title)

@section('content')


    @if (Session::has('status'))
        <div class="mb-5 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">Success alert!</span> {{ session('message') }}
        </div>
    @endif

    <div class="flex justify-between mb-2">
        <a href="{{ route('admin.transportation-trips.create') }}"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Create</a>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Information
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Airport
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Flight Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $key => $model)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <h5 class="font-medium text-black dark:text-white">{{ $model->transportation->name }} -
                                {{ ucfirst($model->transportation->class) }}</h5>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="font-bold">Departure</p>
                            <i class="fa-solid fa-plane-departure"></i>
                            {{ $model['date_departure'] }}
                            <p class="font-bold mt-2">Return</p>
                            <i class="fa-solid fa-plane-arrival"></i>
                            {{ $model['date_return'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="font-bold">From</p>
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $model['from_airport'] }}
                            <p class="font-bold mt-2">To</p>
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $model['to_airport'] }}
                        </td>
                        <td class="px-6 py-4 font-bold">
                            {{ $model['flight_number'] }}
                        </td>
                        <td class="px-6 py-4">
                            <button type="button"
                                class="cursor-default text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-3 py-1.5 text-center me-2 mb-2 capitalize">{{ $model['status'] }}</button>
                        </td>
                        <td class="my-auto mx-auto">
                            <div class="flex gap-4 justify-center">

                                <a href="{{ route('admin.transportation-trips.edit', $model->id) }}"
                                    class="hover:text-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <form action="{{ route('admin.transportation-trips.destroy', $model->id) }}"
                                    method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="hover:text-primary">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $models->links() }}
    </div>
@stop
