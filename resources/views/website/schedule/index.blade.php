@extends('website.layout')

@section('title', 'Jadwal')

@section('content')
    <section class="schedule-section my-28">
        <div class="container">
            <h1 class="font-bold text-2xl text-center">Jadwal Keberangkatan Haji & Umrah</h1>

            <div class="mt-5 justify-between text-center">
                <form action="" method="get">
                    <input type="text" class="rounded max-w-96" id="search" name="search"
                        value="{{ request('search') }}">
                    <button type="submit" class="bg-blue-500 px-5 py-2 rounded text-white"><i
                            class="fa-solid fa-magnifying-glass"></i></button>

                    @if (request('search'))
                        <a href="{{ route('schedule.index') }}" class="bg-red-500 px-5 py-2.5 rounded text-white">
                            <i class="fa-solid fa-x"></i>
                        </a>
                    @endif
                </form>
            </div>

            <div class="grid grid-cols-4 mt-5 gap-8">
                @foreach ($schedules as $key => $schedule)
                    <div>
                        <img src="{{ asset($schedule->image_url) }}" alt=""
                            class="w-full aspect-square object-cover rounded-md">

                        <h3 class="font-semibold text-lg mb-2">{{ $schedule->name }}</h3>

                        <div class="flex justify-between">
                            <span class="text-xs font-semibold">Type</span>
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $schedule->pilgrimageType->name }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-xs font-semibold">Departure Date</span>
                            <p class="text-xs">
                                {{ parseDate($schedule->departure_date) }}</p>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs font-semibold">Return Date</span>
                            <p class="text-xs">{{ parseDate($schedule->return_date) }}</p>
                        </div>
                        <div>
                            <div class="flex justify-between">
                                <span class="text-xs font-semibold">Sisa seat</span>
                                <span class="text-xs"> {{ $schedule->quota - $schedule->customers->count() }} /
                                    {{ $schedule->quota }}
                                    orang</span>
                            </div>
                            @php
                                $quota = $schedule->quota;
                                $booked = $schedule->customers->count();
                                $remaining = $quota - $booked;
                                $percentage = $quota > 0 ? ($booked / $quota) * 100 : 0;
                            @endphp

                            <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700 mt-2">
                                <div class="bg-blue-600 h-1.5 rounded-full transition-all duration-500"
                                    style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>

                        <div>
                            <span class="text-xs font-semibold">Price</span>
                            <p class="text-lg">{{ formatRupiah($schedule->price) }}</p>
                        </div>

                        <button
                            class="mt-2 w-full bg-blue-500 text-white py-1 rounded {{ $quota <= $booked ? 'cursor-not-allowed' : '' }}"
                            @if ($quota <= $booked) disabled @endif>Detail
                            Paket</button>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@stop
