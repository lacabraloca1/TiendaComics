<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 h-screen p-5">
            <h1 class="text-lg font-bold mb-5">Nombre**</h1>
            <nav>
                <ul>
                    <li class="mb-3"><a href="#" class="flex items-center text-gray-400 hover:text-white">📦 Ventas</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">➕ Nuevo Ticket</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">🔄 Devoluciones</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">📦 Proveedores</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">👥 Empleados</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">🚚 Envíos</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">🎫 Membresías</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">📜 Hist. Ventas</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">💰 Corte de caja</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">🚪 Cerrar sesión</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Contenido Principal -->
        <main class="flex-1 p-6">
            <div class="bg-gray-800 p-5 rounded-md">
                <h2 class="text-2xl font-bold">Proveedores</h2>
            </div>
            
            <!-- Tabla de Proveedores -->
            <div class="mt-5">
                <table class="w-full border-collapse bg-gray-800 text-white">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="p-3">NUM</th>
                            <th class="p-3">DESCRIPCIÓN</th>
                            <th class="p-3">MARCA</th>
                            <th class="p-3">TELÉFONO</th>
                            <th class="p-3">CORREO</th>
                            <th class="p-3">SITIO WEB</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">1</td>
                            <td class="p-3">TRAILER ROJO</td>
                            <td class="p-3">THE PLANET CÓMIC</td>
                            <td class="p-3">+56414145841</td>
                            <td class="p-3">PROVEEDOR1@GMAIL.COM</td>
                            <td class="p-3"><a href="https://www.comicsuniverse.com.mx" class="text-blue-400">COMICS UNIVERSE</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Botones de Acción -->
            <div class="mt-5 flex justify-center gap-5">
                <button class="bg-yellow-500 text-black px-6 py-2 rounded-md">➕ Nuevo proveedor</button>
                <button class="bg-red-600 text-white px-6 py-2 rounded-md">❌ Eliminar proveedor</button>
                <button class="bg-blue-600 text-white px-6 py-2 rounded-md">✏️ Modificar proveedor</button>
            </div>
        </main>
    </div>
</body>
</html>
