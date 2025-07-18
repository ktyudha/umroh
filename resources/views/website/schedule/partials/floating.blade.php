<div
    class="fixed bottom-0 left-0 right-0 flex flex-row gap-2 sm:hidden z-10 bg-white p-4 rounded-t-3xl border-t shadow-[0_-6px_12px_rgba(0,0,0,0.1)]">
    <!-- Tombol WhatsApp -->
    <a href="https://api.whatsapp.com/send?phone={{ @$setting->firstWhere('key', 'whatsapp')->value }}&text={{ route('schedule.show', $schedule->slug) }}"
        target="_blank"
        class="bg-[#25D366] flex items-center justify-center gap-2 w-full rounded-lg py-2 text-white hover:text-white font-medium">
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
