function switchForm(formType) {
    if (formType === 'login') {
      document.getElementById('loginForm').style.display = 'block';
      document.getElementById('registerForm').style.display = 'none';
    } else {
      document.getElementById('loginForm').style.display = 'none';
      document.getElementById('registerForm').style.display = 'block';
    }
  }

  function login() {
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    const email_pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    const password_pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/

    if (email === "") {
        error.email = 'email is empty'
    } else if (!email_pattern.test(email)) {
        error.email = 'email didn\'t match'
    }else if (password === "") {
        error.password = 'password is empty'
    } else if (!password_pattern.test(password)) {
        error.password = 'password didn\'t match'
    } return error

    if (email_pattern.test(email) && password_pattern.test(password)) {
    alert('Welcome back to File Manager! Redirecting to your file dashboard...');
    window.location.href = 'https://filemanager.eco/dashboard';
    }
  }

  function register() {
    const name = document.getElementById('registerName').value;
    const email = document.getElementById('registerEmail').value;
    const password = document.getElementById('registerPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (password !== confirmPassword) {
      alert('Oops! Passwords don\'t match. Please try again.');
      return;
    }

    console.log('Registration attempt:', name, email, password);

    alert('Welcome to File Manager! Your account is being set up...');
    switchForm('login');
  }