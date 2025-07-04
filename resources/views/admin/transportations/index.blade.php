@extends('admin.layout')

@section('title', 'Transportations')

@section('content')
    <div class="block w-full bg-gray-100 py-6 rounded-lg dark:bg-gray-800 mb-10">
        <h1 class="text-4xl font-medium text-black px-10 dark:text-white">Transportations</h1>
    </div>


    @if (Session::has('status'))
        <div class="mb-5 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">Success alert!</span> {{ session('message') }}
        </div>
    @endif

    <div class="flex justify-between mb-2">
        <a href="{{ route('admin.transportations.create') }}"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Create</a>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Class
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Capacity
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
                            <img src="{{ asset('storage/' . $model->image ?? 'static/admin/images/default.png') }}"
                                alt="{{ $model->name }}" class="max-w-20 object-cover aspect-square">
                        </td>
                        <td class="px-6 py-4">
                            <h5 class="font-medium text-black dark:text-white">{{ $model['name'] }}</h5>
                        </td>
                        <td class="px-6 py-4">
                            <button type="button"
                                class="cursor-default text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 uppercase">{{ $model['class'] }}</button>
                        </td>
                        <td class="px-6 py-4">
                            {{ $model['capacity'] }} Seat
                        </td>
                        <td class="my-auto mx-auto">
                            <div class="flex gap-4 justify-center">
                                <a href="{{ route('admin.transportations.edit', $model->id) }}" class="hover:text-primary">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                </a>

                                <a href="{{ route('admin.transportations.edit', $model->id) }}" class="hover:text-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <form action="{{ route('admin.transportations.destroy', $model->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="hover:text-primary">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
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
