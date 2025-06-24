@extends('website.layout')

@section('title', 'Persyaratan')

@section('content')
    <section class="requirements-section my-28">
        <div class="container">
            <h2>Persyaratan Pendaftaran Haji & Umrah</h2>

            <div class="tabs">
                <button class="tab-btn active" data-tab="haji">Persyaratan Haji</button>
                <button class="tab-btn" data-tab="umrah">Persyaratan Umrah</button>
            </div>

            <div class="tab-content active" id="haji">
                <h3>Persyaratan Administratif</h3>
                <ol>
                    <li>Fotokopi KTP yang masih berlaku</li>
                    <li>Fotokopi Kartu Keluarga (KK)</li>
                    <li>Paspor asli dengan masa berlaku minimal 7 bulan sebelum keberangkatan</li>
                    <li>Pas foto ukuran 4x6 cm (latar belakang merah) sebanyak 4 lembar</li>
                    <li>Surat keterangan sehat dari dokter</li>
                    <li>Surat keterangan vaksin meningitis</li>
                    <li>Surat nikah bagi yang sudah menikah</li>
                    <li>Surat izin dari suami/istri bagi yang sudah menikah</li>
                    <li>Surat izin dari perusahaan bagi karyawan</li>
                </ol>

                <h3>Persyaratan Khusus</h3>
                <ol>
                    <li>Beragama Islam</li>
                    <li>Berakal sehat</li>
                    <li>Baligh (dewasa)</li>
                    <li>Mampu secara fisik, mental, dan finansial</li>
                    <li>Bagi wanita, harus didampingi oleh mahram atau mengikuti kelompok wanita yang ada mahramnya</li>
                </ol>

                <h3>Persyaratan Kesehatan</h3>
                <ol>
                    <li>Sehat jasmani dan rohani</li>
                    <li>Tidak menderita penyakit menular</li>
                    <li>Bagi lansia (di atas 60 tahun) harus melampirkan surat keterangan sehat dari dokter</li>
                    <li>Telah melakukan vaksinasi meningitis minimal 2 minggu sebelum keberangkatan</li>
                </ol>
            </div>

            <div class="tab-content" id="umrah">
                <h3>Persyaratan Administratif</h3>
                <ol>
                    <li>Fotokopi KTP yang masih berlaku</li>
                    <li>Fotokopi Kartu Keluarga (KK)</li>
                    <li>Paspor asli dengan masa berlaku minimal 6 bulan sebelum keberangkatan</li>
                    <li>Pas foto ukuran 4x6 cm (latar belakang merah) sebanyak 2 lembar</li>
                    <li>Surat keterangan sehat dari dokter</li>
                    <li>Surat keterangan vaksin meningitis</li>
                    <li>Surat nikah bagi yang sudah menikah</li>
                    <li>Surat izin dari suami/istri bagi yang sudah menikah</li>
                    <li>Surat izin dari perusahaan bagi karyawan</li>
                </ol>

                <h3>Persyaratan Khusus</h3>
                <ol>
                    <li>Beragama Islam</li>
                    <li>Berakal sehat</li>
                    <li>Baligh (dewasa)</li>
                    <li>Mampu secara fisik, mental, dan finansial</li>
                    <li>Bagi wanita, harus didampingi oleh mahram atau mengikuti kelompok wanita yang ada mahramnya</li>
                </ol>

                <h3>Persyaratan Kesehatan</h3>
                <ol>
                    <li>Sehat jasmani dan rohani</li>
                    <li>Tidak menderita penyakit menular</li>
                    <li>Telah melakukan vaksinasi meningitis minimal 2 minggu sebelum keberangkatan</li>
                </ol>
            </div>

            <div class="important-notes">
                <h3>Catatan Penting:</h3>
                <ul>
                    <li>Semua dokumen harus dalam kondisi baik dan terbaca jelas</li>
                    <li>Dokumen yang sudah diserahkan tidak dapat dikembalikan</li>
                    <li>Pihak KBIH Sahabat Nabawi berhak menolak pendaftaran jika persyaratan tidak terpenuhi</li>
                    <li>Proses verifikasi dokumen membutuhkan waktu 3-5 hari kerja</li>
                </ul>
            </div>
        </div>
    </section>
@stop
