<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - Admin</title>
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
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">📜 Hist. Ventas</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">💰 Corte de caja</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">🚪 Cerrar sesión</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Contenido Principal -->
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">Inventario</h2>
                <div class="relative">
                    <input type="text" placeholder="Buscar producto" class="p-2 bg-gray-700 text-white rounded-md"/>
                    <button class="absolute right-2 top-2">🔍</button>
                </div>
            </div>

            <!-- Tabla de Inventario -->
            <div class="mt-5">
                <table class="w-full border-collapse bg-gray-800 text-white">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="p-3">NO.</th>
                            <th class="p-3">CÓDIGO DE BARRAS</th>
                            <th class="p-3">DESCRIPCIÓN</th>
                            <th class="p-3">CANTIDAD</th>
                            <th class="p-3">PRECIO</th>
                            <th class="p-3">PRECIO PROVEEDOR</th>
                            <th class="p-3">🔧</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">1</td>
                            <td class="p-3">123456789</td>
                            <td class="p-3">Producto Ejemplo</td>
                            <td class="p-3">50</td>
                            <td class="p-3">$100</td>
                            <td class="p-3">$80</td>
                            <td class="p-3">⚙️</td>
                        </tr>
                        <!-- Repetir más filas según necesidad -->
                    </tbody>
                </table>
            </div>

            <!-- Botones Inferiores -->
            <div class="mt-5 flex justify-between">
                <button class="bg-yellow-500 text-black p-2 rounded-md">📉 Descuentos</button>
                <button class="bg-blue-600 text-white p-2 rounded-md">🔄 Devolución</button>
                <button class="bg-green-600 text-white p-2 rounded-md">➕ Nuevo producto</button>
            </div>

            <!-- Mensajes de Éxito/Error -->
            <div class="mt-5">
                <div class="bg-green-100 text-green-700 p-2 rounded-md flex items-center">
                    ✅ Producto Agregado Correctamente
                </div>
                <div class="bg-red-100 text-red-700 p-2 rounded-md flex items-center mt-2">
                    ❌ Ocurrió un Error
                </div>
            </div>
        </main>
    </div>
</body>
</html>
