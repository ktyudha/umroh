<section class="rounded-lg p-4 bg-[#f3f8f6] lg:flex lg:flex-col hidden gap-2">
    <a href="https://api.whatsapp.com/send?phone={{ @$setting->firstWhere('key', 'whatsapp')->value }}&text={{ route('schedule.show', $schedule->slug) }}"
        target="_blank"
        class="bg-[#25D366] flex items-center justify-center gap-2 w-full rounded-lg py-2 text-white font-medium hover:text-white">
        <i class="fa-brands fa-whatsapp"></i>
        <span>Tanya CS</span>
    </a>
    <button type="button" class="w-full bg-[#17a2b8] py-2 rounded-lg text-white font-medium"
        data-modal-target="hotel-modal-detail" data-modal-toggle="hotel-modal-detail"> <i class="fa-regular fa-eye"></i>
        Informasi Paket</button>
</section>

<div class="fixed bottom-4 left-4 right-4 flex flex-col gap-2 sm:hidden z-50">
    <!-- Tombol WhatsApp -->
    <a href="https://api.whatsapp.com/send?phone={{ @$setting->firstWhere('key', 'whatsapp')->value }}&text={{ route('schedule.show', $schedule->slug) }}"
        target="_blank"
        class="bg-[#25D366] flex items-center justify-center gap-2 w-full rounded-lg py-2 text-white font-medium">
        <i class="fa-brands fa-whatsapp"></i>
        <span>Tanya CS</span>
    </a>

    <!-- Tombol Informasi Paket -->
    <button type="button"
        class="w-full bg-[#17a2b8] py-2 rounded-lg text-white font-medium flex items-center justify-center gap-2"
        data-modal-target="hotel-modal-detail" data-modal-toggle="hotel-modal-detail">
        <i class="fa-regular fa-eye"></i>
        <span>Informasi Paket</span>
    </button>
</div>

@include('website.schedule.partials.modal-package')
