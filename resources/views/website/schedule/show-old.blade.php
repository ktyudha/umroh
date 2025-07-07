@extends('website.layout')

@section('title', 'Jadwal')

@php
    $quota = $schedule->quota;
    $booked = $schedule->customers->count();
    $remaining = $quota - $booked;
    $percentage = $quota > 0 ? ($booked / $quota) * 100 : 0;
@endphp

@section('content')
    <section
        class="bg-[linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('https://storage.googleapis.com/muslimpergi/uploads/site/background2/6/namira-banner-header.jpeg')] bg-cover bg-top bg-fixed bg-no-repeat h-[200px] flex items-center">
        <div class="max-w-screen-lg w-full mx-auto px-4 text-left">
            <h1 class="text-4xl font-semibold text-white">{{ $schedule->name }}</h1>
        </div>
    </section>
    <section class="bg-[#f3f8f6]">
        <div class="max-w-screen-lg grid grid-cols-2 mx-auto py-8">
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#005354] text-white inline-flex items-center justify-center">
                        <i class="fa-solid fa-rocket text-xl"></i>
                    </div>
                    <div>
                        <span class="text-sm text-gray-400">Tipe Paket</span>
                        <p class="text-sm text-[#005354] font-semibold">{{ $schedule->pilgrimageType->name }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#005354] text-white inline-flex items-center justify-center">
                        <i class="fa-regular fa-clock text-xl"></i>
                    </div>
                    <div>
                        <span class="text-sm text-gray-400">Durasi</span>
                        <p class="text-sm text-[#005354] font-semibold">{{ $schedule->duration }} Hari</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#005354] text-white inline-flex items-center justify-center">
                        <i class="fa-solid fa-plane-departure text-xl"></i>
                    </div>
                    <div>
                        <span class="text-sm text-gray-400">Maskapai</span>
                        <p class="text-sm text-[#005354] font-semibold">
                            {{ $schedule->transportationTrips[0]->transportation->name ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#005354] text-white inline-flex items-center justify-center">
                        <i class="fa-solid fa-bus text-xl"></i>
                    </div>
                    <div>
                        <span class="text-sm text-gray-400"> {{ $schedule->itineraries->first()->location ?? '' }}</span>
                        <p class="text-sm text-[#005354] font-semibold">
                            {{ parseDate($schedule->departure_date) }}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-end justify-end gap-2">
                <p class="text-right text-gray-700 font-medium text-xl">Mulai dari</p>
                <p class="text-orange-500 font-semibold text-3xl">{{ formatRupiah($schedule->price) }} </p>
                <p class="text-gray-400 font-regular text-sm">Per pax Jamaah</p>
                <a href="#detail-schedule"
                    class="bg-orange-500 px-4 py-1.5 rounded-md text-white text-md hover:text-white">Lihat
                    Penawaran</a>
            </div>
        </div>
        <div class="bg-white">
            <div class="max-w-screen-lg grid grid-cols-2 mx-auto py-6">
                <div class="flex gap-4 ">
                    <p class="my-auto">Hotel Rate</p>
                    <span class="my-auto">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $schedule->hotels[0]['rating'])
                                <i class="fa-solid fa-star text-sm text-orange-400"></i>
                            @else
                                <i class="fa-regular fa-star text-sm text-gray-300"></i>
                            @endif
                        @endfor
                    </span>
                </div>
                <div class="flex items-end justify-end">
                    <button type="button"
                        class="bg-gray-100 hover:bg-[#005354] px-4 py-3 rounded-full text-xs text-gray-500 hover:text-white"><i
                            class="fa-solid fa-print mr-2"></i>
                        Print Paket</button>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-screen-lg mx-auto" id="detail-schedule">
        <div class="w-4/6">
            <div class="border-b mb-6 flex justify-between">
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-t-lg bg-[#005354] inline-flex items-center justify-center text-white">
                        <i class="fa-solid fa-info text-xs"></i>
                    </div>
                    <p class="text-md text-[#005354] font-medium my-auto">Deskripsi</p>
                </div>

                <button type="button"
                    class="px-4 rounded-t-lg bg-[#005354] inline-flex items-center justify-center text-white">
                    <i class="fa-solid fa-print text-xs mr-2"></i>
                    Download Flayer
                </button>
            </div>
            <img src="{{ asset('storage/' . $schedule->image) }}" alt="" class="w-full rounded-md">

            {{-- Hotels --}}
            <h3 class="font-semibold !text-lg mt-10 mb-2">Hotels</h3>
            <div class="grid grid-cols-2 gap-4">
                @foreach ($schedule->hotels as $hotel)
                    <div class="border border-2 rounded-lg flex gap-6 p-4">
                        <img src="{{ asset('storage/' . $hotel->images[0]->image) }}" alt="img-{{ $hotel->name }}"
                            class="max-w-24 object-cover aspect-square rounded">
                        <div>
                            <h3>{{ $hotel->name }}</h3>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $hotel['rating'])
                                    <i class="fa-solid fa-star text-xs text-yellow-400"></i>
                                @else
                                    <i class="fa-regular fa-star text-xs text-gray-300"></i>
                                @endif
                            @endfor

                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <span class="text-xs font-semibold">Check In</span>
                                    <p class="text-xs">
                                        {{ $schedule->departure_date }}</p>
                                </div>
                                <div>
                                    <span class="text-xs font-semibold">Check Out</span>
                                    <p class="text-xs">{{ $schedule->return_date }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            {{-- Transportation --}}
            <h3 class="font-semibold !text-lg mt-10 mb-2">Airlines</h3>
            <div class="grid grid-cols-2 gap-4">
                @foreach ($schedule->transportationTrips as $trip)
                    <div class="border border-2 rounded-lg flex gap-6 p-4">
                        <img src="{{ asset('storage/' . $trip->transportation->image) }}"
                            alt="img-{{ $trip->transportation->name }}"
                            class="max-w-24 object-cover aspect-square rounded">
                        <div>
                            <h3 class="font-semibold text-base mb-2">{{ $trip->transportation->name }}
                                [{{ $trip->flight_number }}]</h3>

                            <div class="grid grid-cols-2 gap-6">
                                <div class="flex flex-col gap-1">
                                    <span class="text-xs font-semibold">Departure</span>
                                    <div>
                                        <p class="text-xs"> <i class="fa-solid fa-calendar-alt"></i>
                                            {{ $trip->date_departure }}</p>
                                        <p class="text-xs"> <i class="fa-solid fa-location-dot"></i>
                                            {{ $trip->from_airport }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span class="text-xs font-semibold">Arrival</span>
                                    <div>
                                        <p class="text-xs"> <i class="fa-solid fa-calendar-alt"></i>
                                            {{ $trip->date_return }}</p>
                                        <p class="text-xs"> <i class="fa-solid fa-location-dot"></i>
                                            {{ $trip->to_airport }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Facility --}}
            <div x-data="{ showFacility: false }" class="mb-6">
                <h3 class="font-semibold !text-lg mt-10 mb-2">Facility</h3>
                <button @click="showFacility = !showFacility" type="button"
                    class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    <span x-text="showFacility ? 'Sembunyikan' : 'Lihat'"></span>
                </button>
                <div x-show="showFacility" x-transition class="prose prose-sm mt-2">{!! $schedule->facility !!}</div>
            </div>

            {{-- Requirement --}}
            <div x-data="{ showRequirement: false }" class="mb-6">
                <h3 class="font-semibold !text-lg mt-10 mb-2">Requirement</h3>
                <button @click="showRequirement = !showRequirement" type="button"
                    class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><span
                        x-text="showRequirement ? 'Sembunyikan' : 'Lihat'"></span></button>
                <div x-show="showRequirement" x-transition class="prose prose-sm mt-2">{!! $schedule->requirement !!}</div>
            </div>

            {{-- Terms and Condition --}}
            <div x-data="{ showTnc: false }">
                <h3 class="font-semibold !text-lg mt-10 mb-2">Terms and Condition</h3>
                <button @click="showTnc = !showTnc" type="button"
                    class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    <span x-text="showTnc ? 'Sembunyikan' : 'Lihat'"></span>
                </button>
                <div x-show="showTnc" x-transition class="prose prose-sm mt-2">{!! $schedule->terms_condition !!}</div>
            </div>
        </div>
    </section>
@stop
