// document.addEventListener('DOMContentLoaded', async () => {

//     //recupere les infu du user
//     const user = await apiGet('/me');

//     //on pré-remplit les champs du form
//     document.getElementById('first-name').value = user.first_name;
//     document.getElementById('last-name').value = user.last_name;
//     document.getElementById('email').value = user.email;

//     //cible le formulaire
//     const form = document.getElementById('profilForm');

//     form.addEventListener('submit', async (e) => {
//         //empeche le chargement de la page
//         e.preventDefault();

//         // recupere les nouvelle valeur
//         const body = {
//             first_name: document.getElementById('first-name').value,
//             last_name: document.getElementById('last-name').value,
//             email: document.getElementById('email').value,
//         };

//         //mot de passe seulement si remplie
//         const password = document.getElementById('password').value;
//         if (password) {
//             body.password = password;
//             body.password_confirmation = password;
//         }

//         //envoie le tout a l'API
//         const userId = localStorage.getItem('user_id');
//         await apiPut(`/users/${userId}`, body);

//         alert('Profil mis à jour avec succès !');

//     });
// document.getElementById('deleteAccountBtn').addEventListener('click', async () => {
//     const confirmation = confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.');
//     const userId = localStorage.getItem('user_id');
//     await apiDelete(`/users/${userId}?delete_content=${confirmation}`);
//     localStorage.clear();
//     window.location.href = '/login.php';
// });

document.addEventListener('DOMContentLoaded', async () => {
    const user = await apiGet('/me');



    document.getElementById('fullname').textContent = `${user.first_name} ${user.last_name}`;
    document.getElementById('bio').textContent = user.bio || 'Aucune bio disponible.';
    document.getElementById('avatar').src = user.avatar
        ? `http://localhost:8001/storage/${user.avatar}`
        : 'https://via.placeholder.com/100';

    const userId = localStorage.getItem('user_id');
    const posts = await apiGet(`/users/${userId}/posts`);

    const container = document.getElementById('user-posts');
    posts.forEach(post => {
        const div = document.createElement('div');
        div.className = 'bg-gray-800 rounded-lg p-4 mb-4 text-white';
        div.innerHTML = `
        <p>${post.content}</p>
        ${post.image_path ? `<img src="http://localhost:8001/storage/${post.image_path}" class="mt-2 rounded-lg w-48 h-48 object-cover">` : ''}
    `;
        container.appendChild(div);
    });
});