<!DOCTYPE html>
<html class="dark">
<head>
<title>Profil</title>
</head>
<body class="bg-gray-900 min-h-screen">
        <nav class="bg-gray-800 fixed w-full z-20 top-0">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto px-8 py-5 ">        
        <span class="text-white text-xl font-bold">Connect'In</span>
        <div class="flex space-x-4">
<a href="feed.php" class="text-gray-400  font-bold">Feed</a>
<a href="profil.php" class=" hover:text-white">Profil</a>
            <button id="logoutBtn" class="text-red-400 hover:text-red-300">Déconnexion</button>
        </div>
    </div>
</nav>
<div class="pt-24 max-w-2xl mx-auto px-4">
    <div class="bg-gray-800 rounded-lg p-6 flex items-start space-x-6">
        <img id="avatar" src="" class="w-24 h-24 rounded-full object-cover bg-gray-600">
        <div>
            <h2 id="fullname" class="text-white text-2xl font-bold"></h2>
            <p id="bio" class="text-gray-400 mt-2"></p>
            <a href="edit-profil.php" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Modifier</a>
        </div>
        <a href="create_post.php" class="mt-2 inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">+ Créer un post</a>
    </div>
    <hr class="border-gray-600 my-6">
    <div id="user-posts"></div>
</div>
</section>
<script src="js/auth.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="js/api.js"></script>
<script src="js/logout.js"></script>
<script src="js/profil.js"></script>
</body>
</html>
