<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - ComicStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex flex-col justify-center items-center h-screen">
    <div class="bg-gray-800 p-8 rounded-lg shadow-md w-96 text-center">
        <img src="logo.png" alt="ComicStore Logo" class="mx-auto w-16 h-16 mb-4">
        <h1 class="text-xl font-bold mb-4 text-blue-400">COMICSTORE</h1>
        
        <h2 class="text-lg font-semibold mb-4">Inicia sesión</h2>
        
        <form>
            <div class="mb-4 text-left">
                <label class="block text-gray-300">Correo electrónico</label>
                <input type="email" placeholder="name@flowbite.com" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-700 text-white">
            </div>
            <div class="mb-4 text-left">
                <label class="block text-gray-300">Contraseña</label>
                <input type="password" placeholder="********" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-700 text-white">
            </div>
            <div class="flex justify-between items-center mb-4 text-sm">
                <a href="#" class="text-blue-400 hover:underline">¿Olvidaste tu contraseña?</a>
                <label class="flex items-center">
                    <input type="checkbox" class="mr-2">
                    Recordarme
                </label>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 w-full rounded-md hover:bg-blue-700">Entrar</button>
        </form>
    </div>
    
    <footer class="mt-8 text-gray-500 flex gap-5 text-2xl">
        <a href="#" class="hover:text-blue-400">&#xf09a;</a>
        <a href="#" class="hover:text-blue-400">&#xf16d;</a>
        <a href="#" class="hover:text-blue-400">&#xf392;</a>
        <a href="#" class="hover:text-blue-400">&#xf167;</a>
        <a href="#" class="hover:text-blue-400">&#xf16a;</a>
    </footer>
</body>
</html>
