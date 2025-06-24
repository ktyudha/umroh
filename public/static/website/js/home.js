// Testimonial slider functionality
document.addEventListener('DOMContentLoaded', function() {
    const testimonialSlider = document.querySelector('.testimonial-slider');
    
    if (testimonialSlider) {
        const testimonials = [
            {
                quote: "Alhamdulillah, pelayanan Sahabat Nabawi sangat memuaskan. Pembimbing sangat sabar dan mengerti kebutuhan jamaah.",
                name: "Ahmad Subarjo",
                year: "Jamaah Haji 2023"
            },
            {
                quote: "Pengalaman umrah bersama Sahabat Nabawi sangat berkesan. Hotel dekat Masjidil Haram dan makanan yang disajikan sangat baik.",
                name: "Siti Aminah",
                year: "Jamaah Umrah 2024"
            },
            {
                quote: "Proses pendaftaran sangat mudah dan transparan. Tidak ada biaya tambahan yang disembunyikan.",
                name: "Budi Santoso",
                year: "Jamaah Haji 2022"
            }
        ];
        
        let currentTestimonial = 0;
        
        function showTestimonial(index) {
            const testimonial = testimonials[index];
            testimonialSlider.innerHTML = `
                <div class="testimonial-item">
                    <p>"${testimonial.quote}"</p>
                    <div class="author">
                        <h4>${testimonial.name}</h4>
                        <span>${testimonial.year}</span>
                    </div>
                </div>
            `;
        }
        
        // Initialize first testimonial
        showTestimonial(currentTestimonial);
        
        // Auto-rotate testimonials every 5 seconds
        setInterval(() => {
            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
            showTestimonial(currentTestimonial);
        }, 5000);
    }
});