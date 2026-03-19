//verif si user est connecté sinon redirige vers login
const token = localStorage.getItem('token');

if (!token) {
    window.location.href = '/frontend/login.php';
}