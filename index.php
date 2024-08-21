<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register & Login</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
    <div class="logo-container">
      <svg class="logo" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="leafGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:#4CAF50;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#81C784;stop-opacity:1" />
          </linearGradient>
          <linearGradient id="folderGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:#2196F3;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#64B5F6;stop-opacity:1" />
          </linearGradient>
        </defs>
        
        <!-- Folder shape -->
        <path d="M50,80 L250,80 L250,250 L50,250 Z" fill="url(#folderGradient)" />
        <path d="M50,80 L130,80 L150,50 L250,50 L250,80" fill="url(#folderGradient)" />
        
        <!-- Leaf shape -->
        <path d="M150,100 Q200,150 150,200 Q100,150 150,100" fill="url(#leafGradient)" />
        
        <!-- Recycling arrows -->
        <path d="M140,170 A30,30 0 1,1 170,140" fill="none" stroke="#FFC107" stroke-width="10" stroke-linecap="round" />
        <path d="M170,200 A30,30 0 1,1 140,170" fill="none" stroke="#FFC107" stroke-width="10" stroke-linecap="round" />
        <path d="M200,170 A30,30 0 1,1 170,200" fill="none" stroke="#FFC107" stroke-width="10" stroke-linecap="round" />
        
        <!-- Arrow tips -->
        <polygon points="137,168 143,162 149,174" fill="#FFC107" />
        <polygon points="172,203 166,197 178,191" fill="#FFC107" />
        <polygon points="203,168 197,174 191,162" fill="#FFC107" />
      </svg>
      <div class="eco-message">Green Storage • Efficient Management</div>
    </div>
    <h1>File Manager</h1>
<div class="form-container" id="signup" style="display:none;">
    <h1 class="form-title">Register</h1>
    <form method="post" action="register.php" id="registerForm">
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="username" id="username" placeholder="User name" required>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm password" required>
        </div>
        <button type="submit" class="btn" value="Register" name="signUp">Create an Account</button>
    </form>
    <div class="links">
        <p id="signInText">Already Have an Account?</p>
    </div>
</div>
<div class="form-container" id="signIn" style="display: block">
    <h1 class="form-title">Welcome Back</h1>
    <form method="post" action="checkuser.php">
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn" name="signIn">Login</button>
    </form>
    <div class="links">   
        <p id="signUpText">Don't have an account yet?</p>
    </div>
</div>
<script>
    document.getElementById('signInText').addEventListener('click', function() {
        document.getElementById('signup').style.display = 'none';
        document.getElementById('signIn').style.display = 'block';
    });
    document.getElementById('signUpText').addEventListener('click', function() {
        document.getElementById('signup').style.display = 'block';
        document.getElementById('signIn').style.display = 'none';
    });
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmpassword').value;
        if (password !== confirmPassword) {
            alert('Passwords do not match! Please re-enter your password.');
            document.getElementById('confirmpassword').value = '';
            event.preventDefault();
        }
    });
</script>
</body>
</html>
