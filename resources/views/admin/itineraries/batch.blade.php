@extends('admin.layout')

@php
    $title = 'Itineraries';
    $breadcrumbs = [
        ['label' => 'Home', 'url' => route('admin.index')],
        ['label' => $title, 'url' => route('admin.itineraries.index')],
        ['label' => 'Batch', 'url' => null],
    ];
@endphp

@section('title', $title)

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

    <div class="dark:bg-gray-800 rounded-lg p-6 ">
        <form class="form-horizontal " id="form-itineraries" action="{{ route('admin.itineraries.store-batch') }}"
            method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Pilgrimage batch
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="text"
                        class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Pilgrimage batch of itinerary" value="{{ $pilgrimageBatch->name }}" readonly
                        disabled />
                    <input type="hidden" name="pilgrimage_batch_id" id="pilgrimage_batch_id"
                        value="{{ $pilgrimageBatch->id }}">
                </div>

                <div class="mb-4">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Pilgrimage type
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="text"
                        class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Pilgrimage type of itinerary" value="{{ $pilgrimageBatch->pilgrimageType->name }}"
                        readonly disabled />
                </div>
                @foreach ($travelDates as $key => $date)
                    @php
                        $existing = $existingItineraries[$date] ?? null;
                    @endphp

                    <div class="flex flex-col gap-2 bg-gray-100 dark:bg-gray-900 p-2 rounded-lg">
                        <div>
                            <button type="button"
                                class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-l-lg text-sm px-2 py-2 text-center mb-2">
                                Day {{ $key + 1 }}</button>
                            <button
                                class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-r-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                <span
                                    class="relative px-1.5 py-1.5 transition-all ease-in duration-75 bg-gray-100 dark:bg-gray-900 rounded-r-md group-hover:bg-transparent group-hover:dark:bg-transparent">
                                    {{ parseDate($date) }}
                                </span>
                            </button>
                        </div>

                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Location
                                <small class="text-red-500 font-bold">*</small>
                            </label>
                            <input type="text" id="locations[]" name="locations[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Location of itinerary"
                                value="{{ old('locations.' . $key, $existing?->location) }}" required />
                            <input type="hidden" id="dates[]" name="dates[]" value="{{ $date }}">
                        </div>

                        <div class="mb-2">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Description
                                <small class="text-red-500 font-bold">*</small>
                            </label>

                            <textarea type="text" id="descriptions[]" name="descriptions[]" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Description of itinerary" required>{{ old('descriptions.' . $key, $existing?->description) }}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mr-auto mt-8">
                <button type="submit"
                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Save</button>
            </div>
        </form>
    </div>
@stop

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        let editor = new Quill('#descriptions[]', {
            theme: 'snow'
        })

        const form = document.querySelector('form#form-itineraries')
        const textAreaDescription = document.querySelector('textarea[name=descriptions[]]')

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
