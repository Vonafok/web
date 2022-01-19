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

let regFormForm = document.getElementById('registration-form');
let logFormForm = document.getElementById('auth');

let exitButton = document.getElementById('exit_button');

if(exitButton != undefined)
{
    exitButton.onclick = function() {
        fetch('exit.php', {
         method: 'POST',
      }
    )
    .then(response => response.json())
    .then((result) => {
      if (result.errors) {
         alert(result.errors);
      } else {
      }
    })
    .catch(error => console.log(error));
        document.location.reload();
        return false;
    }
}

if(authButton != undefined)
{
    authButton.onclick = function() {
        authForm.style.visibility = "visible";
    }
}

if(regButton != undefined)
{
    regButton.onclick = function() {
        regForm.style.visibility = "visible";
    }
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



regFormForm.addEventListener('submit', signup_submit);
function signup_submit(event) {
  let registerForm = new FormData(regFormForm);
  alert(registerForm);
    fetch('register.php', {
     method: 'POST',
     body: registerForm
  }
)
.then(response => response.json())
.then((result) => {
  if (result.errors) {
     alert(result.errors);
  } else {document.location.reload();
  }
})
.catch(error => console.log(error));
}


logFormForm.addEventListener('submit', signup_submit);
function signup_submit(event) {
  let registerForm = new FormData(logFormForm);
  alert(registerForm);
    fetch('login.php', {
     method: 'POST',
     body: registerForm
  }
)
.then(response => response.json())
.then((result) => {
  if (result.errors) {
     alert(result.errors);
  } else {document.location.reload();
  }
})
.catch(error => console.log(error));
}

