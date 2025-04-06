@extends('layouts.blaze')

@section('title', 'Proveedores - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">📦 Proveedores</h2>

    <div class="flex gap-4">
        <button class="bg-yellow-500 text-black px-4 py-2 rounded-md" onclick="openModal('modalNuevoProveedor')">➕ Nuevo Proveedor</button>
        <button class="bg-red-600 text-white px-4 py-2 rounded-md" onclick="openModal('modalEliminarProveedor')">❌ Eliminar</button>
        <button class="bg-blue-600 text-white px-4 py-2 rounded-md" onclick="openModal('modalEditarProveedor')">✏️ Modificar</button>
    </div>
</div>

<!-- Tabla de Proveedores -->
<div class="mt-5">
    <table class="w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">NUM</th>
                <th class="p-3">DESCRIPCIÓN</th>
                <th class="p-3">MARCA</th>
                <th class="p-3">TELÉFONO</th>
                <th class="p-3">CORREO</th>
                <th class="p-3">SITIO WEB</th>
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-900 text-center">
                <td class="p-3">1</td>
                <td class="p-3">TRAILER ROJO</td>
                <td class="p-3">THE PLANET CÓMIC</td>
                <td class="p-3">+56414145841</td>
                <td class="p-3">PROVEEDOR1@GMAIL.COM</td>
                <td class="p-3"><a href="https://www.comicsuniverse.com.mx" class="text-blue-400">COMICS UNIVERSE</a></td>
                <td class="p-3">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded" onclick="openModal('modalEditarProveedor')">✏️ Editar</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded" onclick="openModal('modalEliminarProveedor')">❌ Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- ======================== MODALS ======================== -->

<!-- Modal: Nuevo Proveedor -->
<div id="modalNuevoProveedor" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Registrar Nuevo Proveedor</h2>

        <label class="block text-gray-700 font-medium">Descripción</label>
        <input type="text" placeholder="Ejemplo: Cómics de Marvel" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Marca</label>
        <input type="text" placeholder="Ejemplo: Marvel Comics" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Teléfono</label>
        <input type="tel" placeholder="Ingrese el teléfono" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Correo</label>
        <input type="email" placeholder="Ingrese el correo del proveedor" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Sitio Web</label>
        <input type="url" placeholder="Ingrese la página web" class="w-full p-2 border rounded mb-3">

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalNuevoProveedor')">Cancelar</button>
            <button class="bg-green-600 text-white px-3 py-1 rounded">Registrar</button>
        </div>
    </div>
</div>

<!-- Modal: Editar Proveedor -->
<div id="modalEditarProveedor" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Editar Proveedor</h2>

        <label class="block text-gray-700 font-medium">Descripción</label>
        <input type="text" value="TRAILER ROJO" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Marca</label>
        <input type="text" value="THE PLANET CÓMIC" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Teléfono</label>
        <input type="tel" value="+56414145841" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Correo</label>
        <input type="email" value="PROVEEDOR1@GMAIL.COM" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Sitio Web</label>
        <input type="url" value="https://www.comicsuniverse.com.mx" class="w-full p-2 border rounded mb-3">

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalEditarProveedor')">Cancelar</button>
            <button class="bg-yellow-500 text-white px-3 py-1 rounded">Guardar</button>
        </div>
    </div>
</div>

<!-- Modal: Eliminar Proveedor -->
<div id="modalEliminarProveedor" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">¿Eliminar este Proveedor?</h2>
        <p>Esta acción no se puede deshacer.</p>

        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalEliminarProveedor')">Cancelar</button>
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
