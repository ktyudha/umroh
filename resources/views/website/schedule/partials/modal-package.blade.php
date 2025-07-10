 @php
     $scheduleMenuButtons = [
         [
             'id' => 'facility-styled-tab',
             'target' => '#styled-facility',
             'control' => 'facility',
             'icon' => 'fa-solid fa-gear',
             'label' => 'Facility',
         ],
         [
             'id' => 'requirement-styled-tab',
             'target' => '#styled-requirement',
             'control' => 'requirement',
             'icon' => 'fa-solid fa-clipboard-check',
             'label' => 'Requirement',
         ],
         [
             'id' => 'tc-styled-tab',
             'target' => '#styled-tc',
             'control' => 'tc',
             'icon' => 'fa-solid fa-balance-scale',
             'label' => 'Terms and Condition',
         ],
     ];

 @endphp

 <!-- Main modal -->
 <div id="hotel-modal-detail" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative p-4 w-full max-w-2xl max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
             <!-- Modal header -->
             <div
                 class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                 <div>
                     <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                         {{ $schedule->name }}
                     </h3>
                 </div>

                 <button type="button"
                     class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                     data-modal-hide="hotel-modal-detail">
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
                         id="schedule-styled-tab" data-tabs-toggle="#schedule-styled-tab-content"
                         data-tabs-active-classes="text-[#005354] hover:text-[#005354] dark:text-[#005354] dark:hover:text-[#005354] border-[#005354] dark:border-[#005354]"
                         data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                         role="tablist">

                         @foreach ($scheduleMenuButtons as $btn)
                             <li class="me-2" role="presentation">
                                 <button class="inline-block p-4 border-b-2 rounded-t-lg" id="{{ $btn['id'] }}"
                                     data-tabs-target="{{ $btn['target'] }}" type="button" role="tab"
                                     aria-controls="{{ $btn['control'] }}" aria-selected="false">
                                     <i class="{{ $btn['icon'] }} mr-2"></i>
                                     {{ $btn['label'] }}</button>
                             </li>
                         @endforeach
                     </ul>
                 </div>
                 <div id="schedule-styled-tab-content" class="max-h-[50vh] overflow-y-auto">
                     <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-facility" role="tabpanel"
                         aria-labelledby="gallery-tab">
                         <div class="prose prose-sm"> {!! $schedule->facility !!}</div>
                     </div>
                     <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 overflow-hidden [&>iframe]:w-full [&>iframe]:h-[300px] [&>iframe]:!important"
                         id="styled-requirement" role="tabpanel" aria-labelledby="gmap-tab">
                         <div class="prose prose-sm"> {!! $schedule->requirement !!} </div>
                     </div>
                     <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 prose prose-sm" id="styled-tc"
                         role="tabpanel" aria-labelledby="facility-tab">
                         <div class="prose prose-sm"> {!! $schedule->terms_condition !!} </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </div>
