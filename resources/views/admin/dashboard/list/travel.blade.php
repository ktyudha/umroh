@foreach ($travels as $key=> $travel )
                    
                <div class="p-4 rounded-lg bg-gray-100" x-show="tab==='service'">
                    <h5 class="font-semibold text-base mb-2">{{ $travel->name }}</h5>
                    <div class="mb-2">
                        <span class="text-xs text-[#7F8FA4]">Quota</span>
                        <p class="text-sm">{{ $travel->quota }} Passenger</p>
                    </div>
                    <div class="grid grid-cols-2">
                        <div>
                            <span class="text-xs text-[#7F8FA4]">Date</span>
                            <p class="text-sm">{{ $travel->departure_date }}</p>
                        </div>
                        
                        <div>
                            <span class="text-xs text-[#7F8FA4]">Time</span>
                            <p class="text-sm">{{ $travel->departure_time }}</p>
                        </div>
                    </div>
                    <hr class="my-4">

                    <div class="flex justify-between">
                        <button type="button" class="text-[#69519E] text-sm">Close Booking</button>
                        <button type="button" class="text-[#BBC5D5] text-sm">Reject</button>
                    </div>
                </div>

                @endforeach