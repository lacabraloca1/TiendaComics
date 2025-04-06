@extends('layouts.blaze')

@section('title', 'Caja - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between">
    <div>
        <h2 class="text-2xl font-bold">CAJA01</h2>
        <p>Artículos: 5</p>
    </div>
    <div>
        <p>Atiende: Nombre Ejemplo</p>
        <p>Fecha y hora: {{ now()->format('d/m/Y h:i:s A') }}</p>
    </div>
</div>

<!-- Buscador y botones -->
<div class="mt-5 flex items-center">
    <input type="text" placeholder="Buscar producto" class="p-2 w-full bg-gray-700 text-white rounded-md"/>
    <button class="ml-3 bg-gray-600 p-2 rounded">🔍</button>
    <input type="number" value="1" class="ml-3 p-2 w-20 bg-gray-700 text-white rounded-md text-center"/>
    <button class="ml-3 bg-blue-500 p-2 text-white rounded" onclick="openModal('modalAgregarProducto')">➕</button>

    <!-- Nuevo Ticket Mejorado -->
    <button onclick="openModal('modalNuevoTicket')"
        class="ml-5 flex items-center bg-purple-600 text-white px-4 py-2 rounded-md shadow-lg hover:bg-purple-700 transition">
        <span class="text-xl mr-2">➕</span> Nuevo Ticket
    </button>
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
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-900 text-center">
                <td class="p-3">1</td>
                <td class="p-3">123456789</td>
                <td class="p-3">Producto Ejemplo</td>
                <td class="p-3">2</td>
                <td class="p-3">$200</td>
                <td class="p-3">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded" onclick="openModal('modalEditarProducto')">✏️ Editar</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded" onclick="openModal('modalCancelarVenta')">❌ Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal: Nuevo Ticket con búsqueda de cliente -->
<div id="modalNuevoTicket" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Crear Nuevo Ticket</h2>
        
        <!-- Buscador de clientes con autocompletado -->
        <label class="block text-gray-700 font-medium">Buscar cliente (Opcional)</label>
        <input type="text" id="client-search" placeholder="Escribe el nombre del cliente..." class="w-full p-2 border rounded mb-3" autocomplete="off">
        
        <!-- Lista desplegable de sugerencias -->
        <ul id="client-list" class="lista-sugerencias bg-white border rounded shadow-md absolute z-10 w-80" style="display: none;"></ul>

        <!-- Información del cliente seleccionado -->
        <div id="client-info" class="hidden mt-3">
            <p><strong>Nombre:</strong> <span id="client-name"></span></p>
            <p><strong>Email:</strong> <span id="client-email"></span></p>
            <p><strong>Membresía:</strong> <span id="client-membership"></span></p>
        </div>

        <label class="block text-gray-700 font-medium mt-3">Fecha</label>
        <input type="date" value="{{ now()->format('Y-m-d') }}" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Método de Pago</label>
        <select class="w-full p-2 border rounded mb-3">
            <option>Efectivo</option>
            <option>Tarjeta de Crédito</option>
            <option>Tarjeta de Débito</option>
            <option>Transferencia</option>
        </select>

        <label class="block text-gray-700 font-medium">Notas Adicionales</label>
        <textarea class="w-full p-2 border rounded mb-3" rows="3" placeholder="Agregar notas aquí..."></textarea>

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalNuevoTicket')">Cancelar</button>
            <button class="bg-purple-600 text-white px-3 py-1 rounded hover:bg-purple-700">Crear Ticket</button>
        </div>
    </div>
</div>

<!-- JavaScript para autocompletado -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('client-search');
    const suggestionsList = document.getElementById('client-list');
    const clientInfoDiv = document.getElementById('client-info');
    const clientNameSpan = document.getElementById('client-name');
    const clientEmailSpan = document.getElementById('client-email');
    const clientMembershipSpan = document.getElementById('client-membership');

    let clientsData = [
        { nombre: "Juan Pérez", email: "juan@example.com", membresia: "Básica" },
        { nombre: "María López", email: "maria@example.com", membresia: "Pro" },
        { nombre: "Carlos Ramírez", email: "carlos@example.com", membresia: "Básica" },
        { nombre: "Ana Torres", email: "ana@example.com", membresia: "Pro" }
    ];

    // Evento de entrada en el campo de búsqueda
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.trim().toLowerCase();
        clientInfoDiv.classList.add('hidden');

        if (query === '') {
            suggestionsList.innerHTML = '';
            suggestionsList.style.display = 'none';
            return;
        }

        // Filtrar los clientes cuyo nombre coincida parcialmente
        const resultados = clientsData.filter(cliente =>
            cliente.nombre.toLowerCase().includes(query)
        );

        suggestionsList.innerHTML = '';
        if (resultados.length === 0) {
            suggestionsList.style.display = 'none';
            return;
        }

        suggestionsList.style.display = 'block';
        resultados.forEach(cliente => {
            const item = document.createElement('li');
            item.textContent = cliente.nombre;
            item.classList.add("cursor-pointer", "p-2", "hover:bg-gray-200");
            
            // Evento de clic en una sugerencia
            item.addEventListener('click', () => {
                searchInput.value = cliente.nombre;
                suggestionsList.style.display = 'none';

                clientNameSpan.textContent = cliente.nombre;
                clientEmailSpan.textContent = cliente.email;
                clientMembershipSpan.textContent = cliente.membresia;
                clientInfoDiv.classList.remove('hidden');
            });

            suggestionsList.appendChild(item);
        });
    });

    // Ocultar la lista si se hace clic fuera
    document.addEventListener('click', (e) => {
        if (!searchInput.contains(e.target) && !suggestionsList.contains(e.target)) {
            suggestionsList.style.display = 'none';
        }
    });
});

// Funciones para abrir y cerrar modales
function openModal(modalId) {
    document.getElementById(modalId).classList.remove("hidden");
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add("hidden");
}
</script>

@endsection
