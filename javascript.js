// JavaScript source code
// JavaScript source code
const loginForm = document.getElementById("login-form");
const loginButton = document.getElementById("login-form-submit");
const loginErrorMsg = document.getElementById("login-error-msg");

loginButton.addEventListener("click", (e) => {
    e.preventDefault();
    const username = loginForm.username.value;
    const password = loginForm.password.value;

    if (username === "user" && password === "12345") {
        window.location.href="homepage.html"
    } else {
        loginErrorMsg.style.opacity = 1;        
    }
})
