const loginButton = document.querySelector('.login-button');
const registrationButton = document.querySelector('.registration-button');

loginButton.addEventListener('click', function(e) {
   e.preventDefault();
   let validate = new Validate('#auth', 'auth');
   alert(validate.getResult());
});

registrationButton.addEventListener('click', function(e) {
    e.preventDefault();
    let validate = new Validate('#reg', 'reg');
   alert(validate.getResult());
})