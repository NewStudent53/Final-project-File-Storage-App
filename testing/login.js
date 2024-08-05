function Login() {

const email = document.getElementById('loginEmail').value;
const password = document.getElementById('loginPassword').value;

console.log('Login attempt:', email, password);
alert('Welcome back to File Manager! Redirecting to your file dashboard...');
window.location.href = 'https://filemanager.eco/dashboard';
}

export default Login