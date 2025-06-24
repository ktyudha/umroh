@extends('website.layout')

@section('title', 'Pendaftaran')

@section('content')
    <section class="registration-section my-28">
        <div class="container">
            <h2>Formulir Pendaftaran Haji & Umrah</h2>
            <p>Silakan isi formulir berikut dengan data yang lengkap dan benar</p>

            <form class="registration-form">
                <div class="form-group">
                    <h3>Data Pribadi</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" required>
                        </div>
                        <div class="form-col">
                            <label for="nik">NIK (Nomor Induk Kependudukan)</label>
                            <input type="text" id="nik" name="nik" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" required>
                        </div>
                        <div class="form-col">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-col">
                            <label for="status_pernikahan">Status Pernikahan</label>
                            <select id="status_pernikahan" name="status_pernikahan" required>
                                <option value="">Pilih Status</option>
                                <option value="belum_menikah">Belum Menikah</option>
                                <option value="menikah">Menikah</option>
                                <option value="janda">Janda</option>
                                <option value="duda">Duda</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" id="provinsi" name="provinsi" required>
                        </div>
                        <div class="form-col">
                            <label for="kota">Kota/Kabupaten</label>
                            <input type="text" id="kota" name="kota" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" id="kecamatan" name="kecamatan" required>
                        </div>
                        <div class="form-col">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" id="kode_pos" name="kode_pos" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="tel" id="no_hp" name="no_hp" required>
                        </div>
                        <div class="form-col">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h3>Data Keluarga</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" id="nama_ayah" name="nama_ayah" required>
                        </div>
                        <div class="form-col">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" id="nama_ibu" name="nama_ibu" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="nama_pasangan">Nama Suami/Istri</label>
                            <input type="text" id="nama_pasangan" name="nama_pasangan">
                        </div>
                        <div class="form-col">
                            <label for="jumlah_anak">Jumlah Anak</label>
                            <input type="number" id="jumlah_anak" name="jumlah_anak" min="0">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h3>Data Paspor</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="no_paspor">Nomor Paspor</label>
                            <input type="text" id="no_paspor" name="no_paspor" required>
                        </div>
                        <div class="form-col">
                            <label for="tanggal_terbit_paspor">Tanggal Terbit Paspor</label>
                            <input type="date" id="tanggal_terbit_paspor" name="tanggal_terbit_paspor" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="tanggal_habis_paspor">Tanggal Habis Masa Berlaku Paspor</label>
                            <input type="date" id="tanggal_habis_paspor" name="tanggal_habis_paspor" required>
                        </div>
                        <div class="form-col">
                            <label for="tempat_terbit_paspor">Tempat Diterbitkan Paspor</label>
                            <input type="text" id="tempat_terbit_paspor" name="tempat_terbit_paspor" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h3>Pilihan Paket</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="jenis_ibadah">Jenis Ibadah</label>
                            <select id="jenis_ibadah" name="jenis_ibadah" required>
                                <option value="">Pilih Jenis Ibadah</option>
                                <option value="haji">Haji</option>
                                <option value="umrah">Umrah</option>
                                <option value="haji_khusus">Haji Khusus</option>
                            </select>
                        </div>
                        <div class="form-col">
                            <label for="tahun_keberangkatan">Tahun Keberangkatan</label>
                            <select id="tahun_keberangkatan" name="tahun_keberangkatan" required>
                                <option value="">Pilih Tahun</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="paket">Pilihan Paket</label>
                            <select id="paket" name="paket" required>
                                <option value="">Pilih Paket</option>
                                <option value="reguler">Reguler</option>
                                <option value="premium">Premium</option>
                                <option value="vip">VIP</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h3>Upload Dokumen</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="foto">Foto 4x6 (Latar Belakang Merah)</label>
                            <input type="file" id="foto" name="foto" accept="image/*" required>
                        </div>
                        <div class="form-col">
                            <label for="ktp">Scan KTP</label>
                            <input type="file" id="ktp" name="ktp" accept="image/*,.pdf" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="kk">Scan Kartu Keluarga</label>
                            <input type="file" id="kk" name="kk" accept="image/*,.pdf" required>
                        </div>
                        <div class="form-col">
                            <label for="paspor">Scan Paspor</label>
                            <input type="file" id="paspor" name="paspor" accept="image/*,.pdf" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="sertifikat_vaksin">Sertifikat Vaksin Meningitis</label>
                            <input type="file" id="sertifikat_vaksin" name="sertifikat_vaksin" accept="image/*,.pdf">
                        </div>
                        <div class="form-col">
                            <label for="bukti_pembayaran">Bukti Pembayaran DP</label>
                            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*,.pdf">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" id="agree" name="agree" required>
                        <label for="agree">Saya menyatakan bahwa data yang saya isi adalah benar dan sah. Saya bersedia
                            mematuhi semua persyaratan dan ketentuan yang berlaku.</label>
                    </div>
                </div>

                <div class="form-submit">
                    <button type="submit" class="btn cta-btn">Daftar Sekarang</button>
                </div>
            </form>
        </div>
    </section>
@stop
