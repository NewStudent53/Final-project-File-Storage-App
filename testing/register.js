function Register() {
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
    
    export default Register