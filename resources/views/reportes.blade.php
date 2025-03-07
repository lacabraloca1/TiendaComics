<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
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
        <main class="flex-1 p-6 text-center">
            <div class="relative mb-6">
                <input type="text" placeholder="🔍 Hinted search text" class="p-3 w-1/3 bg-gray-200 text-black rounded-full text-center"/>
            </div>
            
            <div class="flex justify-center gap-10">
                <!-- Reporte Clientes -->
                <div>
                    <h2 class="text-2xl font-bold mb-3">Reporte Clientes</h2>
                    <div class="bg-gray-300 p-5 rounded-md shadow-md">
                        <input type="text" placeholder="Código de Barras" class="block w-full mb-3 p-2 rounded-md"/>
                        <input type="text" placeholder="Descripción" class="block w-full mb-3 p-2 rounded-md"/>
                        <input type="text" placeholder="Cantidad" class="block w-full mb-3 p-2 rounded-md"/>
                        <input type="text" placeholder="Precio" class="block w-full mb-3 p-2 rounded-md"/>
                        <input type="text" placeholder="Precio-proveedor" class="block w-full mb-3 p-2 rounded-md"/>
                    </div>
                    <button class="bg-green-500 text-white px-6 py-2 mt-3 rounded-md">📊 Generar Reporte</button>
                </div>
                
                <!-- Reporte Productos -->
                <div>
                    <h2 class="text-2xl font-bold mb-3">Reporte Productos</h2>
                    <div class="bg-gray-300 p-5 rounded-md shadow-md">
                        <input type="text" placeholder="Código de Barras" class="block w-full mb-3 p-2 rounded-md"/>
                        <input type="text" placeholder="Descripción" class="block w-full mb-3 p-2 rounded-md"/>
                        <input type="text" placeholder="Cantidad" class="block w-full mb-3 p-2 rounded-md"/>
                        <input type="text" placeholder="Precio" class="block w-full mb-3 p-2 rounded-md"/>
                        <input type="text" placeholder="Precio-proveedor" class="block w-full mb-3 p-2 rounded-md"/>
                    </div>
                    <button class="bg-green-500 text-white px-6 py-2 mt-3 rounded-md">📊 Generar Reporte</button>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
