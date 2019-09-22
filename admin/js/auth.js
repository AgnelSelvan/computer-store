const loginForm = document.querySelector('#login-form');
loginForm.addEventListener('submit', (e) => {
     e.preventDefault();
     const email = loginForm['login-email'].value;
     const password = loginForm['login-password'].value;

     auth.signInWithEmailAndPassword(email, password).then(cred => {
          window.open('dashboard.php');
          loginForm.reset();
          loginForm.querySelector('.error').innerHTML = '';
     }).catch(ERR => {
          loginForm.querySelector('.error').innerHTML = ERR.message;
      })
})