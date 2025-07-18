@extends('admin.layout')

@php
    $title = 'Pilgrimage Batches';
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
        <a href="{{ route('admin.pilgrimage-batch.create') }}"
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
                        Departure Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Return Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Duration
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $key => $model)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4 min-w-60">
                            <h5 class="font-medium text-black dark:text-white">{{ $model['name'] }}</h5>
                            {{ $model['description'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $model['departure_date']->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $model->return_date->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $model['duration'] }} Days
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ formatRupiah($model['price']) }}
                        </td>
                        <td class="my-auto mx-auto">
                            <div class="flex gap-4 justify-center">

                                <a href="{{ route('admin.itineraries.batch', $model->slug) }}" class="hover:text-primary"
                                    data-tooltip-target="tooltip-batch-{{ $model->id }}">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                </a>

                                <a href="{{ route('admin.pilgrimage-batch.edit', $model->id) }}"
                                    data-tooltip-target="tooltip-batch-edit-{{ $model->id }}"
                                    class="hover:text-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <form action="{{ route('admin.pilgrimage-batch.destroy', $model->id) }}" method="post"
                                    data-tooltip-target="tooltip-batch-delete-{{ $model->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="hover:text-primary">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                                <div id="tooltip-batch-{{ $model->id }}" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-1.5 py-0.5 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                    Itineraries
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <div id="tooltip-batch-edit-{{ $model->id }}" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-1.5 py-0.5 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                    Edit
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <div id="tooltip-batch-delete-{{ $model->id }}" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-1.5 py-0.5 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                    Delete
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
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
