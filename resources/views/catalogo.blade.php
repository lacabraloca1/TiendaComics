<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - ComicStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 p-5 flex justify-between items-center">
        <h1 class="text-xl font-bold">ComicStore</h1>
        <nav>
            <ul class="flex gap-6 text-lg">
                <li><a href="/" class="hover:text-blue-400">Inicio</a></li>
                <li><a href="/carrito" class="hover:text-blue-400">Carrito</a></li>
                <li><a href="/perfil" class="hover:text-blue-400">Perfil</a></li>
            </ul>
        </nav>
    </header>
    <main class="p-10">
        <h2 class="text-3xl font-bold mb-6 text-center">Catálogo de productos</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-800 p-5 rounded shadow text-center">
                <img src="comic2.jpg" alt="Comic" class="w-full h-48 object-cover mb-3 rounded">
                <h3 class="text-xl font-semibold">Spiderman: Universo</h3>
                <p class="text-gray-400">$180.00</p>
                <button class="mt-3 bg-green-600 px-4 py-2 rounded">Agregar al carrito</button>
            </div>
        </div>
    </main>
</body>
</html>
