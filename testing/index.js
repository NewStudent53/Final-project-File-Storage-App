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
    var email = document.getElementById("loginEmail").value;
    var password = document.getElementById("loginPassword").value;
    var valid = true;

    if (email === "") {
      document.getElementById("errorMessage1").style.display = "block";
      valid = false;
    } else {
      document.getElementById("errorMessage1").style.display = "none";
    }

    if (password === "") {
      document.getElementById("errorMessage2").style.display = "block";
      valid = false;
    } else {
      document.getElementById("errorMessage2").style.display = "none";
    }

    if (valid) {
      //alert('Welcome back to File Manager! Redirecting to your file dashboard...');
      window.location.href = 'https://filemanager.eco/dashboard';
    }
  }

  function register() {
    var name = document.getElementById("registerName").value;
    var email = document.getElementById("registerEmail").value;
    var password = document.getElementById("registerPassword").value;
    var confirmpass = document.getElementById("confirmPassword").value;
    var valid = true;

    if (name === "") {
      document.getElementById("errorMessage4").style.display = "block";
      valid = false;
    } else {
      document.getElementById("errorMessage4").style.display = "none";
    }         

    if (email === "") {
      document.getElementById("errorMessage5").style.display = "block";
      valid = false;
    } else {
      document.getElementById("errorMessage5").style.display = "none";
    }         

    if (password === "") {
      document.getElementById("errorMessage6").style.display = "block";
      valid = false;
    } else {
      document.getElementById("errorMessage6").style.display = "none";
    }        
    
    if (valid && confirmpass !== password) {
      document.getElementById("errorMessage7").style.display = "block";
    } else if(valid && confirmpass == password) {
      //alert('Welcome to File Manager! Your account is being set up...');
      switchForm('login');
    }
    }