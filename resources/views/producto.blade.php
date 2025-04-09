<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto - ComicStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 p-5 flex justify-between items-center">
        <h1 class="text-xl font-bold">ComicStore</h1>
        <nav>
            <ul class="flex gap-6 text-lg">
                <li><a href="/" class="hover:text-blue-400">Inicio</a></li>
                <li><a href="/catalogo" class="hover:text-blue-400">Catálogo</a></li>
                <li><a href="/carrito" class="hover:text-blue-400">Carrito</a></li>
            </ul>
        </nav>
    </header>
    <main class="p-10">
        <div class="flex flex-col md:flex-row gap-10">
            <img src="/img/producto.jpg" alt="Comic" class="w-full md:w-1/2 rounded">
            <div>
                <h2 class="text-3xl font-bold mb-3">Título del Cómic</h2>
                <p class="text-gray-300 mb-4">Descripción completa del producto aquí.</p>
                <p class="text-xl mb-2">Precio: <span class="text-green-400">$200.00</span></p>
                <button class="bg-green-600 px-6 py-2 mt-3 rounded">Agregar al carrito</button>
            </div>
        </div>
    </main>
</body>
</html>