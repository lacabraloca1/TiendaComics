@extends('layouts.blaze')

@section('title', 'Devoluciones - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">🔄 Devoluciones</h2>
</div>

<!-- Tabla de Devoluciones -->
<div class="mt-5">
    <table class="w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">FOLIO</th>
                <th class="p-3">CLIENTE</th>
                <th class="p-3">PRODUCTO</th>
                <th class="p-3">MOTIVO</th>
                <th class="p-3">ESTADO</th>
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-900 text-center">
                <td class="p-3">001</td>
                <td class="p-3">Juan Pérez</td>
                <td class="p-3">Cómic Batman #1</td>
                <td class="p-3">Defecto en impresión</td>
                <td class="p-3 text-yellow-400">Pendiente</td>
                <td class="p-3">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded" onclick="openModal('modalProcesar')">✔ Procesar</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded" onclick="openModal('modalRechazar')">❌ Rechazar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- MODALS -->
<div id="modalProcesar" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Procesar Devolución</h2>
        <p>¿Deseas aprobar esta devolución?</p>
        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalProcesar')">Cancelar</button>
            <button class="bg-green-600 text-white px-3 py-1 rounded">✔ Aprobar</button>
        </div>
    </div>
</div>

<div id="modalRechazar" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Rechazar Devolución</h2>
        <p>¿Estás seguro de que deseas rechazar esta devolución?</p>
        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalRechazar')">Cancelar</button>
            <button class="bg-red-600 text-white px-3 py-1 rounded">❌ Rechazar</button>
        </div>
    </div>
</div>

<script>
    function openModal(modalId) { document.getElementById(modalId).classList.remove("hidden"); }
    function closeModal(modalId) { document.getElementById(modalId).classList.add("hidden"); }
</script>
@endsection
