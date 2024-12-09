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

document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const formToShow = urlParams.get('form') === 'signup' ? 'signup-form' : 'login-form';
    toggleForms(formToShow);
});
