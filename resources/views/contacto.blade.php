<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - ComicStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 p-5">
        <h1 class="text-xl font-bold">ComicStore</h1>
    </header>
    <main class="p-10 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Contáctanos</h2>
        <form>
            <label class="block mb-2">Nombre:</label>
            <input type="text" class="w-full p-2 rounded bg-gray-700 mb-4">

            <label class="block mb-2">Correo:</label>
            <input type="email" class="w-full p-2 rounded bg-gray-700 mb-4">

            <label class="block mb-2">Mensaje:</label>
            <textarea class="w-full p-2 rounded bg-gray-700 mb-4"></textarea>

            <button class="bg-green-600 px-6 py-2 rounded">Enviar</button>
        </form>
    </main>
</body>
</html>
