@extends('admin.layout')

@section('title', 'Users')

@section('content')
    <div class="block w-full bg-gray-100 py-6 rounded-lg dark:bg-gray-800">
        <h1 class="text-4xl font-medium text-black px-10 dark:text-white">Inboxes</h1>
    </div>

    <div class="mt-10">
        {{-- <div class="flex justify-between mb-2">
            <a href="{{ route('admin.users.create') }}"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2">Create</a>
        </div> --}}

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
                            Information
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Message
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Respond
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $inbox)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-4">
                                <b>{{ $inbox->name }}</b>
                                <p>{{ $inbox->email }}</p>
                                <p>{{ $inbox->created_at }}</p>

                                <div class="text-sm mt-2">
                                    @if ($inbox->is_viewed)
                                        <i class="fa-solid fa-eye text-slate-900 dark:text-white"></i> has been viewed
                                    @else
                                        <i class="fa-solid fa-eye-slash text-slate-400"></i> not seen yet
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                {!! $inbox->description !!}
                                @php
                                    $classes = [
                                        ['bg' => 'bg-green-100', 'text' => 'text-green-800'],
                                        ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800'],
                                        ['bg' => 'bg-indigo-100', 'text' => 'text-indigo-800'],
                                    ];
                                @endphp
                                <br>
                                <span
                                    class="capitalize {{ $classes[@$key % 3]['bg'] }} {{ $classes[@$key % 3]['text'] }} text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">
                                    {{ @$inbox->subject ?? 'No Subject' }}
                                </span>

                            </td>
                            <td class="px-6 py-4">
                                <div>{!! nl2br(substr(@$inbox->respond, 0, 300)) ?: 'Not Respond Yet' !!}</div>
                            </td>
                            <td class="my-auto mx-auto">
                                <div class="flex gap-4 justify-center">
                                    <a href="{{ route('admin.inboxes.edit', $inbox->id) }}" class="hover:text-primary">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>

                                    <form action="{{ route('admin.inboxes.destroy', $inbox->id) }}" method="post">
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
    </div>

@stop
