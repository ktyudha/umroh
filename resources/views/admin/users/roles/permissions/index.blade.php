@extends('admin.layout')

@php
    $title = 'Permissions';
    $breadcrumbs = [['label' => 'Home', 'url' => route('admin.index')], ['label' => $title, 'url' => null]];
@endphp

@section('title', $title)

@section('content')
    @if (Session::has('status'))
        <div class="mt-10 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">Success alert!</span> {{ session('message') }}
        </div>
    @endif

    <div class="mt-10 bg-gray-100 dark:bg-gray-800 rounded-lg p-6">
        <form class="form-horizontal flex flex-col gap-4" method="POST">
            @csrf
            <section>
                <h6 class="text-muted mb-3">Admin Panel</h6>

                <div class="flex items-center">
                    <input @if ($role->hasPermissionTo('admin access') or $role->name === 'superadmin') checked @endif id="admin_access" name="admin_access"
                        type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="admin_access" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin
                        panel access</label>
                </div>
            </section>

            <div class="grid lg:grid-cols-3 grid-cols-1 mb-4.5">
                @include('admin.users.roles.permissions.components.users')
                @include('admin.users.roles.permissions.components.roles')
                @include('admin.users.roles.permissions.components.permissions')
            </div>

            <div class="grid lg:grid-cols-3 grid-cols-1 mb-4.5">
                @include('admin.users.roles.permissions.components.customers')
                @include('admin.users.roles.permissions.components.testimonis')
                {{-- @include('admin.users.roles.permissions.components.itineraries') --}}
            </div>

            <div class="grid lg:grid-cols-3 grid-cols-1 mb-4.5">
                @include('admin.users.roles.permissions.components.socials')
                @include('admin.users.roles.permissions.components.inboxes')
                @include('admin.users.roles.permissions.components.services')
            </div>

            <div class="grid lg:grid-cols-3 grid-cols-1 mb-4.5">
                @include('admin.users.roles.permissions.components.blogs')
                @include('admin.users.roles.permissions.components.blog-categories')
                @include('admin.users.roles.permissions.components.galleries')
            </div>

            <div class="grid lg:grid-cols-3 grid-cols-1 mb-4.5">
                @include('admin.users.roles.permissions.components.transportations')
                @include('admin.users.roles.permissions.components.transportation-trips')
                @include('admin.users.roles.permissions.components.hotels')
            </div>

            <div class="grid lg:grid-cols-3 grid-cols-1 mb-4.5">
                @include('admin.users.roles.permissions.components.pilgrimage-batches')
                @include('admin.users.roles.permissions.components.pilgrimage-types')
                @include('admin.users.roles.permissions.components.itineraries')
            </div>

            <div class="mr-auto mt-5">
                <button type="submit"
                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Save</button>
            </div>
        </form>
    </div>
@stop
