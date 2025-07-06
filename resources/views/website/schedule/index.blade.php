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
                        <a href="{{ route('schedule.index') }}"
                            class="bg-red-500 px-5 py-2.5 rounded text-white hover:text-white">
                            <i class="fa-solid fa-x"></i>
                        </a>
                    @endif
                </form>
            </div>

            <div class="grid lg:grid-cols-3 grid-cols-1 mt-5 gap-8">
                @foreach ($schedules as $key => $schedule)
                    @php
                        $quota = $schedule->quota;
                        $booked = $schedule->customers->count();
                        $remaining = $quota - $booked;
                        $percentage = $quota > 0 ? ($booked / $quota) * 100 : 0;
                    @endphp

                    <div class="shadow-xl rounded-2xl">
                        <div class="relative">
                            <div
                                class="absolute bg-white text-[#999] px-3 py-1 text-xs font-medium uppercase rounded-tl-2xl rounded-br-2xl">
                                {{ $schedule->pilgrimageType->name }}
                            </div>

                            <div
                                class="absolute bottom-0 right-0 bg-white text-[#32a067] px-3 py-1 text-sm font-medium rounded-tl-2xl">
                                {{ formatRupiah($schedule->price) }} <span class="text-[#999]">/pax</span>
                            </div>

                            <img src="{{ asset($schedule->image_url) }}" alt=""
                                class="w-full w-full h-72 object-cover object-top rounded-t-2xl">
                        </div>

                        <div class="p-4">
                            <h3 class="font-semibold text-xl mb-2 min-h-[3.5rem] line-clamp-2">{{ $schedule->name }}</h3>

                            <div class="flex justify-between mb-2">
                                <div class="text-xs">
                                    <i class="fa-regular fa-calendar text-xs mr-2"></i>
                                    <span>Jadwal Berangkat</span>
                                </div>

                                <p class="text-xs">
                                    {{ parseDate($schedule->departure_date) }}</p>
                            </div>

                            <div class="flex justify-between mb-1">
                                <div class="text-xs">
                                    <i class="fa-regular fa-clock text-xs mr-2"></i>
                                    <span>Durasi Perjalanan</span>
                                </div>

                                <p class="text-xs">
                                    {{ parseDate($schedule->return_date) }}</p>
                            </div>

                            <div class="flex justify-between mb-1">
                                <div class="text-xs my-auto">
                                    <i class="fa-solid fa-hotel text-xs mr-2"></i>
                                    <span>Kelas Hotel</span>
                                </div>

                                <span class="my-auto">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $schedule->hotels[0]['rating'])
                                            <i class="fa-solid fa-star text-xs text-orange-400"></i>
                                        @else
                                            <i class="fa-regular fa-star text-xs text-gray-300"></i>
                                        @endif
                                    @endfor
                                </span>
                            </div>


                            <div class="flex justify-between mb-2">
                                <div class="text-xs">
                                    <i class="fa-solid fa-user text-xs mr-2"></i>
                                    <span>Total Seat</span>
                                </div>

                                <p class="text-xs">
                                    {{ $schedule->quota }} pax</p>
                            </div>

                            <div class="flex justify-between mb-2">
                                <div class="text-xs">
                                    <i class="fa-solid fa-user text-xs mr-2"></i>
                                    <span>Seat Tersedia</span>
                                </div>

                                <p class="text-xs">
                                    {{ $schedule->quota }} pax</p>
                            </div>

                            <div class="flex justify-between mb-2">
                                <div class="text-xs">
                                    <i class="fa-solid fa-location-dot text-xs mr-2"></i>
                                    <span>Berangkat dari</span>
                                </div>

                                <p class="text-xs uppercase">
                                    {{ $schedule->itineraries->first()->location ?? '' }}</p>
                            </div>

                            <div class="flex justify-between mb-2">
                                <div class="text-xs">
                                    <i class="fa-solid fa-plane-departure text-xs mr-2"></i>
                                    <span>Maskapai</span>
                                </div>

                                <p class="text-xs">
                                    {{ $schedule->transportationTrips[0]->transportation->name ?? '' }}</p>
                            </div>

                            <a href="{{ $quota <= $booked ? '#' : route('schedule.show', $schedule->slug) }}"
                                class="mt-2 w-full inline-block text-center bg-[#005354] text-white hover:text-white py-2.5 rounded-full
          {{ $quota <= $booked ? 'cursor-not-allowed opacity-50 pointer-events-none' : '' }}">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@stop
