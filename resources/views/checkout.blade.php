<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - ComicStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 p-5 flex justify-between items-center">
        <h1 class="text-xl font-bold">ComicStore</h1>
        <nav>
            <ul class="flex gap-6 text-lg">
                <li><a href="/" class="hover:text-blue-400">Inicio</a></li>
                <li><a href="/carrito" class="hover:text-blue-400">Carrito</a></li>
            </ul>
        </nav>
    </header>
    <main class="p-10 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-5">Finaliza tu compra</h2>
        <form>
            <label class="block mb-2">Nombre completo:</label>
            <input type="text" class="w-full p-2 rounded bg-gray-700 mb-4">

            <label class="block mb-2">Dirección:</label>
            <input type="text" class="w-full p-2 rounded bg-gray-700 mb-4">

            <label class="block mb-2">Método de pago:</label>
            <select class="w-full p-2 rounded bg-gray-700 mb-4">
                <option>Tarjeta</option>
                <option>Transferencia</option>
            </select>

            <button class="bg-blue-600 px-6 py-2 rounded">Confirmar compra</button>
        </form>
    </main>
</body>
</html>
