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
            <h1 class="lg:text-4xl text-xl font-semibold text-white">{{ $schedule->name }}</h1>
        </div>
    </section>
    <section class="bg-[#f3f8f6]">
        <div class="max-w-screen-lg grid lg:grid-cols-2 lg:gap-0 gap-4 mx-auto py-8 lg:px-0 px-6">
            <div class="grid grid-cols-2 gap-4 justify-center w-full mx-auto lg:order-1 order-2">
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
                            {{ $schedule->departure_date->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
            <div
                class="flex lg:flex-col flex-row lg:items-end items-center lg:justify-end justify-between lg:gap-2 gap-6 w-full mx-auto lg:order-2 order-1">
                <div class="flex flex-col lg:gap-0 gap-1">
                    <p class="lg:text-right text-gray-700 font-medium lg:text-xl text-md">Mulai dari</p>
                    <p class="text-orange-500 font-semibold lg:text-3xl text-xl">{{ formatRupiah($schedule->price) }} </p>
                    <p class="lg:text-right text-gray-400 font-regular text-sm">Per pax Jamaah</p>
                </div>
                <a href="#detail-schedule"
                    class="bg-orange-500 px-4 py-2 rounded-md text-white text-md hover:text-white">Lihat
                    Penawaran</a>
            </div>
        </div>
        <div class="bg-white">
            <div class="max-w-screen-lg flex justify-between mx-auto py-6 lg:px-0 px-6">
                <div class="flex gap-4">
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
                    <a href="https://api.whatsapp.com/send?phone=&text={{ route('schedule.show', $schedule->slug) }}"
                        target="_blank"
                        class="bg-gray-100 hover:bg-[#005354] px-4 py-3 rounded-full text-xs text-gray-500 hover:text-white"><i
                            class="fa-brands fa-whatsapp text-sm mr-1"></i>
                        WhatsApp</a>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-screen-lg mx-auto mb-20 lg:flex lg:gap-6" id="detail-schedule">
        <div class="lg:w-4/6 w-full lg:px-0 px-6">
            <div class="border-b mb-6 flex justify-between">
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-t-lg bg-[#005354] inline-flex items-center justify-center text-white">
                        <i class="fa-solid fa-info text-xs"></i>
                    </div>
                    <p class="text-md text-[#005354] font-medium my-auto">Deskripsi</p>
                </div>

                <a href="{{ asset('storage/' . $schedule->image) }}" download="img-{{ $schedule->slug }}"
                    class="px-4 rounded-t-lg bg-[#005354] inline-flex items-center justify-center text-white hover:text-white">
                    <i class="fa-solid fa-print text-xs mr-2"></i>
                    Download Flayer
                </a>
            </div>

            <img src="{{ asset('storage/' . $schedule->image) }}" alt="" class="w-full rounded-md mb-14">

            <div class="border-b mb-6 flex justify-between mt-8" id="hotel">
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-t-lg bg-[#005354] inline-flex items-center justify-center text-white">
                        <i class="fa-solid fa-bed text-xs"></i>
                    </div>
                    <p class="text-md text-[#005354] font-medium my-auto">Hotel</p>
                </div>
            </div>

            @include('website.schedule.partials.hotel')

            <div class="border-b mb-6 flex justify-between mt-8" id="hotel">
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-t-lg bg-[#005354] inline-flex items-center justify-center text-white">
                        <i class="fa-solid fa-plane-departure text-xs"></i>
                    </div>
                    <p class="text-md text-[#005354] font-medium my-auto">Maskapai</p>
                </div>
            </div>

            @include('website.schedule.partials.airline')

            {{-- <div class="border-b mb-6 flex justify-between mt-8" id="hotel">
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-t-lg bg-[#005354] inline-flex items-center justify-center text-white">
                        <i class="fa-solid fa-bus text-xs"></i>
                    </div>
                    <p class="text-md text-[#005354] font-medium my-auto">Transportasi</p>
                </div>
            </div> --}}

            <div class="border-b mb-4 flex justify-between mt-8" id="hotel">
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-t-lg bg-[#005354] inline-flex items-center justify-center text-white">
                        <i class="fa-solid fa-list text-xs"></i>
                    </div>
                    <p class="text-md text-[#005354] font-medium my-auto">Itinerari</p>
                </div>

                <a href="{{ asset('storage/' . $schedule->image) }}" download="img-{{ $schedule->slug }}"
                    class="px-4 rounded-t-lg bg-[#005354] inline-flex items-center justify-center text-white hover:text-white">
                    <i class="fa-solid fa-print text-xs mr-2"></i>
                    Print Itinerary
                </a>
            </div>

            @include('website.schedule.partials.itinerary')

            {{-- <div class="border-b mb-6 flex justify-between mt-8" id="hotel">
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-t-lg bg-[#005354] inline-flex items-center justify-center text-white">
                        <i class="fa-solid fa-gear text-xs"></i>
                    </div>
                    <p class="text-md text-[#005354] font-medium my-auto">Fasilitas</p>
                </div>
            </div> --}}
        </div>
        <div class="lg:w-2/6 w-full lg:px-0 px-6 flex flex-col gap-6">
            @include('website.schedule.partials.information')
            @include('website.schedule.partials.service')
            @include('website.schedule.partials.another-package')
        </div>
    </section>
@stop
