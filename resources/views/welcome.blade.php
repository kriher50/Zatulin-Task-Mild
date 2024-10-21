<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-background dark:text-white ">
<header class="bg-white shadow dark:bg-gray-800">
    <div class="container mx-auto p-4 flex justify-between items-center">
        <h1 class="text-4xl font-bold text-title dark:text-highlight">лого-название</h1>
        <button @click="darkMode = !darkMode" class="flex items-center space-x-2 bg-gray-200 dark:bg-gray-700 p-2 rounded hover:shadow-lg hover:shadow-cyan-900 transition-shadow duration-300 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                <path d="M15.312 11.424a5.5 5.5 0 0 1-9.201 2.466h2.433a.75.75 0 0 0 0-1.5H3.989a.75.75 0 0 0-.75.75v4.242a.75.75 0 0 0 1.5 0v-2.43a7 7 0 0 0 11.712-3.138.75.75 0 0 0-1.449-.39Zm1.23-3.723a.75.75 0 0 0 .219-.53V2.929a.75.75 0 0 0-1.5 0V5.36l-.31-.31a7 7 0 0 0-11.712 3.138.75.75 0 1 0 1.448.389 5.5 5.5 0 0 1 9.201-2.467h2.432a.75.75 0 0 0 0-1.5h-4.243a.75.75 0 0 0-.53.219Z"/>
            </svg>
            <span class="dark:text-white">Поменять тему</span>
        </button>
    </div>
</header>

<main class="container mx-auto mt-5">
    @livewire('news-component')
</main>

<footer class="bg-gray-800 text-white p-4 mt-10">
    <div class="container mx-auto text-center">
        <p>&copy; {{ date('Y') }} Сайт Новостей. Все права защищены.</p>
    </div>
</footer>

@livewireScripts
</body>
</html>
