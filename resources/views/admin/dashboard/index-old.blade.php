@extends('admin.layout')

@section('title', 'Dashboard')



@section('content')
    <div class="block w-full bg-gray-100 py-6 rounded-lg">
        <h1 class="text-4xl font-medium text-black px-10">Dashboard</h1>
    </div>

    @include('admin.dashboard.card-quick-stats')
   
    <div class="mt-10" x-data="{ tab: 'booking' }">
        <div class="flex gap-10 mb-8">
            <button @click="tab = 'booking'" :class="tab==='booking' ? 'text-lg underline underline-offset-[16px] decoration-4 font-bold decoration-yellow-400' : 'text-lg'" >Bookings</button>
            <button @click="tab = 'service'" :class="tab==='service' ? 'text-lg underline underline-offset-[16px] decoration-4 font-bold decoration-yellow-400' : 'text-lg'">My Service</button>
        </div>

        <div id="booking-client">
            <div class="flex justify-between mb-6">
                <div x-show="tab==='booking'">
                    <h5 class="font-medium text-md">Booking Client</h5>
                    <p class="text-[#A0AEC0] font-extralight text-xs">list of all bookings</p>
                </div>

                <div x-show="tab==='service'">
                    <h5 class="font-medium text-md">My Service</h5>
                    <p class="text-[#A0AEC0] font-extralight text-xs">list of all service</p>
                </div>
                
                <button type="button" x-show="tab==='booking'" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="bg-[#EDF1FF] text-[#473BF0] px-6 rounded-lg text-sm"> <i class="fas fa-plus mr-2"></i> Add Pasengger</button>
                @include('admin.dashboard.modal-create-passenger')

                <button type="button" x-show="tab==='service'" data-modal-target="modal-travel" data-modal-toggle="modal-travel" class="bg-[#EDF1FF] text-[#473BF0] px-6 rounded-lg text-sm"> <i class="fas fa-plus mr-2"></i> Add Travel</button>
                @include('admin.dashboard.modal-create-travel')
            </div>

            <div class="grid grid-cols-3 gap-10" >
                @include('admin.dashboard.list.booking')
                @include('admin.dashboard.list.travel')
            </div>
        </div>
    </div>
@stop

