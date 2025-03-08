@extends('layouts.blaze')

@section('title', 'Inventario - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">📦 Inventario</h2>

    <!-- Barra de búsqueda -->
    <div class="relative">
        <input type="text" placeholder="Buscar producto" class="p-2 bg-gray-700 text-white rounded-md pl-8"/>
        <span class="absolute left-2 top-2 text-gray-400">🔍</span>
    </div>
</div>

<!-- Tabla de Inventario -->
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
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-900 text-center">
                <td class="p-3">1</td>
                <td class="p-3">123456789</td>
                <td class="p-3">Producto Ejemplo</td>
                <td class="p-3">50</td>
                <td class="p-3">$100</td>
                <td class="p-3">$80</td>
                <td class="p-3">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded" onclick="openModal('modalEditarProducto')">✏️ Editar</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded" onclick="openModal('modalEliminarProducto')">❌ Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Botones de Acción -->
<div class="mt-5 flex justify-between">
    <button class="bg-yellow-500 text-black p-2 rounded-md" onclick="openModal('modalDescuentos')">📉 Descuentos</button>
    <button class="bg-blue-600 text-white p-2 rounded-md" onclick="openModal('modalDevolucion')">🔄 Devolución</button>
    <button class="bg-green-600 text-white p-2 rounded-md" onclick="openModal('modalNuevoProducto')">➕ Nuevo producto</button>
</div>

<!-- ======================== MODALS ======================== -->

<!-- Modal: Nuevo Producto -->
<div id="modalNuevoProducto" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Agregar Producto</h2>

        <label class="block text-gray-700 font-medium">Código de Barras</label>
        <input type="text" placeholder="Ingrese el código de barras" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Descripción</label>
        <input type="text" placeholder="Nombre del producto" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Cantidad</label>
        <input type="number" placeholder="Cantidad disponible" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Precio</label>
        <input type="number" placeholder="Precio de venta" class="w-full p-2 border rounded mb-3">

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalNuevoProducto')">Cancelar</button>
            <button class="bg-green-600 text-white px-3 py-1 rounded">Agregar</button>
        </div>
    </div>
</div>

<!-- Modal: Editar Producto -->
<div id="modalEditarProducto" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Editar Producto</h2>

        <label class="block text-gray-700 font-medium">Código de Barras</label>
        <input type="text" value="123456789" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Descripción</label>
        <input type="text" value="Producto Ejemplo" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Cantidad</label>
        <input type="number" value="50" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Precio</label>
        <input type="number" value="100" class="w-full p-2 border rounded mb-3">

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalEditarProducto')">Cancelar</button>
            <button class="bg-yellow-500 text-white px-3 py-1 rounded">Guardar</button>
        </div>
    </div>
</div>

<!-- Modal: Eliminar Producto -->
<div id="modalEliminarProducto" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">¿Eliminar este producto?</h2>
        <p>Esta acción no se puede deshacer.</p>

        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalEliminarProducto')">Cancelar</button>
            <button class="bg-red-600 text-white px-3 py-1 rounded">Eliminar</button>
        </div>
    </div>
</div>

<!-- Modal: Aplicar Descuento -->
<div id="modalDescuentos" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Aplicar Descuento</h2>
        <label class="block text-gray-700 font-medium">Porcentaje de Descuento</label>
        <input type="number" placeholder="Ej: 10%" class="w-full p-2 border rounded mb-3">

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalDescuentos')">Cancelar</button>
            <button class="bg-yellow-500 text-white px-3 py-1 rounded">Aplicar</button>
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
