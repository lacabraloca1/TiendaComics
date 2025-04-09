@extends('layouts.blaze')

@section('title', 'Reportes - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">📊 Generación de Reportes</h2>
</div>

<!-- Barra de búsqueda -->
<div class="relative text-center my-6">
    <input type="text" placeholder="🔍 Buscar reportes..." class="p-3 w-1/3 bg-gray-200 text-black rounded-full text-center"/>
</div>

<!-- Contenido de los Reportes -->
<div class="flex justify-center gap-10">
    <!-- Reporte Clientes -->
    <div class="bg-gray-800 p-6 rounded-md w-72 text-center shadow-md">
        <h2 class="text-xl font-bold">📋 Reporte Clientes</h2>
        <div class="mt-3">
            <input type="text" placeholder="Código de Barras" class="block w-full mb-3 p-2 bg-gray-700 text-white rounded-md"/>
            <input type="text" placeholder="Descripción" class="block w-full mb-3 p-2 bg-gray-700 text-white rounded-md"/>
            <input type="text" placeholder="Cantidad" class="block w-full mb-3 p-2 bg-gray-700 text-white rounded-md"/>
            <input type="text" placeholder="Precio" class="block w-full mb-3 p-2 bg-gray-700 text-white rounded-md"/>
            <input type="text" placeholder="Precio-proveedor" class="block w-full mb-3 p-2 bg-gray-700 text-white rounded-md"/>
        </div>
        <button class="bg-green-500 text-white px-6 py-2 mt-3 rounded-md w-full" onclick="openModal('modalConfirmarReporte', 'Reporte de Clientes')">📊 Generar Reporte</button>
    </div>

    <!-- Reporte Productos -->
    <div class="bg-gray-800 p-6 rounded-md w-72 text-center shadow-md">
        <h2 class="text-xl font-bold">📦 Reporte Productos</h2>
        <div class="mt-3">
            <input type="text" placeholder="Código de Barras" class="block w-full mb-3 p-2 bg-gray-700 text-white rounded-md"/>
            <input type="text" placeholder="Descripción" class="block w-full mb-3 p-2 bg-gray-700 text-white rounded-md"/>
            <input type="text" placeholder="Cantidad" class="block w-full mb-3 p-2 bg-gray-700 text-white rounded-md"/>
            <input type="text" placeholder="Precio" class="block w-full mb-3 p-2 bg-gray-700 text-white rounded-md"/>
            <input type="text" placeholder="Precio-proveedor" class="block w-full mb-3 p-2 bg-gray-700 text-white rounded-md"/>
        </div>
        <button class="bg-green-500 text-white px-6 py-2 mt-3 rounded-md w-full" onclick="openModal('modalConfirmarReporte', 'Reporte de Productos')">📊 Generar Reporte</button>
    </div>
</div>

<!-- ======================== MODALS ======================== -->

<!-- Modal: Confirmar Generación de Reporte -->
<div id="modalConfirmarReporte" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Confirmar Generación de Reporte</h2>
        <p id="nombreReporte" class="text-lg text-gray-700">¿Deseas generar el reporte?</p>

        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalConfirmarReporte')">Cancelar</button>
            <button class="bg-green-600 text-white px-3 py-1 rounded">📊 Generar</button>
        </div>
    </div>
</div>

<!-- ======================== SCRIPTS ======================== -->
<script>
    function openModal(modalId, nombreReporte = '') {
        document.getElementById(modalId).classList.remove("hidden");

        if (nombreReporte) {
            document.getElementById("nombreReporte").textContent = "¿Deseas generar el " + nombreReporte + "?";
        }
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add("hidden");
    }
</script>

@endsection
