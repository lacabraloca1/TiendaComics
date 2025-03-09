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
                <th class="p-3">CLIENTE</th>
                <th class="p-3">PRODUCTO</th>
                <th class="p-3">MOTIVO</th>
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-900 text-center">
                <td class="p-3">Juan Pérez</td>
                <td class="p-3">Cómic Batman #1</td>
                <td class="p-3">Defecto en impresión</td>
                <td class="p-3">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded" onclick="openDevolucionModal('Juan Pérez', 'Cómic Batman #1', 'Defecto en impresión')">👁️ Ver</button>
                    <button class="bg-green-600 text-white px-3 py-1 rounded" onclick="openModal('modalProcesar')">✔ Procesar</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded" onclick="openModal('modalRechazar')">❌ Rechazar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- ======================== MODALS ======================== -->

<!-- Modal: Detalles de Devolución -->
<div id="modalVerDevolucion" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Detalles de Devolución</h2>

        <p><strong>Cliente:</strong> <span id="devolucion-cliente"></span></p>
        <p><strong>Producto:</strong> <span id="devolucion-producto"></span></p>
        <p><strong>Motivo:</strong> <span id="devolucion-motivo"></span></p>

        <h3 class="text-lg font-bold mt-4">Ticket de Devolución</h3>
        <ul class="list-disc pl-5">
            <li>Producto Devuelto: <span id="ticket-producto"></span></li>
            <li>Cliente: <span id="ticket-cliente"></span></li>
            <li>Fecha: <span id="ticket-fecha"></span></li>
        </ul>

        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalVerDevolucion')">Cerrar</button>
            <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="imprimirTicket()">🖨️ Imprimir</button>
        </div>
    </div>
</div>

<!-- Modal: Procesar Devolución -->
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

<!-- Modal: Rechazar Devolución -->
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

<!-- ======================== SCRIPTS ======================== -->
<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove("hidden");
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add("hidden");
    }

    function openDevolucionModal(cliente, producto, motivo) {
        document.getElementById('devolucion-cliente').textContent = cliente;
        document.getElementById('devolucion-producto').textContent = producto;
        document.getElementById('devolucion-motivo').textContent = motivo;

        // Generar detalles del ticket de devolución
        document.getElementById('ticket-producto').textContent = producto;
        document.getElementById('ticket-cliente').textContent = cliente;
        document.getElementById('ticket-fecha').textContent = new Date().toLocaleDateString();

        openModal('modalVerDevolucion');
    }

    function imprimirTicket() {
        let cliente = document.getElementById('ticket-cliente').textContent;
        let producto = document.getElementById('ticket-producto').textContent;
        let fecha = document.getElementById('ticket-fecha').textContent;

        let contenidoTicket = `
            ***** TICKET DE DEVOLUCIÓN *****
            Cliente: ${cliente}
            Producto Devuelto: ${producto}
            Fecha: ${fecha}
            *******************************
        `;

        let ventana = window.open('', '_blank');
        ventana.document.write(`<pre>${contenidoTicket}</pre>`);
        ventana.document.close();
        ventana.print();
    }
</script>

@endsection
