@extends('admin.layout')

@section('title', 'Customer')

@section('content')
    <div class="block w-full bg-gray-100 py-6 rounded-lg dark:bg-gray-800 mb-10">
        <h1 class="text-4xl font-medium text-black px-10 dark:text-white">Customer</h1>
    </div>


    @if (Session::has('status'))
        <div class="mb-5 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">Success alert!</span> {{ session('message') }}
        </div>
    @endif

    {{-- <div class="flex justify-between mb-2">
        <a href="{{ route('admin.customers.create') }}"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Create</a>
    </div> --}}


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NIK
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pilgrimage
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $key => $model)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4">
                            <h5 class="font-medium text-black dark:text-white">{{ $model['name'] }}</h5>
                        </td>
                        <td class="px-6 py-4">
                            {{ $model['nik'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $model['address'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $model['pilgrimageType']->name }} - {{ $model['pilgrimageBatch']->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $model['phone'] }}
                        </td>
                        <td class="my-auto mx-auto text-center">
                            <a href="{{ route('admin.customers.show', $model->id) }}" class="hover:text-primary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            {{-- <div class="flex gap-4 justify-center">
                                <a href="{{ route('admin.customers.edit', $model->id) }}" class="hover:text-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <form action="{{ route('admin.customers.destroy', $model->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="hover:text-primary">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div> --}}
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
