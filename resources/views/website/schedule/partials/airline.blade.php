{{-- {{ $schedule->transportationTrips }} --}}
@foreach ($schedule->transportationTrips as $key => $transport)
    <div
        class="flex lg:flex-row flex-col lg:gap-6 gap-4 @if ($key != 0) pt-6 border-t-2 border-dashed @endif pb-6">
        <div class="lg:w-2/5 bg-black rounded-2xl">
            <img src="{{ asset($transport->transportation->imageUrl) }}" alt="img"
                class="w-full object-cover aspect-[4/3] rounded-xl">
        </div>
        <div class="lg:w-3/5 flex flex-col gap-2">
            <h4 class="font-semibold text-xl uppercase">
                {{ $transport->transportation->name }}</h4>
            <div class="text-md bg-gray-100 px-4 py-1.5 rounded-lg flex justify-between mb-2">
                <p class="font-medium text-gray-500">Kode</p>
                <span class="text-[#005354] font-semibold">{{ $transport->flight_number }}</span>
            </div>

            <div class="flex justify-between">
                <div class="flex gap-x-4 items-start">
                    <i class="fa-solid fa-plane-departure text-white bg-[#005354] p-2.5 rounded-lg inline-block"></i>
                    <div>
                        <label class="text-gray-500 text-sm font-normal mb-0">Departure</label>
                        <h4 class="text-2xl font-semibold">{{ $transport->from_airport }}</h4>
                        <p class="text-sm font-medium">{{ $transport->date_departure->format('d M Y H:i') }}</p>
                    </div>
                </div>
                <div class="flex gap-x-4 items-start">
                    <i class="fa-solid fa-plane-arrival text-white bg-[#005354] p-2.5 rounded-lg inline-block"></i>
                    <div>
                        <label class="text-gray-500 text-sm font-normal mb-0">Arrival</label>
                        <h4 class="text-2xl font-semibold">{{ $transport->to_airport }}</h4>
                        <p class="text-sm font-medium">{{ $transport->date_return->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
