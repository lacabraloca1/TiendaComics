<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - ComicStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 p-5">
        <h1 class="text-xl font-bold">ComicStore</h1>
    </header>
    <main class="p-10 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Editar Perfil</h2>
        <form>
            <label class="block mb-2">Nombre completo:</label>
            <input type="text" value="Juan Pérez" class="w-full p-2 rounded bg-gray-700 mb-4">

            <label class="block mb-2">Correo electrónico:</label>
            <input type="email" value="juan@example.com" class="w-full p-2 rounded bg-gray-700 mb-4">

            <label class="block mb-2">Teléfono:</label>
            <input type="text" value="555-123-4567" class="w-full p-2 rounded bg-gray-700 mb-4">

            <label class="block mb-2">Nueva contraseña:</label>
            <input type="password" class="w-full p-2 rounded bg-gray-700 mb-4">

            <button class="bg-green-600 px-6 py-2 rounded">Guardar cambios</button>
        </form>
    </main>
</body>
</html>