function toggleForms(formIdToShow) {
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');

    if (formIdToShow === 'login-form') {
        loginForm.style.display = 'block';
        signupForm.style.display = 'none';
    } else if (formIdToShow === 'signup-form') {
        loginForm.style.display = 'none';
        signupForm.style.display = 'block';
    }
}