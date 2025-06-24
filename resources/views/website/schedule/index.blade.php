@extends('website.layout')

@section('title', 'FAQ')

@section('content')
    <section class="schedule-section my-28">
        <div class="container">
            <h2>Jadwal Keberangkatan Haji & Umrah</h2>

            <div class="tabs">
                <button class="tab-btn active" data-tab="haji">Jadwal Haji</button>
                <button class="tab-btn" data-tab="umrah">Jadwal Umrah</button>
            </div>

            <div class="tab-content active" id="haji">
                <h3>Jadwal Keberangkatan Haji Tahun 2024</h3>

                <div class="schedule-table">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gelombang</th>
                                <th>Tanggal Keberangkatan</th>
                                <th>Tanggal Kembali</th>
                                <th>Kuota</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Gelombang 1</td>
                                <td>15 Mei 2024</td>
                                <td>25 Juni 2024</td>
                                <td>150 orang</td>
                                <td class="available">Tersedia</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Gelombang 2</td>
                                <td>1 Juni 2024</td>
                                <td>10 Juli 2024</td>
                                <td>150 orang</td>
                                <td class="available">Tersedia</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Gelombang 3</td>
                                <td>15 Juni 2024</td>
                                <td>25 Juli 2024</td>
                                <td>150 orang</td>
                                <td class="full">Habis</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="schedule-notes">
                    <h4>Catatan Penting:</h4>
                    <ul>
                        <li>Pendaftaran ditutup 3 bulan sebelum tanggal keberangkatan</li>
                        <li>Kuota dapat berubah sewaktu-waktu</li>
                        <li>Status "Tersedia" berarti masih menerima pendaftaran</li>
                        <li>Status "Habis" berarti kuota sudah terpenuhi</li>
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="umrah">
                <h3>Jadwal Keberangkatan Umrah Tahun 2024</h3>

                <div class="schedule-table">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Paket</th>
                                <th>Tanggal Keberangkatan</th>
                                <th>Durasi</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Umrah Reguler</td>
                                <td>10 Januari 2024</td>
                                <td>12 Hari</td>
                                <td>Rp 28.500.000</td>
                                <td class="available">Tersedia</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Umrah Plus Turki</td>
                                <td>25 Januari 2024</td>
                                <td>15 Hari</td>
                                <td>Rp 35.000.000</td>
                                <td class="available">Tersedia</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Umrah Premium</td>
                                <td>5 Februari 2024</td>
                                <td>12 Hari</td>
                                <td>Rp 32.000.000</td>
                                <td class="full">Habis</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Umrah Reguler</td>
                                <td>20 Februari 2024</td>
                                <td>12 Hari</td>
                                <td>Rp 28.500.000</td>
                                <td class="available">Tersedia</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Umrah Plus Dubai</td>
                                <td>10 Maret 2024</td>
                                <td>15 Hari</td>
                                <td>Rp 37.000.000</td>
                                <td class="available">Tersedia</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="schedule-notes">
                    <h4>Catatan Penting:</h4>
                    <ul>
                        <li>Pendaftaran ditutup 1 bulan sebelum tanggal keberangkatan</li>
                        <li>Harga dapat berubah sewaktu-waktu</li>
                        <li>Pembayaran dapat dilakukan secara cicilan</li>
                        <li>Status "Tersedia" berarti masih menerima pendaftaran</li>
                        <li>Status "Habis" berarti kuota sudah terpenuhi</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@stop
