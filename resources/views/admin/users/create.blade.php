@extends('admin.layout')

@php
    $title = 'Users';
    $breadcrumbs = [
        ['label' => 'Home', 'url' => route('admin.index')],
        ['label' => $title, 'url' => route('admin.users.index')],
        ['label' => 'Create', 'url' => null],
    ];
@endphp

@section('title', $title)

@section('content')
    @if ($errors->any())
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
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
        <form class="form-horizontal flex flex-col gap-4" id="form-posts" action="{{ route('admin.users.store') }}"
            method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Name
                    <small class="text-red-500 font-bold">*</small>
                </label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name" value="{{ old('name') }}" required />
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Username
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="text" id="username" name="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Username" value="{{ old('username') }}" required />
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Email
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="umroh@gmail.com" value="{{ old('email') }}" required />
                </div>
            </div>
            <hr>
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Password
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Password" value="{{ old('password') }}" required />
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Password Confirmation
                        <small class="text-red-500 font-bold">*</small>
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Password confirmation" value="{{ old('password_confirmation') }}" required />
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

                @if (auth()->user()->hasRole('superadmin'))
                    <div class="mb-6">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Role
                            <small class="text-red-500 font-bold">*</small>
                        </label>
                        <div>
                            <select id="role" name="role"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled @if (!old('role')) selected @endif>Choose a role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" @if ($role->name === 'superadmin') disabled @endif>
                                        {{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                @endif
            </div>
            <div class="mr-auto">
                <button type="submit"
                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Create</button>
            </div>
        </form>
    </div>
@stop
