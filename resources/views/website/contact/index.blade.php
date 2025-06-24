@extends('website.layout')

@section('title', 'FAQ')

@section('content')
    <section class="contact-section my-28">
        <div class="container">
            <h2>Hubungi Kami</h2>
            <p>Silakan hubungi kami melalui informasi kontak di bawah ini atau isi formulir pesan</p>

            <div class="contact-grid">
                <div class="contact-info">
                    <h3>Informasi Kontak</h3>

                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Alamat Kantor</h4>
                            <p>Jl. Raya Kertajaya No. 45, Surabaya, Jawa Timur 60111</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Telepon</h4>
                            <p>(031) 1234567</p>
                            <p>081234567890 (WhatsApp)</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>info@sahabatnabawi.com</p>
                            <p>pendaftaran@sahabatnabawi.com</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>Jam Operasional</h4>
                            <p>Senin - Jumat: 08.00 - 16.00 WIB</p>
                            <p>Sabtu: 08.00 - 14.00 WIB</p>
                            <p>Minggu & Hari Libur: Tutup</p>
                        </div>
                    </div>

                    <div class="social-media">
                        <h4>Media Sosial</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <h3>Kirim Pesan</h3>
                    <form>
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subjek</label>
                            <select id="subject" name="subject" required>
                                <option value="">Pilih Subjek</option>
                                <option value="pendaftaran">Pendaftaran Haji/Umrah</option>
                                <option value="informasi">Informasi Paket</option>
                                <option value="pembayaran">Pembayaran</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message">Pesan</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn cta-btn">Kirim Pesan</button>
                    </form>
                </div>
            </div>

            <div class="map-container">
                <h3>Lokasi Kantor Kami</h3>
                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715288123535!2d112.7834743147749!3d-7.275840994750518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa10ea2ae5c9%3A0x6c6e6e5b4f8f9b8a!2sPoliteknik%20Elektronika%20Negeri%20Surabaya!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
@stop
