@extends('layouts.blaze')

@section('title', 'Modificar Clientes - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">👥 Modificar Clientes</h2>

    <div class="flex gap-4">
        <button class="bg-black text-white px-4 py-2 rounded-md" onclick="openModal('modalNuevoCliente')">➕ Nuevo Cliente</button>
        <button class="bg-red-600 text-white px-4 py-2 rounded-md" onclick="openModal('modalEliminarCliente')">❌ Eliminar</button>
        <button class="bg-green-600 text-white px-4 py-2 rounded-md" onclick="openModal('modalGuardarCliente')">💾 Guardar</button>
    </div>
</div>

<!-- Tabla de Clientes -->
<div class="mt-5">
    <table class="w-full border-collapse bg-gray-800 text-white">
        <tbody>
            <tr class="bg-gray-900 text-center">
                <td class="p-3 font-bold">FOLIO</td>
                <td class="p-3">2</td>
            </tr>
            <tr class="bg-gray-900 text-center">
                <td class="p-3 font-bold">NOMBRES</td>
                <td class="p-3">CRISTIANO</td>
            </tr>
            <tr class="bg-gray-900 text-center">
                <td class="p-3 font-bold">APELLIDOS</td>
                <td class="p-3">RONALDO</td>
            </tr>
            <tr class="bg-gray-900 text-center">
                <td class="p-3 font-bold">TELÉFONO</td>
                <td class="p-3">+52 4424762897</td>
            </tr>
            <tr class="bg-gray-900 text-center">
                <td class="p-3 font-bold">EMAIL</td>
                <td class="p-3">CR7@GMAIL.COM</td>
            </tr>
            <tr class="bg-gray-900 text-center">
                <td class="p-3 font-bold">DOMICILIO</td>
                <td class="p-3"></td>
            </tr>
            <tr class="bg-gray-900 text-center">
                <td class="p-3 font-bold">COLONIA</td>
                <td class="p-3"></td>
            </tr>
            <tr class="bg-gray-900 text-center">
                <td class="p-3 font-bold">ESTADO</td>
                <td class="p-3"></td>
            </tr>
            <tr class="bg-gray-900 text-center">
                <td class="p-3 font-bold">CÓDIGO POSTAL</td>
                <td class="p-3"></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Sección de Comentarios -->
<div class="mt-5">
    <h3 class="text-xl font-bold">📝 Comentarios:</h3>
    <textarea class="w-full mt-3 p-2 bg-gray-700 text-white rounded-md"></textarea>
    <button class="bg-green-600 text-white px-6 py-2 mt-3 rounded-md">💾 Guardar</button>
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

        <label class="block text-gray-700 font-medium">Teléfono</label>
        <input type="tel" placeholder="Ingrese el teléfono" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Correo Electrónico</label>
        <input type="email" placeholder="Ingrese el correo" class="w-full p-2 border rounded mb-3">

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

        <label class="block text-gray-700 font-medium">Teléfono</label>
        <input type="tel" value="+52 4424762897" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Correo Electrónico</label>
        <input type="email" value="CR7@GMAIL.COM" class="w-full p-2 border rounded mb-3">

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalEditarCliente')">Cancelar</button>
            <button class="bg-yellow-500 text-white px-3 py-1 rounded">Guardar</button>
        </div>
    </div>
</div>

<!-- Modal: Eliminar Cliente -->
<div id="modalEliminarCliente" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">¿Eliminar este Cliente?</h2>
        <p>Esta acción no se puede deshacer.</p>

        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalEliminarCliente')">Cancelar</button>
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
