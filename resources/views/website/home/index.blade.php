@extends('website.layout')

@section('title', 'Home')

@section('content')
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2>Perjalanan Spiritual Menuju Tanah Suci</h2>
                <p>Dapatkan pengalaman ibadah haji dan umrah yang nyaman bersama kami</p>
                <a href="pages/pendaftaran.html" class="cta-btn">Daftar Sekarang</a>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2>Layanan Kami</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <i class="fas fa-mosque"></i>
                    <h3>Paket Haji Reguler</h3>
                    <p>Paket lengkap untuk ibadah haji dengan fasilitas terbaik</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-kaaba"></i>
                    <h3>Paket Umrah</h3>
                    <p>Berbagai pilihan paket umrah sesuai kebutuhan Anda</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-hotel"></i>
                    <h3>Akomodasi Premium</h3>
                    <p>Penginapan dekat Masjidil Haram dan Masjid Nabawi</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-bus"></i>
                    <h3>Transportasi Nyaman</h3>
                    <p>Bus AC khusus untuk mobilitas jamaah</p>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <h2>Testimoni Jamaah</h2>
            <div class="testimonial-slider">
                <!-- Content will be loaded by JavaScript -->
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <h3>10+</h3>
                    <p>Tahun Pengalaman</p>
                </div>
                <div class="stat-item">
                    <h3>5,000+</h3>
                    <p>Jamaah Terlayani</p>
                </div>
                <div class="stat-item">
                    <h3>98%</h3>
                    <p>Kepuasan Jamaah</p>
                </div>
            </div>
        </div>
    </section>
@stop
