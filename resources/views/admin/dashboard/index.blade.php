@extends('admin.layout')

@section('title', 'Dashboard')



@section('content')
    <div class="block w-full bg-gray-100 py-6 rounded-lg">
        <h1 class="text-4xl font-medium text-black px-10">Dashboard</h1>
    </div>

    @include('admin.dashboard.card-quick-stats')
   
    <div class="mt-10">
        <div class="flex gap-10 mb-8">
            <h4 class="text-lg underline underline-offset-[16px] decoration-4 font-bold decoration-yellow-400">Bookings</h4>
            <h4 class="text-lg">My Service</h4>
        </div>

        <div>
            <div class="flex justify-between mb-6">
                <div>
                    <h5 class="font-medium text-md">Booking Client</h5>
                    <p class="text-[#A0AEC0] font-extralight text-xs">list of all bookings</p>
                </div>
                
                <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="bg-[#EDF1FF] text-[#473BF0] px-6 rounded-lg text-sm"> <i class="fas fa-plus mr-2"></i> Add Pasengger</button>
                @include('admin.dashboard.modal-create-passenger')

                <button type="button" data-modal-target="modal-travel" data-modal-toggle="modal-travel" class="bg-[#EDF1FF] text-[#473BF0] px-6 rounded-lg text-sm"> <i class="fas fa-plus mr-2"></i> Add Travel</button>
                @include('admin.dashboard.modal-create-travel')
            </div>

            <div class="grid grid-cols-3">
                <div class="p-4 rounded-lg bg-gray-100">
                    <h5 class="font-semibold text-base mb-2">Amanda Chaves</h5>
                    <div class="mb-2">
                        <span class="text-xs text-[#7F8FA4]">Services</span>
                        <p class="text-sm">Trip to Malang</p>
                    </div>
                    <div class="grid grid-cols-2">
                        <div>
                            <span class="text-xs text-[#7F8FA4]">Date</span>
                            <p class="text-sm">25 Juli 2020</p>
                        </div>
                        
                        <div>
                            <span class="text-xs text-[#7F8FA4]">Time</span>
                            <p class="text-sm">11.00 - 12.00</p>
                        </div>
                    </div>
                    <hr class="my-4">

                    <div class="flex justify-between">
                        <button type="button" class="text-[#69519E] text-sm">Close Booking</button>
                        <button type="button" class="text-[#BBC5D5] text-sm">Reject</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

