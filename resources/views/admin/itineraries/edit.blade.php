@extends('admin.layout')

@php
    $title = 'Itineraries';
    $breadcrumbs = [
        ['label' => 'Home', 'url' => route('admin.index')],
        ['label' => $title, 'url' => route('admin.itineraries.index')],
        ['label' => 'Edit', 'url' => null],
    ];
@endphp

@section('styles')
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <style>
        .ts-control {
            border: 0px;
            padding: 11px 8px 11px 8px;
            border-radius: 10px;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity, 1));
        }
    </style>
@endsection

@section('content')
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
        <form class="form-horizontal flex flex-col gap-4" id="form-itineraries"
            action="{{ route('admin.itineraries.update', $model->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-6">
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Pilgrimage Batch
                        <small class="text-red-500 font-bold">*</small>
                    </label>

                    <select id="pilgrimage_batch_id" name="pilgrimage_batch_id" placeholder="Search a batch"
                        class="tom-select bg-gray-50 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="" disabled {{ old('pilgrimage_batch_id') ? '' : 'selected' }} hidden>Choose a
                            batch
                        </option>
                        @foreach ($pilgrimageBatches as $batch)
                            <option value="{{ $batch->id }}"
                                {{ old('pilgrimage_batch_id', $model->pilgrimage_batch_id) == $batch->id ? 'selected' : '' }}>
                                {{ ucfirst($batch->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Location
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="text" id="location" name="location"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Location of itinerary" value="{{ old('location') ?: $model->location }}" required />
                </div>

                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Date
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="date" id="date" name="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('date') ?: $model->date->format('Y-m-d') }}" required />
                </div>
            </div>

            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Description
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <div id="description" style="min-height: 60px;">{!! old('description') ?: $model->description !!}</div>
                <textarea name="description" class="hidden"></textarea>
            </div>


            <div class="mr-auto">
                <button type="submit"
                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Update</button>
            </div>
        </form>
    </div>
@stop

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        let editor = new Quill('#description', {
            theme: 'snow'
        })

        const form = document.querySelector('form#form-itineraries')
        const textAreaDescription = document.querySelector('textarea[name=description]')

        form.addEventListener('submit', (e) => {
            textAreaDescription.value = editor.root.innerHTML
        })
    </script>

    <script>
        document.querySelectorAll('.tom-select').forEach(function(el) {
            new TomSelect(el, {
                plugins: ['remove_button'],
                persist: false,
                create: false,
                placeholder: el.getAttribute('placeholder') || 'Select options'
            });
        });
    </script>
@stop
