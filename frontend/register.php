<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="api.js"></script>
<script src="feed.js"></script>
</head>
<body>
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <!-- <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
          Flowbite    
      </a> -->
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Créez votre compte
              </h1>
              <form class="space-y-4 md:space-y-6" action="#">
                  <div>
                      <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre prénom</label>
                      <input type="text" name="first-name" id="first-name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required="">
                  </div>
                  <div>
                      <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre nom</label>
                      <input type="text" name="last-name" id="last-name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required="">
                  </div>
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre mail</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                  </div>
                  <div>
                      <label for="mot de passe" class="block mb-2 text-sm font-medium text-gray-90₀ dark:text-white">Mot de passe</label>
                      <input type="mot de passe" name="password" id="password" placeholder="••••••••" class="bg-gray-5₀ border border-gray-3₀ text-gray-9₀ rounded-lg focus:ring-primary-6₀ focus:border-primary-6₀ block w-full p-2.5 dark:bg-gray-7₀ dark:border-gray-6₀ dark:placeholder-gray-4₀ dark:text-white dark:focus:ring-blue-5₀ dark:focus:border-blue-5₀" required="">
                  </div>
                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                  <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">S'inscrire</button>
  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      J'ai deja un compte ? <a href="frontend/login.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Me connecter</a>
                  </p>              </form>
          </div>
      </div>
  </div>
</section>
</body>
</html>