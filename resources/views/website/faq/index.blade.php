@extends('website.layout')

@section('title', 'FAQ')

@section('content')
    <section class="faq-section my-28">
        <div class="container">
            <h2>Pertanyaan yang Sering Diajukan (FAQ)</h2>

            <div class="faq-categories">
                <button class="category-btn active" data-category="umum">Umum</button>
                <button class="category-btn" data-category="pendaftaran">Pendaftaran</button>
                <button class="category-btn" data-category="pembayaran">Pembayaran</button>
                <button class="category-btn" data-category="dokumen">Dokumen</button>
                <button class="category-btn" data-category="perjalanan">Perjalanan</button>
            </div>

            <div class="faq-content active" id="umum">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Apa perbedaan antara haji dan umrah?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Haji adalah rukun Islam kelima yang wajib dilaksanakan sekali seumur hidup bagi muslim yang
                            mampu. Ibadah haji memiliki waktu khusus yaitu pada bulan Dzulhijjah. Sedangkan umrah bisa
                            dilaksanakan kapan saja sepanjang tahun dan hukumnya sunnah. Rangkaian ibadah haji lebih panjang
                            dibanding umrah.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Berapa lama waktu yang dibutuhkan untuk ibadah haji?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ibadah haji biasanya memakan waktu sekitar 30-40 hari, tergantung kebijakan pemerintah Arab Saudi
                            dan maskapai penerbangan. Ini termasuk masa karantina sebelum ibadah, pelaksanaan ibadah haji
                            itu sendiri, dan waktu untuk pulang ke tanah air.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Apakah ada batasan usia untuk melaksanakan haji atau umrah?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Pemerintah Indonesia menetapkan batas minimal usia haji adalah 18 tahun. Untuk umrah tidak ada
                            batasan usia, namun anak-anak harus didampingi orang tua atau walinya. Untuk jamaah lanjut usia
                            (di atas 60 tahun) diperlukan surat keterangan sehat dari dokter.</p>
                    </div>
                </div>
            </div>

            <div class="faq-content" id="pendaftaran">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Bagaimana cara mendaftar haji atau umrah melalui Sahabat Nabawi?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Anda bisa mendaftar melalui website kami dengan mengisi formulir pendaftaran online atau datang
                            langsung ke kantor kami. Untuk pendaftaran online, setelah mengisi formulir dan mengunggah
                            dokumen yang diperlukan, tim kami akan menghubungi Anda untuk proses selanjutnya.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Berapa lama proses verifikasi pendaftaran?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Proses verifikasi pendaftaran biasanya memakan waktu 3-5 hari kerja setelah semua dokumen lengkap
                            diterima. Kami akan mengirimkan pemberitahuan via email atau WhatsApp setelah verifikasi
                            selesai.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Apakah bisa mendaftar haji atau umrah untuk orang lain?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Bisa, asalkan Anda memiliki semua dokumen yang diperlukan dari calon jamaah tersebut. Namun untuk
                            proses selanjutnya seperti wawancara dan pembayaran, calon jamaah harus hadir sendiri atau
                            memberikan surat kuasa.</p>
                    </div>
                </div>
            </div>

            <div class="faq-content" id="pembayaran">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Metode pembayaran apa saja yang diterima?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Kami menerima pembayaran melalui transfer bank (BCA, Mandiri, BRI, BNI), pembayaran langsung di
                            kantor kami (tunai atau debit), atau melalui virtual account. Pembayaran dengan kartu kredit
                            dikenakan biaya tambahan 2%.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Apakah bisa mencicil pembayaran?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, kami menyediakan program cicilan dengan ketentuan sebagai berikut: DP minimal 30% dari total
                            biaya, pelunasan maksimal 1 bulan sebelum keberangkatan. Cicilan bisa dibayar per bulan dengan
                            jumlah yang disepakati.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Bagaimana jika ingin membatalkan pendaftaran?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Pembatalan pendaftaran bisa dilakukan dengan mengirimkan surat permohonan pembatalan. Uang yang
                            sudah dibayarkan akan dikembalikan setelah dipotong biaya administrasi sebesar 10% dari total
                            biaya jika pembatalan dilakukan lebih dari 3 bulan sebelum keberangkatan. Jika kurang dari 3
                            bulan, biaya yang sudah dibayarkan tidak dapat dikembalikan.</p>
                    </div>
                </div>
            </div>

            <div class="faq-content" id="dokumen">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Dokumen apa saja yang diperlukan untuk pendaftaran haji?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Dokumen yang diperlukan antara lain: Fotokopi KTP, KK, paspor asli (masa berlaku minimal 7
                            bulan), pas foto 4x6 latar merah (4 lembar), surat keterangan sehat dari dokter, surat vaksin
                            meningitis, surat nikah (bagi yang sudah menikah), dan surat izin dari suami/istri atau
                            perusahaan (jika karyawan).</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Bagaimana jika paspor belum ada saat pendaftaran?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Anda tetap bisa mendaftar tanpa paspor, namun paspor harus sudah diserahkan paling lambat 3 bulan
                            sebelum keberangkatan untuk haji dan 1 bulan untuk umrah. Kami juga menyediakan layanan bantuan
                            pembuatan paspor bagi yang membutuhkan.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Apakah perlu menerjemahkan dokumen ke bahasa Arab?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Tidak perlu, karena semua dokumen yang diserahkan ke kami akan kami proses dan terjemahkan jika
                            diperlukan. Namun untuk dokumen seperti surat nikah yang dikeluarkan oleh KUA sudah memiliki
                            terjemahan Arab.</p>
                    </div>
                </div>
            </div>

            <div class="faq-content" id="perjalanan">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Bagaimana dengan akomodasi selama di Arab Saudi?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Kami menyediakan akomodasi di hotel bintang 3-5 tergantung paket yang Anda pilih. Semua hotel
                            yang kami gunakan memiliki jarak maksimal 500 meter dari Masjidil Haram (Mekah) dan Masjid
                            Nabawi (Madinah). Fasilitas kamar termasuk AC, kamar mandi dalam, dan sarapan.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Apakah ada pembimbing selama ibadah?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, setiap kelompok terdiri dari 30-40 jamaah akan didampingi oleh 1 pembimbing yang
                            berpengalaman dan menguasai manasik haji/umrah. Pembimbing akan mendampingi dari keberangkatan
                            hingga kepulangan, termasuk memandu selama pelaksanaan ibadah.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Bagaimana dengan transportasi selama di Arab Saudi?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Kami menyediakan bus AC khusus untuk transportasi jamaah selama di Arab Saudi. Bus akan mengantar
                            jamaah dari bandara ke hotel, dari hotel ke masjid, dan untuk keperluan ibadah lainnya seperti
                            ke Arafah, Mina, dan Muzdalifah untuk haji.</p>
                    </div>
                </div>
            </div>

            <div class="faq-contact">
                <p>Masih ada pertanyaan? Silakan <a href="kontak.html">hubungi kami</a> atau datang langsung ke kantor kami.
                </p>
            </div>
        </div>
    </section>
@stop
