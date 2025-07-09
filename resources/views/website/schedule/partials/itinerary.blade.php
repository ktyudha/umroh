@foreach ($schedule->itineraries as $key => $itinerary)
    @php
        $lines = explode("\n", $itinerary->description);
    @endphp

    <div class="flex flex-col gap-2 bg-gray-100 dark:bg-gray-900 p-2 rounded-lg mb-2">
        <div>
            <div class="flex justify-between items-start">
                <div class="inline-flex">
                    <button type="button"
                        class="text-white bg-[#005354] font-medium rounded-l-lg text-xs px-2 py-2 text-center mb-2">
                        Day {{ $key + 1 }}
                    </button>
                    <button
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 overflow-hidden text-xs font-medium text-gray-900 rounded-r-lg group bg-[#005354]">
                        <span
                            class="relative px-1.5 py-1.5 transition-all ease-in duration-75 bg-gray-100 dark:bg-gray-900 rounded-r-md">
                            {{ $itinerary->date->format('d M Y') }}
                        </span>
                    </button>
                </div>

                <p class="bg-[#005354] text-white text-xs px-2 py-2 rounded mb-2"><i
                        class="fa-solid fa-location-dot mr-2"></i>
                    {{ $itinerary->location }}</p>
            </div>

            <ul class="prose prose-sm list-disc ps-5 [&>li]:my-0">
                @foreach ($lines as $line)
                    @if (trim($line) !== '')
                        <li>{!! nl2br(e($line)) !!}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        {{-- {{ $itinerary }} --}}
    </div>
@endforeach
