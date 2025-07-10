 @php
     $hotelMenuButtons = [
         [
             'id' => 'gallery-styled-tab',
             'target' => '#styled-gallery',
             'control' => 'gallery',
             'icon' => 'fa-solid fa-images',
             'label' => 'Gallery',
         ],
         [
             'id' => 'gmap-styled-tab',
             'target' => '#styled-gmap',
             'control' => 'gmap',
             'icon' => 'fa-solid fa-map-location-dot',
             'label' => 'Gmap',
         ],
         [
             'id' => 'facility-styled-tab',
             'target' => '#styled-facility',
             'control' => 'facility',
             'icon' => 'fa-solid fa-gear',
             'label' => 'Facility',
         ],
         [
             'id' => 'description-styled-tab',
             'target' => '#styled-description',
             'control' => 'description',
             'icon' => 'fa-solid fa-file-alt',
             'label' => 'Description',
         ],
     ];

     $hotelMenuContents = [
         ['id' => 'styled-gallery', 'label' => 'gallery-tab'],
         ['id' => 'styled-gmap', 'label' => 'gmap-tab'],
         ['id' => 'styled-facility', 'label' => 'facility-tab'],
         ['id' => 'styled-description', 'label' => 'description-tab'],
     ];

 @endphp
 <!-- Main modal -->
 <div id="hotel-modal-{{ $hotel->slug }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative p-4 w-full max-w-2xl max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
             <!-- Modal header -->
             <div
                 class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                 <div>
                     <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                         {{ $hotel->name }}
                     </h3>

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
                 <button type="button"
                     class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                     data-modal-hide="hotel-modal-{{ $hotel->slug }}">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <div class="px-4 pb-4 md:px-5 md:pb-5">
                 <div class="mb-4 border-b border-gray-200 dark:border-gray-700 ">
                     <ul class="flex  -mb-px text-sm font-medium text-center overflow-x-auto whitespace-nowrap"
                         id="hotel-styled-tab-{{ $key }}"
                         data-tabs-toggle="#hotel-styled-tab-content-{{ $key }}"
                         data-tabs-active-classes="text-[#005354] hover:text-[#005354] dark:text-[#005354] dark:hover:text-[#005354] border-[#005354] dark:border-[#005354]"
                         data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                         role="tablist">

                         @foreach ($hotelMenuButtons as $btn)
                             <li class="me-2" role="presentation">
                                 <button class="inline-block p-4 border-b-2 rounded-t-lg"
                                     id="{{ $btn['id'] }}-{{ $key }}"
                                     data-tabs-target="{{ $btn['target'] }}-{{ $key }}" type="button"
                                     role="tab" aria-controls="{{ $btn['control'] }}-{{ $key }}"
                                     aria-selected="false">
                                     <i class="{{ $btn['icon'] }} mr-2"></i>
                                     {{ $btn['label'] }}</button>
                             </li>
                         @endforeach
                     </ul>
                 </div>
                 <div id="hotel-styled-tab-content-{{ $key }}" class="max-h-[50vh] overflow-y-auto">
                     {{-- @foreach ($hotelMenuContents as $key => $content)
                         <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="{{ $content['id'] }}"
                             role="tabpanel" aria-labelledby="{{ $content['label'] }}">
                             <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the
                                 <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated
                                     content</strong>. Clicking another tab will toggle the visibility of this one for
                                 the
                                 next. The tab JavaScript swaps classes to control the content visibility and styling.
                             </p>
                         </div>
                     @endforeach --}}
                     <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
                         id="styled-gallery-{{ $key }}" role="tabpanel"
                         aria-labelledby="gallery-tab-{{ $key }}">


                         <div id="gallery" class="relative w-full" data-carousel="slide">
                             <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                 @foreach ($hotel->images as $keyImage => $image)
                                     <div class="hidden duration-700 ease-in-out"
                                         data-carousel-item="@if ($keyImage == 0) active @endif">
                                         <img src="{{ asset($image->imageUrl) }}"
                                             class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                             alt="img-{{ $hotel->slug }}-{{ $keyImage }}">
                                     </div>
                                 @endforeach
                             </div>

                             @if (count($hotel->images) > 1)
                                 <button type="button"
                                     class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                     data-carousel-prev>
                                     <span
                                         class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                         <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 6 10">
                                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                 stroke-width="2" d="M5 1 1 5l4 4" />
                                         </svg>
                                         <span class="sr-only">Previous</span>
                                     </span>
                                 </button>
                                 <button type="button"
                                     class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                     data-carousel-next>
                                     <span
                                         class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                         <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 6 10">
                                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                 stroke-width="2" d="m1 9 4-4-4-4" />
                                         </svg>
                                         <span class="sr-only">Next</span>
                                     </span>
                                 </button>
                             @endif
                         </div>
                     </div>
                     <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 overflow-hidden [&>iframe]:w-full [&>iframe]:h-[300px] [&>iframe]:!important"
                         id="styled-gmap-{{ $key }}" role="tabpanel"
                         aria-labelledby="gmap-tab-{{ $key }}">
                         {!! $hotel->gmap !!}
                     </div>
                     <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 prose prose-sm"
                         id="styled-facility-{{ $key }}" role="tabpanel"
                         aria-labelledby="facility-tab-{{ $key }}">
                         {!! $hotel->facility !!}
                     </div>
                     <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
                         id="styled-description-{{ $key }}" role="tabpanel"
                         aria-labelledby="description-tab-{{ $key }}">
                         <p class="text-sm text-gray-800">{!! nl2br($hotel->description) !!}
                         </p>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </div>
