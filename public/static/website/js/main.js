// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.querySelector('.mobile-menu');
    const navMenu = document.querySelector('nav ul');
    
    mobileMenuBtn.addEventListener('click', function() {
        navMenu.classList.toggle('show');
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 70,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                if (navMenu.classList.contains('show')) {
                    navMenu.classList.remove('show');
                }
            }
        });
    });
});

// Form validation for registration page
document.addEventListener('DOMContentLoaded', function() {
    const registrationForm = document.querySelector('.registration-form');
    
    if (registrationForm) {
        registrationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            
            // Validate required fields
            const requiredFields = registrationForm.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                } else {
                    field.classList.remove('error');
                }
            });
            
            // Validate email format
            const emailField = registrationForm.querySelector('input[type="email"]');
            if (emailField && !isValidEmail(emailField.value)) {
                isValid = false;
                emailField.classList.add('error');
                alert('Format email tidak valid');
            }
            
            // Validate phone number
            const phoneField = registrationForm.querySelector('input[type="tel"]');
            if (phoneField && !isValidPhone(phoneField.value)) {
                isValid = false;
                phoneField.classList.add('error');
                alert('Format nomor telepon tidak valid');
            }
            
            // Validate file uploads
            const fileFields = registrationForm.querySelectorAll('input[type="file"]');
            fileFields.forEach(field => {
                if (field.required && !field.files.length) {
                    isValid = false;
                    field.classList.add('error');
                } else {
                    field.classList.remove('error');
                }
            });
            
            // Validate checkbox
            const agreeCheckbox = registrationForm.querySelector('input[type="checkbox"]');
            if (agreeCheckbox && !agreeCheckbox.checked) {
                isValid = false;
                agreeCheckbox.classList.add('error');
                alert('Anda harus menyetujui persyaratan');
            } else if (agreeCheckbox) {
                agreeCheckbox.classList.remove('error');
            }
            
            if (isValid) {
                // In a real application, this would be an AJAX call to submit the form
                alert('Pendaftaran berhasil! Kami akan menghubungi Anda segera.');
                registrationForm.reset();
            } else {
                alert('Silakan lengkapi semua field yang wajib diisi');
            }
        });
    }
    
    // Helper functions
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
    
    function isValidPhone(phone) {
        const re = /^[0-9]{10,13}$/;
        return re.test(phone);
    }
    
    // Add real-time validation
    const inputFields = document.querySelectorAll('input, textarea, select');
    inputFields.forEach(field => {
        field.addEventListener('input', function() {
            if (this.value.trim()) {
                this.classList.remove('error');
            }
        });
    });
    
    // Tab functionality
    const tabBtns = document.querySelectorAll('.tab-btn');
    if (tabBtns.length > 0) {
        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons and contents
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Show corresponding content
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
    }
    
    // FAQ functionality
    const faqQuestions = document.querySelectorAll('.faq-question');
    if (faqQuestions.length > 0) {
        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                const answer = this.nextElementSibling;
                const icon = this.querySelector('i');
                
                // Toggle answer
                answer.classList.toggle('show');
                
                // Toggle icon
                if (answer.classList.contains('show')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });
    }
});