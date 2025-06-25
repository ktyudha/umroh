@extends('website.layout')

@section('title', 'Pendaftaran')

@section('content')
    <section class="registration-section my-28">
        <div class="container">
            <h2>Formulir Pendaftaran Haji & Umrah</h2>
            <p>Silakan isi formulir berikut dengan data yang lengkap dan benar</p>

            <form class="registration-form" action="{{ route('registration.store') }}" method="post"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <h3>Data Pribadi</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="name" value="tess" required>
                        </div>
                        <div class="form-col">
                            <label for="nik">NIK (Nomor Induk Kependudukan)</label>
                            <input type="text" id="nik" name="nik" value="3515" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="birth_place">Tempat Lahir</label>
                            <input type="text" id="birth_place" name="birth_place" value="surabaya" required>
                        </div>
                        <div class="form-col">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" id="birth_date" name="birth_date" value="2025-06-26" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="gender">Jenis Kelamin</label>
                            <select id="gender" name="gender" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="male" selected>Laki-laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-col">
                            <label for="marital_status">Status Pernikahan</label>
                            <select id="marital_status" name="marital_status" required>
                                <option value="">Pilih Status</option>
                                <option value="single" selected>Belum Menikah</option>
                                <option value="married">Menikah</option>
                                <option value="widow">Janda</option>
                                <option value="widower">Duda</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="address">Alamat Lengkap</label>
                            <textarea id="address" name="address" rows="3" required>surabaya</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="province">Provinsi</label>
                            <input type="text" id="province" name="province" value="jawa timur" required>
                        </div>
                        <div class="form-col">
                            <label for="city">Kota/Kabupaten</label>
                            <input type="text" id="city" name="city" value="surabaya" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="district">Kecamatan</label>
                            <input type="text" id="district" name="district" value="wonocolo" required>
                        </div>
                        <div class="form-col">
                            <label for="postal_code">Kode Pos</label>
                            <input type="text" id="postal_code" name="postal_code" value="61275" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="phone">Nomor Handphone</label>
                            <input type="tel" id="phone" name="phone" value="0856" required>
                        </div>
                        <div class="form-col">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="bili@gmail.com" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h3>Data Keluarga</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="name_father">Nama Ayah</label>
                            <input type="text" id="name_father" name="name_father" value="barjon" required>
                        </div>
                        <div class="form-col">
                            <label for="name_mother">Nama Ibu</label>
                            <input type="text" id="name_mother" name="name_mother" value="steven" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="name_partner">Nama Suami/Istri</label>
                            <input type="text" id="name_partner" name="name_partner" value="siti">
                        </div>
                        <div class="form-col">
                            <label for="children_count">Jumlah Anak</label>
                            <input type="number" id="children_count" name="children_count" value="1"
                                min="0">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h3>Data Paspor</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="passport_number">Nomor Paspor</label>
                            <input type="text" id="passport_number" name="passport_number" value="123" required>
                        </div>
                        <div class="form-col">
                            <label for="passport_issuer_date">Tanggal Terbit Paspor</label>
                            <input type="date" id="passport_issuer_date" name="passport_issuer_date"
                                value="2024-06-20" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="passport_expiry_date">Tanggal Habis Masa Berlaku Paspor</label>
                            <input type="date" id="passport_expiry_date" name="passport_expiry_date"
                                value="2029-06-20" required>
                        </div>
                        <div class="form-col">
                            <label for="passport_place_issued">Tempat Diterbitkan Paspor</label>
                            <input type="text" id="passport_place_issued" name="passport_place_issued"
                                value="surabaya" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h3>Pilihan Paket</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="pilgrimage_type_id">Jenis Ibadah</label>
                            <select id="pilgrimage_type_id" name="pilgrimage_type_id" required>
                                <option value="">Pilih Jenis Ibadah</option>
                                @foreach ($pilgrimageTypes as $key => $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-col">
                            <label for="pilgrimage_batch_id">Jenis Keberangkatan</label>
                            <select id="pilgrimage_batch_id" name="pilgrimage_batch_id" required>
                                <option value="">Pilih Keberangkatan</option>
                                @foreach ($pilgrimageBatches as $key => $batch)
                                    <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- <div class="form-row">
                        <div class="form-col">
                            <label for="paket">Pilihan Paket</label>
                            <select id="paket" name="paket" required>
                                <option value="">Pilih Paket</option>
                                <option value="reguler">Reguler</option>
                                <option value="premium">Premium</option>
                                <option value="vip">VIP</option>
                            </select>
                        </div>
                    </div> --}}
                </div>

                <div class="form-group">
                    <h3>Upload Dokumen</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="image">Foto 4x6 (Latar Belakang Merah)</label>
                            <input type="file" id="image" name="image" accept="image/*" required>
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
                            <label for="passport">Scan Paspor</label>
                            <input type="file" id="passport" name="passport" accept="image/*,.pdf" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="vaccine_certificate">Sertifikat Vaksin Meningitis</label>
                            <input type="file" id="vaccine_certificate" name="vaccine_certificate"
                                accept="image/*,.pdf">
                        </div>
                        <div class="form-col">
                            <label for="payment_proof">Bukti Pembayaran DP</label>
                            <input type="file" id="payment_proof" name="payment_proof" accept="image/*,.pdf">
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
