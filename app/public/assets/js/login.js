document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const signUpForm = document.getElementById('signUpForm');
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');
    const showSignUpButton1 = document.getElementById('showSignUpButton1');
    const showSignUpButton2 = document.getElementById('showSignUpButton2');
    const showLoginButton1 = document.getElementById('showLoginButton1');
    const showLoginButton2 = document.getElementById('showLoginButton2');
    const showForgotPasswordButton1 = document.getElementById('showForgotPasswordButton1');
    const showForgotPasswordButton2 = document.getElementById('showForgotPasswordButton2');

    showSignUpButton1.addEventListener('click', () => {
        loginForm.classList.add('d-none');
        forgotPasswordForm.classList.add('d-none');
        signUpForm.classList.remove('d-none');
    });

    showSignUpButton2.addEventListener('click', () => {
        loginForm.classList.add('d-none');
        forgotPasswordForm.classList.add('d-none');
        signUpForm.classList.remove('d-none');
    });

    showLoginButton1.addEventListener('click', () => {
        signUpForm.classList.add('d-none');
        forgotPasswordForm.classList.add('d-none');
        loginForm.classList.remove('d-none');
    });

    showLoginButton2.addEventListener('click', () => {
        signUpForm.classList.add('d-none');
        forgotPasswordForm.classList.add('d-none');
        loginForm.classList.remove('d-none');
    });

    showForgotPasswordButton1.addEventListener('click', () => {
        signUpForm.classList.add('d-none');
        loginForm.classList.add('d-none');
        forgotPasswordForm.classList.remove('d-none');
    });

    showForgotPasswordButton2.addEventListener('click', () => {
        signUpForm.classList.add('d-none');
        loginForm.classList.add('d-none');
        forgotPasswordForm.classList.remove('d-none');
    });
});

document.getElementById('login-form').addEventListener("submit", async (e) => {
    e.preventDefault(); // Prevent page refresh

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    try {
        response = await fetch('/api/users/login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password })
        })
        console.log(response);
    }
    catch (error) { console.log(error); }
});