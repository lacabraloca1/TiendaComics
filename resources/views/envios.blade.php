<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envíos</title>
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
                <h2 class="text-2xl font-bold">Envíos</h2>
            </div>
            
            <!-- Tabla de Envíos -->
            <div class="mt-5">
                <table class="w-full border-collapse bg-gray-800 text-white">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="p-3">NO.</th>
                            <th class="p-3">FECHA Y HORA</th>
                            <th class="p-3">FOLIO</th>
                            <th class="p-3">CLIENTE</th>
                            <th class="p-3">DIRECCIÓN</th>
                            <th class="p-3">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">1</td>
                            <td class="p-3">04/05/2025</td>
                            <td class="p-3">445877</td>
                            <td class="p-3">ARTEMIO</td>
                            <td class="p-3">SALIDA CANCÚN 15, #5844 QUERÉTARO</td>
                            <td class="p-3">EN PROCESO</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
