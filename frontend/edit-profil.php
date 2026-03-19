<!DOCTYPE html>
<html class="dark">

<head>
    <title>Edit Profil</title>
</head>

<body class="bg-gray-900 min-h-screen">
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
    <section class="bg-gray-50 dark:bg-gray-900 pt-20">

        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Modfiez votre profil
                    </h1>
                    <form id="profilForm" class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="avatar"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo de
                                profil</label>
                            <input type="file" name="avatar" id="avatar" accept="image/*"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div>

                            <label for="first-name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre
                                prénom</label>
                            <input type="text" name="first-name" id="first-name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="John" required="">
                        </div>
                        <div>
                            <label for="last-name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre nom</label>
                            <input type="text" name="last-name" id="last-name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Doe" required="">
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre mail</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de
                                passe</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmer le mot de
                                passe</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <button type="submit"
                                    class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Enregistrer</button>
                    </form>
                    <button id="deleteAccountBtn"
                        class="w-full text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4">Supprimer
                        mon compte</button>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/auth.js"></script>
    <script src="js/api.js"></script>
    <script src="js/logout.js"></script>
    <script src="js/edit-profil.js"></script>
</body>

</html>