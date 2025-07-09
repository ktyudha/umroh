@foreach ($schedule->hotels as $key => $hotel)
    <div
        class="flex lg:flex-row flex-col lg:gap-6 gap-4 @if ($key != 0) pt-6 border-t-2 border-dashed @endif pb-6 ">
        <div class="lg:w-2/5 bg-black rounded-2xl">
            <img src="{{ asset($hotel->images[0]->imageUrl) }}" alt="img-{{ $hotel->slug }}"
                class="object-cover aspect-square rounded-xl">
        </div>
        <div class="lg:w-3/5 flex flex-col gap-2">
            <h4 class="font-semibold text-xl uppercase cursor-pointer hover:underline"
                data-modal-target="hotel-modal-{{ $hotel->slug }}" data-modal-toggle="hotel-modal-{{ $hotel->slug }}">
                {{ $hotel->name }}</h4>
            <div class="bg-gray-100 px-4 py-1.5 rounded-lg flex justify-between mb-2">
                <p class="font-medium text-gray-500">Hotel Rate</p>
                <span class="my-auto">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $hotel->rating)
                            <i class="fa-solid fa-star text-sm text-orange-400"></i>
                        @else
                            <i class="fa-regular fa-star text-sm text-orange-400"></i>
                        @endif
                    @endfor
                </span>
            </div>
            <div class="flex gap-x-4 items-start">
                <i class="fa-solid fa-location-dot text-white bg-[#005354] p-2.5 rounded-lg inline-block"></i>
                <div>
                    <label class="text-gray-500 text-md font-normal mb-0">Lokasi</label>
                    <p class="text-sm font-medium">{{ $hotel->address }}</p>
                </div>
            </div>
            {{-- <div class="flex gap-x-4 items-start">
                <i class="fa-solid fa-file-alt text-white bg-[#005354] p-2.5 rounded-lg inline-block"></i>
                <div>
                    <label class="text-gray-500 text-md font-normal mb-0">Deskripsi</label>
                    <p class="text-sm font-medium">{{ $hotel->description }}</p>
                </div>
            </div> --}}
            <div class="flex justify-between">
                <div class="flex gap-x-4 items-start">
                    <i class="fa-solid fa-door-closed text-white bg-[#005354] p-2.5 rounded-lg inline-block"></i>
                    <div>
                        <label class="text-gray-500 text-sm font-normal mb-0">Check In</label>
                        <p class="text-sm font-medium">{{ $schedule->departure_date->format('d M Y H:i') }}</p>
                    </div>
                </div>
                <div class="flex gap-x-4 items-start">
                    <i class="fa-solid fa-door-open text-white bg-[#005354] p-2.5 rounded-lg inline-block"></i>
                    <div>
                        <label class="text-gray-500 text-sm font-normal mb-0">Check Out</label>
                        <p class="text-sm font-medium">{{ $schedule->return_date->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('website.schedule.partials.modal-hotel')
@endforeach
