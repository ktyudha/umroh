@extends('website.layout')

@section('title', 'Jadwal')


@section('content')
    <section class="schedule-section py-12 bg-[#f8f8f8]">
        <div class="container">
            <h1 class="font-bold text-2xl text-center">Jadwal Keberangkatan Haji & Umrah</h1>

            <div class="mt-5 w-3/4 mx-auto">
                <form action="" method="get"
                    class="flex lg:flex-row flex-col gap-2 justify-center bg-white p-4 drop-shadow-md rounded-lg">
                    <div class="flex justify-between lg:border-r border-gray-500 lg:min-w-80">
                        <input type="text" class="rounded w-full border-none text-sm" id="search" name="search"
                            placeholder="Cari paket" value="{{ request('search') }}">
                        <i class="fa-solid fa-kaaba my-auto mx-4"></i>
                    </div>
                    <div class="flex justify-between lg:min-w-80">
                        <input type="month" class="rounded w-full border-none text-sm appearance-none" id="departure_date"
                            name="departure_date" placeholder="Waktu Keberangkatan" value="{{ request('departure_date') }}">

                        <i class="fa-regular fa-calendar my-auto mx-4 lg:!hidden display"></i>
                    </div>

                    <div class="w-full grid grid-cols-2">
                        <button type="submit" class="bg-[#005354] w-full py-2 text-white"><i
                                class="fa-solid fa-magnifying-glass"></i></button>

                        <a href="{{ route('schedule.index') }}"
                            class="bg-gray-100 w-full py-2.5 text-center text-gray-500 hover:text-white">
                            <i class="fa-solid fa-rotate-left"></i>
                        </a>
                    </div>
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

                    <div class="shadow-xl rounded-2xl bg-white">
                        <div class="relative">
                            <div
                                class="absolute bg-white text-[#999] px-3 py-1 text-xs font-medium uppercase rounded-tl-2xl rounded-br-2xl">
                                {{ $schedule->pilgrimageType->name }}
                            </div>

                            <div
                                class="absolute bottom-0 right-0 bg-white text-[#32a067] px-3 py-1 text-sm font-medium rounded-tl-2xl">
                                {{ formatRupiah($schedule->price, 'Rp', ',-') }} <span class="text-[#999]">/pax</span>
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
                                    {{ $schedule->duration }} Hari</p>
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
                                    {{ $remaining }} pax</p>
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

@section('scripts')

    <script>
        // Clear Form Filter
        document.querySelector('form').addEventListener('submit', function(e) {
            const inputs = this.querySelectorAll('input');
            inputs.forEach(input => {
                if (!input.value) {
                    input.disabled = true;
                }
            });
        });
    </script>
@endsection
