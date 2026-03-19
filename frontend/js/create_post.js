document.addEventListener('DOMContentLoaded', () =>{

    //cible le formulaire
    const form = document.getElementById('postForm');
    form.addEventListener('submit', async (e) => {
        //empeche le chargement de la page
        e.preventDefault();
        
        //contenir le text et les fichier
        const formData = new FormData(form);
        console.log([...formData]);

      

        //envoie le tout a l'API
        await apiUpload('/posts', formData);
        const reponse = await apiUpload('/posts', formData);
console.log(reponse);


        //on redirige vers le feed
        window.location.href = 'index.php';
    });
      
})