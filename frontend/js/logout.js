document.getElementById('logoutBtn').addEventListener('click', async () => {
    await apiPost('/logout');
    localStorage.clear();
    window.location.href = '/frontend/login.php';
});