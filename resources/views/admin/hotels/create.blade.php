@extends('admin.layout')

@php
    $title = 'Hotels';
    $breadcrumbs = [
        ['label' => 'Home', 'url' => route('admin.index')],
        ['label' => 'Hotels', 'url' => route('admin.hotels.index')],
        ['label' => 'Create', 'url' => null],
    ];
@endphp

@section('title', $title)


@section('styles')
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
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

    <div class="dark:bg-gray-800 rounded-lg p-6">
        <form class="form-horizontal flex flex-col gap-4" id="form-hotels" action="{{ route('admin.hotels.store') }}"
            method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Name
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name of hotels" value="{{ old('name') }}" required />
            </div>
            <div class="col-span-1">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Description
                </label>
                <textarea type="text" name="description" id="description" rows="3"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Description of hotels" required>{{ old('description') }}</textarea>
            </div>
            <div class="grid lg:grid-cols-2 grid-cols-1 mb-4 gap-4">
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Address
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <textarea name="address" id="address"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Address of hotels">{{ old('address') }}</textarea>
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Gmap
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <textarea name="gmap" id="gmap"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Gmaps of hotels">{{ old('gmap') }}</textarea>
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Price <span class="italic font-light text-xs">(ex:120000) without "." or ","</span>
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="text" id="price" name="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Price of pilgrimage batch" value="{{ old('price') }}" />
                </div>

                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Rating
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <div class="grid grid-cols-5">

                        @foreach (range(1, 5) as $i)
                            <div class="flex items-center">
                                <input id="radio-{{ $i }}" type="radio" value="{{ $i }}"
                                    name="rating"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    {{ old('rating') == $i ? 'checked' : '' }}>
                                <label for="radio-{{ $i }}"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    {{ $i }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Facility
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <div id="facility" style="min-height: 60px;">{!! old('facility') !!}</div>
                <textarea name="facility" class="hidden"></textarea>
            </div>

            <div>
                <button type="button" onclick="addDetailImage()"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><i
                        class="fa-regular fa-image text-sm mr-1"></i> Add
                    Image</button>
            </div>

            <div id="detail-hotel-images" class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-1 gap-3">
                <div class="hotel-images">
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" aria-describedby="file_input_help" id="file input" type="file" name="images[]"
                        onchange="document.querySelector('.hotel-images img#photo-0').src = window.URL.createObjectURL(this.files[0])"
                        accept="image/*">
                    <p class="mt-1 mb-3 block text-xs font-medium text-red-500 italic" id="file_input_help">
                        PNG, JPG, JPEG (MAX. 2MB).</p>
                    <img src="{{ asset('static/admin/images/default.png') }}" class="rounded object-cover h-48 w-48"
                        alt="photo" id="photo-0">
                </div>


            </div>

            <div class="mr-auto">
                <button type="submit"
                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Create</button>
            </div>
        </form>
    </div>
@stop

@section('scripts')
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        let editor = new Quill('#facility', {
            theme: 'snow'
        })

        const formAbout = document.querySelector('form#form-hotels')
        const textAreaFacility = document.querySelector('textarea[name=facility]')

        formAbout.addEventListener('submit', (e) => {
            textAreaFacility.value = editor.root.innerHTML
        })
    </script>

    {{-- Image --}}
    <script type="text/javascript">
        let indexImage = 0;

        function addDetailImage() {
            indexImage++;

            var html = ` <div class="hotel-images mb-3">
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file input" type="file" name="images[]"
                                onchange="document.querySelector('.hotel-images img#photo-${indexImage}').src = window.URL.createObjectURL(this.files[0])"
                                accept="image/*">
                            <p class="mt-1 mb-3 block text-xs font-medium text-red-500 italic" id="file_input_help">
                                PNG, JPG, JPEG (MAX. 2MB).</p>
                            <img src="{{ asset('static/admin/images/default.png') }}" class="rounded object-cover h-48 w-48"
                                alt="photo" id="photo-${indexImage}">

                            <button type="button" onclick="imageRemove(this)" class="mt-3 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                <i class="fa-solid fa-trash text-sm"></i>
                            </button>
                        </div>`;

            $('#detail-hotel-images').append(html);
        }

        function imageRemove(that) {
            $(that).parents('.hotel-images').remove();
        }
    </script>
@endsection
