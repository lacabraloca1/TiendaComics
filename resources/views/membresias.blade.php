@extends('layouts.blaze')

@section('title', 'Membresías - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">🎫 Membresías</h2>

    <div class="flex gap-4">
        <button class="bg-black text-white px-4 py-2 rounded-md" onclick="openModal('modalNuevoCliente')">➕ Nuevo Cliente</button>
        <button class="bg-red-600 text-white px-4 py-2 rounded-md" onclick="openModal('modalEliminarMembresia')">❌ Eliminar</button>
        <button class="bg-green-600 text-white px-4 py-2 rounded-md" onclick="openModal('modalGuardarMembresia')">💾 Guardar</button>
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
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-900 text-center">
                <td class="p-3">1</td>
                <td class="p-3">CRISTIANO</td>
                <td class="p-3">RONALDO</td>
                <td class="p-3">CR7@GMAIL.COM</td>
                <td class="p-3">BÁSICA</td>
                <td class="p-3">$500</td>
                <td class="p-3">01/01/2025</td>
                <td class="p-3">02/02/2025</td>
                <td class="p-3">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded" onclick="openModal('modalEditarCliente')">✏️ Editar</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded" onclick="openModal('modalEliminarMembresia')">❌ Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- ======================== MODALS ======================== -->

<!-- Modal: Nuevo Cliente -->
<div id="modalNuevoCliente" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Registrar Nuevo Cliente</h2>

        <label class="block text-gray-700 font-medium">Nombre</label>
        <input type="text" placeholder="Ingrese el nombre" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Apellido</label>
        <input type="text" placeholder="Ingrese el apellido" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Correo Electrónico</label>
        <input type="email" placeholder="Ingrese el correo" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Tipo de Membresía</label>
        <select class="w-full p-2 border rounded mb-3">
            <option>Básica</option>
            <option>Premium</option>
            <option>VIP</option>
        </select>

        <label class="block text-gray-700 font-medium">Monto</label>
        <input type="number" placeholder="Ingrese el monto" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Fecha Inicial</label>
        <input type="date" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Fecha Final</label>
        <input type="date" class="w-full p-2 border rounded mb-3">

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalNuevoCliente')">Cancelar</button>
            <button class="bg-green-600 text-white px-3 py-1 rounded">Registrar</button>
        </div>
    </div>
</div>

<!-- Modal: Editar Cliente -->
<div id="modalEditarCliente" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Editar Cliente</h2>

        <label class="block text-gray-700 font-medium">Nombre</label>
        <input type="text" value="CRISTIANO" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Apellido</label>
        <input type="text" value="RONALDO" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Correo Electrónico</label>
        <input type="email" value="CR7@GMAIL.COM" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Tipo de Membresía</label>
        <select class="w-full p-2 border rounded mb-3">
            <option selected>Básica</option>
            <option>Premium</option>
            <option>VIP</option>
        </select>

        <label class="block text-gray-700 font-medium">Monto</label>
        <input type="number" value="500" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Fecha Inicial</label>
        <input type="date" value="2025-01-01" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Fecha Final</label>
        <input type="date" value="2025-02-02" class="w-full p-2 border rounded mb-3">

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalEditarCliente')">Cancelar</button>
            <button class="bg-yellow-500 text-white px-3 py-1 rounded">Guardar</button>
        </div>
    </div>
</div>

<!-- Modal: Eliminar Membresía -->
<div id="modalEliminarMembresia" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">¿Eliminar esta Membresía?</h2>
        <p>Esta acción no se puede deshacer.</p>

        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalEliminarMembresia')">Cancelar</button>
            <button class="bg-red-600 text-white px-3 py-1 rounded">Eliminar</button>
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
