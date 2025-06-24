@extends('website.layout')

@section('title', 'Jadwal')

@section('content')
    <section class="schedule-section my-28">
        <div class="container">
            <h2>Jadwal Keberangkatan Haji & Umrah</h2>

            <div class="tabs">
                @foreach ($types as $key => $type)
                    <button class="tab-btn {{ $key == 0 ? 'active' : '' }}" data-tab="{{ $type->slug }}">Jadwal
                        {{ $type->name }}</button>
                @endforeach
                {{-- @foreach ($types as $key => $type)
                    <a href="{{ route('schedule.index', ['type' => $type->slug]) }}"
                        class="tab-btn {{ $key == 0 ? 'active' : '' }}" data-tab="{{ $type->slug }}">
                        Jadwal {{ $type->name }}
                    </a>
                @endforeach --}}
            </div>

            <div class="tab-content active" id="haji">
                <h3>Jadwal Keberangkatan Haji Tahun {{ now()->year }}</h3>

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
                            @foreach ($schedulesHaji as $key => $schedule)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $schedule->name }}</td>
                                    <td>{{ parseDate($schedule->departure_date) }}</td>
                                    <td>{{ parseDate($schedule->return_date) }}</td>
                                    <td>{{ $schedule->quota }} orang</td>
                                    <td class="{{ $schedule->status }}">
                                        {{ match ($schedule->status) {
                                            'available' => 'Tersedia',
                                            'sold' => 'Habis',
                                            default => 'Pending',
                                        } }}
                                    </td>
                                </tr>
                            @endforeach
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

            <div class="tab-content" id="umroh">
                <h3>Jadwal Keberangkatan Umrah Tahun {{ now()->year }}</h3>

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
                            @foreach ($schedulesUmroh as $key => $schedule)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $schedule->name }}</td>
                                    <td>{{ parseDate($schedule->departure_date) }}</td>
                                    <td>{{ $schedule->duration }} Hari</td>
                                    <td>{{ formatRupiah($schedule->price) }}</td>
                                    <td class="{{ $schedule->status }}">
                                        {{ match ($schedule->status) {
                                            'available' => 'Tersedia',
                                            'sold' => 'Habis',
                                            default => 'Pending',
                                        } }}
                                    </td>
                                </tr>
                            @endforeach
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
