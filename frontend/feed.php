<!DOCTYPE html>
<html class="dark">
<head>
<title>Feed</title>

</head>
<body class="bg-gray-900">
    <nav class="bg-gray-800 fixed w-full z-20 top-0">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto px-8 py-5 ">        
        <span class="text-white text-xl font-bold">Connect'In</span>
        <div class="flex space-x-4">
<a href="index.php" class="text-white font-bold">Feed</a>
<a href="profil.php" class="text-gray-400 hover:text-white">Profil</a>
            <button id="logoutBtn" class="text-red-400 hover:text-red-300">Déconnexion</button>
        </div>
    </div>
</nav>
    <div id="posts-container" class="pt-40 max-w-2xl mx-auto px-4"></div>
    <a href="create_post.php" class="fixed bottom-6 right-6 bg-blue-600 text-white rounded-full w-14 h-14 flex items-center justify-center text-3xl shadow-lg hover:bg-blue-700">+</a>
    </body>
    <script src="js/auth-guard.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
<script src="js/api.js"></script>
<script src="js/logout.js"></script>
<script src="js/feed.js"></script>

</html>