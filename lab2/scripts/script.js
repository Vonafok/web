let authButton = document.getElementById("auth_button");
let regButton = document.getElementById("reg_button");
let authFormToRegForm = document.getElementById('login-form-button-to-signup');
let regFormToAuthForm = document.getElementById('signup-form-button-to-login');

let authFormClose = document.getElementById("authFormClose");
let regFormClose = document.getElementById("regFormClose");

let authForm = document.getElementById('authorization');
let regForm = document.getElementById('registration');


authButton.onclick = function() {
    authForm.style.visibility = "visible";
}

regButton.onclick = function() {
    regForm.style.visibility = "visible";
}

authFormClose.onclick = function() {
    authForm.style.visibility = "hidden";
}

regFormClose.onclick = function() {
    regForm.style.visibility = "hidden";
}

authFormToRegForm.onclick = function() {
    regForm.style.visibility = "visible";
    authForm.style.visibility = "hidden";
}

regFormToAuthForm.onclick = function() {
    authForm.style.visibility = "visible";
    regForm.style.visibility = "hidden";
}