document.addEventListener('DOMContentLoaded', async () => {
    const user = await apiGet('/me');

    document.getElementById('first-name').value = user.first_name;
    document.getElementById('last-name').value = user.last_name;
    document.getElementById('email').value = user.email;

    const form = document.getElementById('profilForm');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const body = {
            first_name: document.getElementById('first-name').value,
            last_name: document.getElementById('last-name').value,
            email: document.getElementById('email').value,
        };

        const password = document.getElementById('password').value;
        if (password) {
            body.password = password;
            body.password_confirmation = document.getElementById('password_confirmation').value;
        }

        const userId = localStorage.getItem('user_id');
        await apiPut(`/users/${userId}`, body);
        alert('Profil mis à jour avec succès !');
    });

    document.getElementById('deleteAccountBtn').addEventListener('click', async () => {
        const confirmation = confirm('Voulez-vous supprimer votre contenu aussi ?');
        const userId = localStorage.getItem('user_id');
        await apiDelete(`/users/${userId}?delete_content=${confirmation}`);
        localStorage.clear();
        window.location.href = '/frontend/login.php';
    });
form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const body = { first_name: document.getElementById('first-name').value,
    last_name: document.getElementById('last-name').value,
    email: document.getElementById('email').value,  };
    
    // Mise à jour des infos
    const userId = localStorage.getItem('user_id');
    await apiPut(`/users/${userId}`, body);

    // Upload avatar si présent
    const avatarFile = document.getElementById('avatar').files[0];
    if (avatarFile) {
        const formData = new FormData();
        formData.append('avatar', avatarFile);
        await apiUpload(`/users/${userId}/avatar`, formData);
    }

    alert('Profil mis à jour avec succès !');

});
});
