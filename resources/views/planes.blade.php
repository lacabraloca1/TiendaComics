@extends('layouts.blaze')

@section('title', 'Planes de Membresía - Multiverso Comics')

@section('content')
<header class="bg-gray-800 p-5 flex justify-between items-center">
    <div class="flex items-center gap-3">
        <img src="logo.png" alt="ComicStore Logo" class="w-10 h-10">
        <h1 class="text-xl font-bold">Multiverso Comics</h1>
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
        <h2 class="text-xl font-bold">🚀 Plan Express</h2>
        <p class="text-lg mt-2">$100 mxn <span class="text-sm">/mes</span></p>
        <p class="text-sm mt-3">Prioridad en la preparación del pedido.</p>
        <p class="text-sm">Acceso a una fila rápida de procesamiento.</p>
        <p class="text-sm">Seguimiento en tiempo real del pedido.</p>
        <p class="text-sm">Clientes frecuentes que buscan rapidez y beneficios adicionales.</p>
        <button class="bg-blue-600 text-white px-4 py-2 mt-4 rounded-md w-full" 
                onclick="openModal('modalSeleccionarPlan', 'Plan Express', '100')">
            Selecciona plan
        </button>
    </div>
    
    <!-- Plan Turbo -->
    <div class="bg-gray-800 p-6 rounded-md w-64 text-center">
        <h2 class="text-xl font-bold">⚡ Plan Turbo</h2>
        <p class="text-lg mt-2">$150 mxn <span class="text-sm">/mes</span></p>
        <p class="text-sm mt-3">Prioridad alta en la preparación y envío.</p>
        <p class="text-sm">Descuento en envíos express.</p>
        <p class="text-sm">Soporte preferencial para cambios y ajustes en el pedido.</p>
        <p class="text-sm">Clientes frecuentes que buscan rapidez y beneficios adicionales.</p>
        <button class="bg-blue-600 text-white px-4 py-2 mt-4 rounded-md w-full" 
                onclick="openModal('modalSeleccionarPlan', 'Plan Turbo', '150')">
            Selecciona plan
        </button>
    </div>
    
    <!-- Plan VIP -->
    <div class="bg-gray-800 p-6 rounded-md w-64 text-center">
        <h2 class="text-xl font-bold">🌟 Plan VIP</h2>
        <p class="text-lg mt-2">$200 mxn <span class="text-sm">/mes</span></p>
        <p class="text-sm mt-3">Máxima prioridad en la preparación y entrega.</p>
        <p class="text-sm">Envío gratis o con descuento significativo.</p>
        <p class="text-sm">Acceso a promociones y productos exclusivos.</p>
        <p class="text-sm">Soporte personalizado 24/7.</p>
        <button class="bg-blue-600 text-white px-4 py-2 mt-4 rounded-md w-full" 
                onclick="openModal('modalSeleccionarPlan', 'Plan VIP', '200')">
            Selecciona plan
        </button>
    </div>
</main>

<!-- ======================== MODALS ======================== -->

<!-- Modal: Seleccionar Plan -->
<div id="modalSeleccionarPlan" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Confirmar Selección</h2>
        <p id="planNombre" class="text-lg font-semibold">Plan: </p>
        <p id="planPrecio" class="text-lg text-gray-700">Precio: </p>

        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalSeleccionarPlan')">Cancelar</button>
            <button class="bg-blue-600 text-white px-3 py-1 rounded" onclick="openModal('modalConfirmarCompra')">Continuar</button>
        </div>
    </div>
</div>

<!-- Modal: Confirmar Compra -->
<div id="modalConfirmarCompra" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Confirmar Compra</h2>
        <p class="text-gray-700">¿Estás seguro de que deseas adquirir este plan?</p>

        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalConfirmarCompra')">Cancelar</button>
            <button class="bg-green-600 text-white px-3 py-1 rounded">💳 Comprar</button>
        </div>
    </div>
</div>

<!-- ======================== SCRIPTS ======================== -->
<script>
    function openModal(modalId, planNombre = '', planPrecio = '') {
        document.getElementById(modalId).classList.remove("hidden");
        
        if (planNombre && planPrecio) {
            document.getElementById("planNombre").textContent = "Plan: " + planNombre;
            document.getElementById("planPrecio").textContent = "Precio: $" + planPrecio + " mxn/mes";
        }
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add("hidden");
    }
</script>

@endsection
