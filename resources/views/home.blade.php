<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - ComicStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 p-5 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <img src="logo.png" alt="ComicStore Logo" class="w-10 h-10">
            <h1 class="text-xl font-bold">ComicStore</h1>
        </div>
        <nav>
            <ul class="flex gap-6 text-lg">
                <li><a href="/catalogo" class="hover:text-blue-400">Catálogo</a></li>
                <li><a href="/carrito" class="hover:text-blue-400">Carrito</a></li>
                <li><a href="/perfil" class="hover:text-blue-400">Perfil</a></li>
                <li><a href="/login" class="hover:text-blue-400">Iniciar sesión</a></li>
            </ul>
        </nav>
    </header>
    <main class="p-10 text-center">
        <h2 class="text-3xl font-bold mb-6">Bienvenido a ComicStore</h2>
        <p class="text-lg text-gray-300">Encuentra los mejores cómics y figuras coleccionables</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
            <div class="bg-gray-800 p-5 rounded shadow">
                <img src="comic1.jpg" alt="Comic" class="w-full h-48 object-cover mb-3 rounded">
                <h3 class="text-xl font-semibold">Batman: Año Uno</h3>
                <p class="text-gray-400">$150.00</p>
                <a href="/producto/1" class="mt-3 inline-block bg-blue-600 px-4 py-2 rounded">Ver más</a>
            </div>
        </div>
    </main>
</body>
</html>