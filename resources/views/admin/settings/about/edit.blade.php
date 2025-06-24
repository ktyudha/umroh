@extends('admin.layout')

@section('title', 'About')

@section('styles')
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
@endsection

@section('content')
    <div class="block w-full bg-gray-100 py-6 rounded-lg dark:bg-gray-800 mb-10">
        <h1 class="text-4xl font-medium text-black px-10 dark:text-white">About</h1>
    </div>

    @if (Session::has('success'))
        <div class="mb-5 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">Success alert!</span> {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-5 flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
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
        <form id="form-about" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Title
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="hidden" name="lang" value="id">
                <input type="text" id="title" name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="title" value="{{ old('title') ?: @$about->title }}" required />
            </div>
            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Meta Keywords ({{ strtoupper($lang) }})
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <textarea type="text" id="meta_keywords" name="meta_keywords"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Meta Keywords" required>{{ old('meta_keywords') ?: @$about->meta_keywords }}</textarea>
            </div>
            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Meta Description ({{ strtoupper($lang) }})
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <textarea type="text" id="meta_description" name="meta_description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Meta Description" required>{{ old('meta_description') ?: @$about->meta_description }}</textarea>
            </div>
            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Description
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <div id="description" style="min-height: 60px;">{!! old('description') ?? @$about->description !!}</div>
                <textarea name="description" class="hidden"></textarea>
            </div>

            <div class="mr-auto">
                <button type="submit"
                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Save</button>
            </div>
        </form>
    </div>
@stop

@section('scripts')
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        let editor = new Quill('#description', {
            theme: 'snow'
        })

        const formAbout = document.querySelector('form#form-about')
        const textAreaDescription = document.querySelector('textarea[name=description]')

        formAbout.addEventListener('submit', (e) => {
            textAreaDescription.value = editor.root.innerHTML
        })
    </script>
@endsection
