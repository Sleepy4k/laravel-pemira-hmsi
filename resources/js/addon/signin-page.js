document.addEventListener('DOMContentLoaded', function() {
    var formStatus = {
        usernameValid: false,
        passwordValid: false,
    }

    function isFormValid() {
        return formStatus.usernameValid && formStatus.passwordValid;
    }

    const togglePasswordBtn = document.getElementById('toggle-password-btn');
    if (togglePasswordBtn) {
        togglePasswordBtn.addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeSlashIcon = document.getElementById('eye-slash-icon');

            if (!passwordInput || !eyeIcon || !eyeSlashIcon) return;

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordInput.placeholder = "Password123!";
                eyeIcon.classList.add('hidden');
                eyeSlashIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                passwordInput.placeholder = "••••••••••••";
                eyeIcon.classList.remove('hidden');
                eyeSlashIcon.classList.add('hidden');
            }
        });
    }

    const signinForm = document.getElementById('signin-form');
    if (signinForm) {
        signinForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const actionUrl = signinForm.getAttribute('data-action');

            if (actionUrl) {
                if (!isFormValid()) {
                    if (window.Toast !== undefined) {
                        window.Toast.fire({
                            icon: 'error',
                            title: 'Please fix the errors in the form before submitting.'
                        });
                    } else {
                        alert('Please fix the errors in the form before submitting.');
                    }
                    return;
                }

                const formData = new FormData();
                formData.append('username', document.getElementById('username').value || '');
                formData.append('password', document.getElementById('password').value || '');

                window.axios.post(actionUrl, formData).then(response => {
                    if (response.data && response.data.status === 'success') {
                        if (window.Toast !== undefined) {
                            window.Toast.fire({
                                icon: 'success',
                                title: 'Sign in successful! Redirecting...'
                            });
                        } else {
                            alert('Sign in successful! Redirecting...');
                        }

                        const redirectUrl = signinForm.getAttribute('data-redirect') || '/';
                        window.location.href = redirectUrl;
                    } else {
                        if (window.Toast !== undefined) {
                            window.Toast.fire({
                                icon: 'error',
                                title: response.data.message || 'Sign in failed. Please try again.'
                            });
                        } else {
                            alert(response.data.message || 'Sign in failed. Please try again.');
                        }
                    }
                }).catch(error => {
                    if (error.response && error.response.data && error.response.data.message) {
                        if (window.Toast !== undefined) {
                            window.Toast.fire({
                                icon: 'error',
                                title: error.response.data.message
                            });
                        } else {
                            alert(error.response.data.message);
                        }
                    } else {
                        if (window.Toast !== undefined) {
                            window.Toast.fire({
                                icon: 'error',
                                title: 'An error occurred. Please try again.'
                            });
                        } else {
                            alert('An error occurred. Please try again.');
                        }
                    }
                });
            }
        });
    }

    // create live validation for username and password fields
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');

    // Validation helper functions
    function showError(input, message) {
        const errorElement = input.nextElementSibling;
        input.classList.add('border-red-500');
        if (errorElement && errorElement.classList.contains('error-message')) {
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
        } else {
            const error = document.createElement('span');
            error.className = 'error-message text-red-500 text-sm mt-1';
            error.textContent = message;
            input.parentNode.insertBefore(error, input.nextSibling);
        }
    }

    function clearError(input) {
        const errorElement = input.nextElementSibling;
        input.classList.remove('border-red-500');
        if (errorElement && errorElement.classList.contains('error-message')) {
            errorElement.textContent = '';
            errorElement.classList.add('hidden');
        }
    }

    function validateUsername(value) {
        if (!value || value.trim() === '') {
            return 'Username is required';
        }
        if (value.length < 3) {
            return 'Username must be at least 3 characters';
        }
        if (value.length > 20) {
            return 'Username must not exceed 20 characters';
        }
        return null;
    }

    function validatePassword(value) {
        if (!value || value.trim() === '') {
            return 'Password is required';
        }
        if (value.length < 8) {
            return 'Password must be at least 8 characters';
        }
        if (value.length > 64) {
            return 'Password must not exceed 64 characters';
        }
        return null;
    }

    // Live validation
    if (usernameInput) {
        usernameInput.addEventListener('blur', function() {
            const error = validateUsername(this.value);
            if (error) {
                showError(this, error);
                formStatus.usernameValid = false;
            } else {
                clearError(this);
                formStatus.usernameValid = true;
            }
        });

        usernameInput.addEventListener('input', function() {
            if (this.classList.contains('border-red-500')) {
                const error = validateUsername(this.value);
                if (!error) {
                    clearError(this);
                    formStatus.usernameValid = true;
                } else {
                    formStatus.usernameValid = false;
                }
            }
        });
    }

    if (passwordInput) {
        passwordInput.addEventListener('blur', function() {
            const error = validatePassword(this.value);
            if (error) {
                showError(this, error);
                formStatus.passwordValid = false;
            } else {
                clearError(this);
                formStatus.passwordValid = true;
            }
        });

        passwordInput.addEventListener('input', function() {
            if (this.classList.contains('border-red-500')) {
                const error = validatePassword(this.value);
                if (!error) {
                    clearError(this);
                    formStatus.passwordValid = true;
                } else {
                    formStatus.passwordValid = false;
                }
            }
        });
    }
});
