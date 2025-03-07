<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes de Membresía</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 p-5 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <img src="logo.png" alt="ComicStore Logo" class="w-10 h-10">
            <h1 class="text-xl font-bold">ComicStore</h1>
        </div>
        <nav>
            <ul class="flex gap-6 text-lg">
                <li><a href="#" class="text-white hover:text-gray-400">Ayuda</a></li>
                <li><a href="#" class="text-white hover:text-gray-400">Registrarse</a></li>
                <li><a href="#" class="text-white hover:text-gray-400">Iniciar sesión</a></li>
            </ul>
        </nav>
    </header>
    
    <main class="flex justify-center gap-10 mt-10">
        <!-- Plan Express -->
        <div class="bg-gray-800 p-6 rounded-md w-64 text-center">
            <h2 class="text-xl font-bold">Plan Express</h2>
            <p class="text-lg mt-2">$100 mxn <span class="text-sm">/mes</span></p>
            <p class="text-sm mt-3">Prioridad en la preparación del pedido.</p>
            <p class="text-sm">Acceso a una fila rápida de procesamiento.</p>
            <p class="text-sm">Seguimiento en tiempo real del pedido.</p>
            <p class="text-sm">Clientes frecuentes que buscan rapidez y beneficios adicionales.</p>
            <button class="bg-blue-600 text-white px-4 py-2 mt-4 rounded-md w-full">Selecciona plan</button>
        </div>
        
        <!-- Plan Turbo -->
        <div class="bg-gray-800 p-6 rounded-md w-64 text-center">
            <h2 class="text-xl font-bold">Plan Turbo</h2>
            <p class="text-lg mt-2">$150 mxn <span class="text-sm">/mes</span></p>
            <p class="text-sm mt-3">Prioridad alta en la preparación y envío.</p>
            <p class="text-sm">Descuento en envíos express.</p>
            <p class="text-sm">Soporte preferencial para cambios y ajustes en el pedido.</p>
            <p class="text-sm">Clientes frecuentes que buscan rapidez y beneficios adicionales.</p>
            <button class="bg-blue-600 text-white px-4 py-2 mt-4 rounded-md w-full">Selecciona plan</button>
        </div>
        
        <!-- Plan VIP -->
        <div class="bg-gray-800 p-6 rounded-md w-64 text-center">
            <h2 class="text-xl font-bold">Plan VIP</h2>
            <p class="text-lg mt-2">$200 mxn <span class="text-sm">/mes</span></p>
            <p class="text-sm mt-3">Máxima prioridad en la preparación y entrega.</p>
            <p class="text-sm">Envío gratis o con descuento significativo.</p>
            <p class="text-sm">Acceso a promociones y productos exclusivos.</p>
            <p class="text-sm">Soporte personalizado 24/7.</p>
            <button class="bg-blue-600 text-white px-4 py-2 mt-4 rounded-md w-full">Selecciona plan</button>
        </div>
    </main>
</body>
</html>
