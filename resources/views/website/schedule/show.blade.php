@extends('website.layout')

@section('title', 'Jadwal')

@section('content')
    <section class="max-w-screen-lg mx-auto">
        <div class="py-10">
            <h2 class="font-semibold !text-2xl"> {{ $schedule->name }}</h2>
            <img src="{{ asset('storage/' . $schedule->image) }}" alt="" class="w-fluid">

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
                            alt="img-{{ $trip->transportation->name }}" class="max-w-24 object-cover aspect-square rounded">
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
