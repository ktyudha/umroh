<section class="rounded-lg p-4 bg-[#f3f8f6] lg:flex hidden">
    <a href="https://api.whatsapp.com/send?phone={{ @$setting->firstWhere('key', 'whatsapp')->value }}&text={{ route('schedule.show', $schedule->slug) }}"
        target="_blank"
        class="bg-[#25D366] flex items-center justify-center gap-2 w-full rounded-lg py-2 text-white font-medium hover:text-white">
        <i class="fa-brands fa-whatsapp"></i>
        <span>Tanya CS</span>
    </a>
</section>

<a href="https://api.whatsapp.com/send?phone={{ @$setting->firstWhere('key', 'whatsapp')->value }}&text={{ route('schedule.show', $schedule->slug) }}"
    target="_blank"
    class="block sm:hidden bg-[#25D366] fixed bottom-4 left-4 right-4 flex items-center justify-center gap-2 
      w-auto rounded-lg py-2 text-white font-medium mx-4">
    <i class="fa-brands fa-whatsapp"></i>
    <span>Tanya CS</span>
</a>
