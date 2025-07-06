@extends('admin.layout')

@php
    $title = 'Inboxes';
    $breadcrumbs = [
        ['label' => 'Home', 'url' => route('admin.index')],
        ['label' => $title, 'url' => route('admin.inboxes.index')],
        ['label' => 'Edit', 'url' => null],
    ];
@endphp

@section('title', $title)

@section('styles')
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
@endsection

@section('content')

    @if ($errors->any())
        <div class=" flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
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
        <form class="form-horizontal flex flex-col gap-4" id="form-posts"
            action="{{ route('admin.inboxes.update', $model->id) }}" method="POST" enctype="multipart/form-data">

            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Name
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name" value="{{ old('name') ?: $model->name }}" readonly />
            </div>

            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Email
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="email" id="email" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="umroh@gmail.com" value="{{ old('email') ?: $model->email }}" required />
            </div>

            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Message
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <textarea type="text" id="description" name="description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Message of the inboxes" required>{{ old('description') ?: @$model['description'] }}</textarea>
            </div>
            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Respond
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <div id="respond" style="min-height: 60px;">{!! old('respond') ?? @$model->respond !!}</div>
                <textarea name="respond" class="hidden"></textarea>
            </div>

            <div class="mr-auto">
                <button type="submit"
                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Respond</button>
            </div>
        </form>
    </div>
@stop

@section('scripts')
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        let editor = new Quill('#respond', {
            theme: 'snow'
        })

        const formAbout = document.querySelector('form#form-posts')
        const textAreaRespond = document.querySelector('textarea[name=respond]')

        formAbout.addEventListener('submit', (e) => {
            textAreaRespond.value = editor.root.innerHTML
        })
    </script>
@endsection
