@extends('admin.layout')

@section('title', 'Users')

@section('content')
    <div class="block w-full bg-gray-100 py-6 rounded-lg dark:bg-gray-800">
        <h1 class="text-4xl font-medium text-black px-10 dark:text-white">Roles</h1>
    </div>

    <div class="mt-10">
        <div class="flex justify-between mb-2">
            <a href="{{ route('admin.roles.create') }}"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Create</a>
        </div>

        @if (Session::has('status'))
            <div class="mt-10 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                <span class="font-medium">Success alert!</span> {{ session('message') }}
            </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Users
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Permission
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-4 capitalize">
                                {{ $role->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $role->users_count }} users
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.permissions.index', [$role->id]) }}" class="hover:text-primary">
                                    {{ $role->name === 'superadmin' ? 'All' : $role->permissions_count }}
                                    permissions
                                </a>
                            </td>
                            <td class="my-auto mx-auto">
                                <div class="flex gap-4 justify-center">
                                    @if (auth()->user()->hasRole('superadmin') ||
                                            (auth()->user()->id === $role->id &&
                                                auth()->user()->hasAnyPermission(['users update'])))
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="hover:text-primary">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    @endif

                                    @if (auth()->user()->hasRole('superadmin'))
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button class="hover:text-primary">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $roles->links() }}
        </div>
    </div>

@stop
