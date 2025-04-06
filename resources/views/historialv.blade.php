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
                    <button class="bg-blue-500 text-white px-3 py-1 rounded" onclick="openVentaModal('445877', 'ARTEMIO', '04/05/2025', '$4000', 'Juan Pérez', [
                        {nombre: 'Producto 1', precio: '$2000'},
                        {nombre: 'Producto 2', precio: '$1500'},
                        {nombre: 'Producto 3', precio: '$500'}
                    ])">👁️ Ver</button>
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

        <p><strong>Folio:</strong> <span id="venta-folio"></span></p>
        <p><strong>Cliente:</strong> <span id="venta-cliente"></span></p>
        <p><strong>Fecha y Hora:</strong> <span id="venta-fecha"></span></p>
        <p><strong>Total:</strong> <span id="venta-total"></span></p>
        <p><strong>Empleado:</strong> <span id="venta-empleado"></span></p>

        <h3 class="text-lg font-bold mt-4">Productos:</h3>
        <ul id="venta-productos" class="list-disc pl-5"></ul>

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

    function openVentaModal(folio, cliente, fecha, total, empleado, productos) {
        document.getElementById('venta-folio').textContent = folio;
        document.getElementById('venta-cliente').textContent = cliente;
        document.getElementById('venta-fecha').textContent = fecha;
        document.getElementById('venta-total').textContent = total;
        document.getElementById('venta-empleado').textContent = empleado;

        let productosLista = document.getElementById('venta-productos');
        productosLista.innerHTML = ''; // Limpiar lista de productos

        productos.forEach(producto => {
            let item = document.createElement('li');
            item.textContent = `${producto.nombre} - ${producto.precio}`;
            productosLista.appendChild(item);
        });

        openModal('modalVerVenta');
    }
</script>

@endsection
