//Récupérer les posts avec apiGet
document.addEventListener('DOMContentLoaded', async () => {
    const posts = await apiGet('/posts');
    console.log(posts);

    const container = document.getElementById('posts-container');

    posts.data.forEach(post => {
        // crée une div pour chaque post
        const div = document.createElement('div');

        //ajout des classes tailwind  et contenue html
        div.className = 'bg-gray-800 dark:border-gray-700 rounded-lg shadow p-4 mb-4 post-container text-white';
        div.innerHTML = `
    <p class="font-bold">${post.user.first_name} ${post.user.last_name}</p>
    <p class="mt-2">${post.content}</p>
${post.image_path ? `<img src="http://localhost:8001/storage/${post.image_path}" class="mt-2 rounded-lg w-48 h-48 object-cover">` : ''}    ${parseInt(localStorage.getItem('user_id')) === post.user_id ? `
        <div class="relative flex justify-end"> 
        <button class="option-btn">...</button>
        <div class="options-menu hidden">
        <button class="delete-post-btn text-red-500" data-post-id="${post.id}">Supprimer le post</button>
        </div>
        </div>
    ` : ''}
    <button class="like-btn" data-post-id="${post.id}" data-likes="${post.likes_count || 0}">🤍 ${post.likes_count || 0}</button>
    <button class="comment-btn" data-post-id="${post.id}">💬 ${post.comments.length || 0}</button>
    <div class="comments-list hidden mt-2">
        ${post.comments.map(c => `
            <div class="comment">
                <p><strong>${c.user.first_name}</strong>: ${c.content}</p>
                ${parseInt(localStorage.getItem('user_id')) === c.user_id
                ? `<button class="delete-comment-btn" data-comment-id="${c.id}">🗑️</button>`
                : ''}
            </div>
        `).join('')}
    </div>
    <input type="text" class="comment-input hidden mt-2 p-2 border rounded w-full" placeholder="Ajouter un commentaire...">`;


        //ajout de la div au container
        container.appendChild(div);
    });

    document.querySelectorAll('.like-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const postId = btn.dataset.postId;
            const reponse = await apiPost(`/posts/${postId}/like`);
            console.log(reponse);
            const likes = parseInt(btn.dataset.likes);
            if (reponse.liked) {
                btn.textContent = `❤️ ${reponse.count}`;
                btn.dataset.likes = reponse.count;
            } else {
                btn.textContent = `🤍 ${reponse.count}`;
                btn.dataset.likes = reponse.count;
            }

        });
    });
    //juste afficher l'input
    document.querySelectorAll('.comment-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const postId = btn.dataset.postId;
            btn.closest('.post-container').querySelector('.comments-list').classList.remove('hidden');
            const input = btn.closest('.post-container').querySelector('.comment-input'); input.classList.remove('hidden');
        });
    });
    //touche Entrée dans l'input : envoyer le commentaire
    document.querySelectorAll('.comment-input').forEach(input => {
        input.addEventListener('keypress', async (e) => {
            if (e.key === 'Enter') {
                const postId = input.closest('.post-container').querySelector('.comment-btn').dataset.postId;
                console.log('');
                const reponse = await apiPost(`/posts/${postId}/comments`, { content: input.value });
                console.log(reponse);
                const newComment = document.createElement('div');
                newComment.className = 'comment';
                const commentsList = input.closest('.post-container').querySelector('.comments-list');
                newComment.innerHTML = `
    <p><strong>${reponse.user.first_name}</strong>: ${reponse.content}</p>
    <button class="delete-comment-btn" data-comment-id="${reponse.id}">🗑️</button>
    `;
                commentsList.appendChild(newComment);
                input.classList.add('hidden');
                input.value = '';
                const commentBtn = input.closest('.post-container').querySelector('.comment-btn');
                const count = parseInt(commentBtn.textContent.split(' ')[1]);
                commentBtn.textContent = `💬 ${count + 1}`;


            }
        });
        document.querySelectorAll('.delete-comment-btn').forEach(btn => {
            btn.addEventListener('click', async () => {
                const commentId = btn.dataset.commentId;
                await apiDelete(`/comments/${commentId}`);
                const commentBtn = btn.closest('.post-container').querySelector('.comment-btn');
                const count = parseInt(commentBtn.textContent.split(' ')[1]);
                commentBtn.textContent = `💬 ${count - 1}`; console.log('Commentaire supprimé');
                btn.closest('.comment').remove();
            })
        })
    });
    document.querySelectorAll('.option-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const menu = btn.closest('.relative').querySelector('.options-menu');
            menu.classList.toggle('hidden');
        });
    });
    document.querySelectorAll('.delete-post-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const postId = btn.dataset.postId;
            await apiDelete(`/posts/${postId}`);
             btn.closest('.post-container').remove();
        });
    });
});