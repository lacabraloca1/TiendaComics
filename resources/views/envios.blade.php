@extends('layouts.blaze')

@section('title', 'Envíos - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">📦 Envíos</h2>
    
    <!-- Botón para agregar nuevo envío -->
    <button onclick="openModal('modalNuevoEnvio')"
        class="flex items-center bg-blue-600 text-white px-4 py-2 rounded-md shadow-lg hover:bg-blue-700 transition">
        <span class="text-xl mr-2">➕</span> Nuevo Envío
    </button>
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
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-900 text-center">
                <td class="p-3">1</td>
                <td class="p-3">04/05/2025</td>
                <td class="p-3">445877</td>
                <td class="p-3">ARTEMIO</td>
                <td class="p-3">SALIDA CANCÚN 15, #5844 QUERÉTARO</td>
                <td class="p-3 text-yellow-400 font-bold">EN PROCESO</td>
                <td class="p-3">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded" onclick="openModal('modalEditarEnvio')">✏️ Editar</button>
                    <button class="bg-green-500 text-white px-3 py-1 rounded" onclick="openModal('modalActualizarEstado')">🔄 Estado</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded" onclick="openModal('modalEliminarEnvio')">❌ Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- ======================== MODALS ======================== -->

<!-- Modal: Nuevo Envío -->
<div id="modalNuevoEnvio" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Registrar Envío</h2>

        <label class="block text-gray-700 font-medium">Cliente</label>
        <input type="text" placeholder="Nombre del Cliente" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Dirección</label>
        <input type="text" placeholder="Dirección completa" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Fecha y Hora</label>
        <input type="datetime-local" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Estado</label>
        <select class="w-full p-2 border rounded mb-3">
            <option>En Proceso</option>
            <option>En Camino</option>
            <option>Entregado</option>
        </select>

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalNuevoEnvio')">Cancelar</button>
            <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Registrar</button>
        </div>
    </div>
</div>

<!-- Modal: Editar Envío -->
<div id="modalEditarEnvio" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Editar Envío</h2>

        <label class="block text-gray-700 font-medium">Cliente</label>
        <input type="text" value="ARTEMIO" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Dirección</label>
        <input type="text" value="SALIDA CANCÚN 15, #5844 QUERÉTARO" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Fecha y Hora</label>
        <input type="datetime-local" value="2025-05-04T12:00" class="w-full p-2 border rounded mb-3">

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalEditarEnvio')">Cancelar</button>
            <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Guardar</button>
        </div>
    </div>
</div>

<!-- Modal: Actualizar Estado -->
<div id="modalActualizarEstado" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Actualizar Estado</h2>

        <label class="block text-gray-700 font-medium">Nuevo Estado</label>
        <select class="w-full p-2 border rounded mb-3">
            <option>En Proceso</option>
            <option>En Camino</option>
            <option>Entregado</option>
        </select>

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalActualizarEstado')">Cancelar</button>
            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Actualizar</button>
        </div>
    </div>
</div>

<!-- Modal: Eliminar Envío -->
<div id="modalEliminarEnvio" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">¿Eliminar este envío?</h2>
        <p>Esta acción no se puede deshacer.</p>

        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalEliminarEnvio')">Cancelar</button>
            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Sí, Eliminar</button>
        </div>
    </div>
</div>

<!-- ======================== SCRIPTS ======================== -->
<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove("hidden");
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add("hidden");
    }
</script>

@endsection
