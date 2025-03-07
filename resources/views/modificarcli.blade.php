<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Clientes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 h-screen p-5">
            <h1 class="text-lg font-bold mb-5">CLIENTES</h1>
            <nav>
                <ul>
                    <li class="mb-3"><a href="#" class="flex items-center text-gray-400 hover:text-white">📋 Administración de clientes</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">➕ Buscador</a></li>
                </ul>
                <ul class="mt-5">
                    <li class="mb-2 text-white">Nombre - Folio</li>
                    <li class="mb-2 text-gray-400">Jared - 1</li>
                    <li class="mb-2 text-gray-400">Alfredo - 2</li>
                    <li class="mb-2 text-gray-400">Jose - 3</li>
                </ul>
            </nav>
        </aside>

        <!-- Contenido Principal -->
        <main class="flex-1 p-6">
            <div class="bg-gray-800 p-5 rounded-md">
                <h2 class="text-2xl font-bold">Modificar clientes</h2>
                <div class="flex gap-5 mt-3">
                    <button class="bg-black text-white px-6 py-2 rounded-md">➕ Nuevo cliente</button>
                    <button class="bg-red-600 text-white px-6 py-2 rounded-md">❌ Eliminar</button>
                    <button class="bg-green-600 text-white px-6 py-2 rounded-md">💾 Guardar</button>
                </div>
            </div>
            
            <!-- Tabla de Clientes -->
            <div class="mt-5">
                <table class="w-full border-collapse bg-gray-800 text-white">
                    <tbody>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">FOLIO</td>
                            <td class="p-3">2</td>
                        </tr>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">NOMBRES</td>
                            <td class="p-3">CRISTIANO RONALDO</td>
                        </tr>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">APELLIDOS</td>
                            <td class="p-3">DOS SANTOS AVEIRO</td>
                        </tr>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">TELÉFONO</td>
                            <td class="p-3">+52 4424762897</td>
                        </tr>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">EMAIL</td>
                            <td class="p-3">CR7@GMAIL.COM</td>
                        </tr>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">DOMICILIO</td>
                            <td class="p-3"></td>
                        </tr>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">COLONIA</td>
                            <td class="p-3"></td>
                        </tr>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">ESTADO</td>
                            <td class="p-3"></td>
                        </tr>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">CÓDIGO POSTAL</td>
                            <td class="p-3"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Sección de Comentarios -->
            <div class="mt-5">
                <h3 class="text-xl font-bold">Comentarios:</h3>
                <textarea class="w-full mt-3 p-2 bg-gray-700 text-white rounded-md"></textarea>
                <button class="bg-green-600 text-white px-6 py-2 mt-3 rounded-md">💾 GUARDAR</button>
            </div>
        </main>
    </div>
</body>
</html>
