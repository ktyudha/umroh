<section class="border rounded-lg p-4">
    <h4 class="font-semibold text-xl border-b pb-2 mb-4">Paket Lainnya</h4>

    @foreach ($schedules as $key => $scdl)
        <div class="flex gap-x-4 items-start mb-2">
            <img src="{{ asset($scdl->imageUrl) }}" alt="img-{{ $scdl->slug }}"
                class="h-32 aspect-[4/5] rounded-lg my-auto object-cover">
            <div class="my-auto">
                <span class="my-auto">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $schedule->hotels[0]['rating'])
                            <i class="fa-solid fa-star text-xs text-orange-400"></i>
                        @else
                            <i class="fa-regular fa-star text-xs text-gray-300"></i>
                        @endif
                    @endfor
                </span>
                <a href="{{ route('schedule.show', $scdl->slug) }}" target="_blank">
                    <h5 class="text-black text-sm font-semibold mb-0 line-clamp-2 min-w-40 mb-2 hover:underline">
                        {{ $scdl->name }}</h5>
                </a>
                <p class="text-sm font-medium text-[#005354] mb-2">{{ formatRupiah($scdl->price) }}</p>

                <p class="text-xs font-normal">{{ $scdl->departure_date->format('d M Y') }}</p>
            </div>
        </div>
    @endforeach
</section>
