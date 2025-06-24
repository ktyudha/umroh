document.addEventListener('DOMContentLoaded', function() {
    // Form validation for registration page
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
});