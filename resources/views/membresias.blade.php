<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membresías</title>
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
                <h2 class="text-2xl font-bold">Membresías</h2>
                <div class="flex gap-5 mt-3">
                    <button class="bg-black text-white px-6 py-2 rounded-md">➕ Nuevo cliente</button>
                    <button class="bg-red-600 text-white px-6 py-2 rounded-md">❌ Eliminar</button>
                    <button class="bg-green-600 text-white px-6 py-2 rounded-md">💾 Guardar</button>
                </div>
            </div>
            
            <!-- Tabla de Membresías -->
            <div class="mt-5">
                <table class="w-full border-collapse bg-gray-800 text-white">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="p-3">FOLIO</th>
                            <th class="p-3">NOMBRES</th>
                            <th class="p-3">APELLIDOS</th>
                            <th class="p-3">EMAIL</th>
                            <th class="p-3">MEMBRESÍA</th>
                            <th class="p-3">MONTO</th>
                            <th class="p-3">FECHA INICIAL</th>
                            <th class="p-3">FECHA FINAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">1</td>
                            <td class="p-3">CRISTIANO RONALDO</td>
                            <td class="p-3">DOS SANTOS AVEIRO</td>
                            <td class="p-3">CR7@GMAIL.COM</td>
                            <td class="p-3">BÁSICA</td>
                            <td class="p-3">$</td>
                            <td class="p-3">01/01/2025</td>
                            <td class="p-3">02/02/2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
