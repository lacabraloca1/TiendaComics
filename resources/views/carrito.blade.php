<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - ComicStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 p-5 flex justify-between items-center">
        <h1 class="text-xl font-bold">ComicStore</h1>
        <nav>
            <ul class="flex gap-6 text-lg">
                <li><a href="/" class="hover:text-blue-400">Inicio</a></li>
                <li><a href="/catalogo" class="hover:text-blue-400">Catálogo</a></li>
                <li><a href="/perfil" class="hover:text-blue-400">Perfil</a></li>
            </ul>
        </nav>
    </header>
    <main class="p-10">
        <h2 class="text-3xl font-bold mb-6 text-center">Carrito de compras</h2>
        <table class="w-full text-white bg-gray-800">
            <thead class="bg-gray-700">
                <tr>
                    <th class="p-3">Producto</th>
                    <th class="p-3">Cantidad</th>
                    <th class="p-3">Precio</th>
                    <th class="p-3">Subtotal</th>
                    <th class="p-3">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center bg-gray-900">
                    <td class="p-3">Iron Man #1</td>
                    <td class="p-3">2</td>
                    <td class="p-3">$120</td>
                    <td class="p-3">$240</td>
                    <td class="p-3">❌</td>
                </tr>
            </tbody>
        </table>
        <div class="text-right mt-5">
            <h3 class="text-2xl font-bold">Total: $240</h3>
            <a href="/checkout" class="bg-green-600 px-6 py-3 rounded mt-3 inline-block">Proceder al pago</a>
        </div>
    </main>
</body>
</html>
