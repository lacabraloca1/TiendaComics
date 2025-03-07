<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caja - Admin</title>
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
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">📜 Hist. Ventas</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">💰 Corte de caja</a></li>
                    <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white">🚪 Cerrar sesión</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Contenido Principal -->
        <main class="flex-1 p-6">
            <div class="bg-gray-800 p-5 rounded-md flex justify-between">
                <div>
                    <h2 class="text-2xl font-bold">CAJA01</h2>
                    <p>Artículos: 5</p>
                </div>
                <div>
                    <p>Atiende: Nombre Ejemplo</p>
                    <p>Fecha y hora: 09/11/2025 12:00:00pm</p>
                </div>
            </div>
            
            <div class="mt-5 flex items-center">
                <input type="text" placeholder="Buscar producto" class="p-2 w-full bg-gray-700 text-white rounded-md"/>
                <button class="ml-3 bg-gray-600 p-2 rounded">🔍</button>
                <input type="number" value="1" class="ml-3 p-2 w-20 bg-gray-700 text-white rounded-md text-center"/>
                <button class="ml-3 bg-blue-500 p-2 text-white rounded">➕</button>
                <button class="ml-5 bg-gray-600 p-2 rounded text-white">➕ Nuevo ticket</button>
            </div>

            <!-- Tabla de Venta -->
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-900 text-center">
                            <td class="p-3">1</td>
                            <td class="p-3">123456789</td>
                            <td class="p-3">Producto Ejemplo</td>
                            <td class="p-3">2</td>
                            <td class="p-3">$200</td>
                            <td class="p-3">$150</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Botones de Acción -->
            <div class="mt-5 flex justify-between">
                <div class="flex gap-3">
                    <button class="bg-gray-500 text-white p-2 rounded-md">📄 Datos extra del ticket</button>
                    <button class="bg-gray-500 text-white p-2 rounded-md">⚡ Verificar Precio</button>
                    <button class="bg-gray-500 text-white p-2 rounded-md">🖨️ Reimprimir último ticket</button>
                </div>
                <div class="flex gap-3">
                    <button class="bg-red-600 text-white p-2 rounded-md">❌ Cancelar venta</button>
                    <button class="bg-blue-500 text-white p-2 rounded-md">✏️ Editar venta</button>
                </div>
            </div>

            <!-- Total y Pago -->
            <div class="mt-5 flex justify-between bg-gray-800 p-5 rounded-md items-center">
                <button class="bg-green-600 text-white p-4 text-xl rounded-md">💵 Pagar</button>
                <h2 class="text-3xl font-bold">TOTAL: $00.00</h2>
            </div>
        </main>
    </div>
</body>
</html>
