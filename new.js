// var crsr = document.querySelector("#cursor");
// let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');
let signupBtn = document.querySelector('#signup');

// formBtn.addEventListener('click', () =>{
//   loginForm.classList.add('active');
// });

formClose.addEventListener('click', () =>{
  loginForm.classList.remove('active');
  window.location.href="index.php";
});