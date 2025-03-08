@extends('layouts.blaze')

@section('title', 'Historial de Ventas - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">📜 Historial de Ventas</h2>
</div>

<!-- Tabla de Historial de Ventas -->
<div class="mt-5">
    <table class="w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">NO.</th>
                <th class="p-3">FECHA Y HORA</th>
                <th class="p-3">FOLIO</th>
                <th class="p-3">CLIENTE</th>
                <th class="p-3">TOTAL</th>
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-900 text-center">
                <td class="p-3">1</td>
                <td class="p-3">04/05/2025</td>
                <td class="p-3">445877</td>
                <td class="p-3">ARTEMIO</td>
                <td class="p-3">$4000</td>
                <td class="p-3">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded" onclick="openModal('modalVerVenta')">👁️ Ver</button>
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded" onclick="openModal('modalReimprimirTicket')">🖨️ Reimprimir</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded" onclick="openModal('modalCancelarVenta')">❌ Cancelar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- ======================== MODALS ======================== -->

<!-- Modal: Ver Detalles de Venta -->
<div id="modalVerVenta" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Detalles de Venta</h2>

        <p><strong>Folio:</strong> 445877</p>
        <p><strong>Cliente:</strong> Artemio</p>
        <p><strong>Fecha y Hora:</strong> 04/05/2025</p>
        <p><strong>Total:</strong> $4000</p>

        <h3 class="text-lg font-bold mt-4">Productos:</h3>
        <ul class="list-disc pl-5">
            <li>Producto 1 - $2000</li>
            <li>Producto 2 - $1500</li>
            <li>Producto 3 - $500</li>
        </ul>

        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalVerVenta')">Cerrar</button>
        </div>
    </div>
</div>

<!-- Modal: Reimprimir Ticket -->
<div id="modalReimprimirTicket" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Reimprimir Ticket</h2>
        <p>¿Deseas reimprimir el ticket con folio <strong>445877</strong>?</p>

        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalReimprimirTicket')">Cancelar</button>
            <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">🖨️ Reimprimir</button>
        </div>
    </div>
</div>

<!-- Modal: Cancelar Venta -->
<div id="modalCancelarVenta" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">¿Cancelar esta venta?</h2>
        <p>Esta acción no se puede deshacer.</p>

        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalCancelarVenta')">No</button>
            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Sí, Cancelar</button>
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
