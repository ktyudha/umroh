<section class="border rounded-lg p-4">
    <h4 class="font-semibold text-xl border-b pb-2 mb-4">Informasi Travel</h4>

    <div class="flex gap-x-4 items-start mb-2">
        <i class="fa-solid fa-hotel my-auto text-white bg-[#005354] p-2.5 rounded-lg inline-block"></i>
        <div>
            <label class="text-gray-500 text-sm font-normal mb-0">Nama Perusahaan</label>
            <p class="text-sm font-medium">{{ @$setting->firstWhere('key', 'name')->value }}</p>
        </div>
    </div>

    <div class="flex gap-x-4 items-start mb-2">
        <i class="fa-solid fa-phone my-auto text-white bg-[#005354] p-2.5 rounded-lg inline-block"></i>
        <div>
            <label class="text-gray-500 text-sm font-normal mb-0">Nomor Telepon</label>
            <p class="text-sm font-medium">{{ @$setting->firstWhere('key', 'whatsapp')->value }}</p>
        </div>
    </div>

    <div class="flex gap-x-4 items-start mb-2">
        <i class="fa-solid fa-envelope my-auto text-white bg-[#005354] p-2.5 rounded-lg inline-block"></i>
        <div>
            <label class="text-gray-500 text-sm font-normal mb-0">Alamat Email</label>
            <p class="text-sm font-medium">{{ @$setting->firstWhere('key', 'email')->value }}</p>
        </div>
    </div>

    <div class="flex gap-x-4 items-start mb-2">
        <i class="fa-solid fa-bookmark my-auto text-white bg-[#005354] p-2.5 rounded-lg inline-block"></i>
        <div>
            <label class="text-gray-500 text-sm font-normal mb-0">Nomor SK</label>
            <p class="text-sm font-medium">-</p>
        </div>
    </div>
</section>
