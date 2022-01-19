let authButton = document.getElementById("auth_button");
let regButton = document.getElementById("reg_button");
let authFormToRegForm = document.getElementById('login-form-button-to-signup');
let regFormToAuthForm = document.getElementById('signup-form-button-to-login');

let authFormClose = document.getElementById("authFormClose");
let regFormClose = document.getElementById("regFormClose");

let authForm = document.getElementById('authorization');
let regForm = document.getElementById('registration');

let image_loader = document.getElementById('load_new_images');
let photo_container = document.getElementById('photo_container');

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

image_loader.onclick = function() {
  let offset = parseInt(image_loader.getAttribute("offset"));
  let url = "next_photos.php?offset=" + offset;
  offset+=2;
  fetch(url)
    .then((response) => response.text())
    .then((result) => {
      photo_container.insertAdjacentHTML("beforeend", result);
      image_loader.setAttribute("offset", offset.toString());
    })

}