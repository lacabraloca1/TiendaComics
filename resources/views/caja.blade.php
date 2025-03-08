@extends('layouts.blaze')

@section('title', 'Caja - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between">
    <div>
        <h2 class="text-2xl font-bold">CAJA01</h2>
        <p>Artículos: 5</p>
    </div>
    <div>
        <p>Atiende: Nombre Ejemplo</p>
        <p>Fecha y hora: {{ now()->format('d/m/Y h:i:s A') }}</p>
    </div>
</div>

<!-- Buscador y botones -->
<div class="mt-5 flex items-center">
    <input type="text" placeholder="Buscar producto" class="p-2 w-full bg-gray-700 text-white rounded-md"/>
    <button class="ml-3 bg-gray-600 p-2 rounded">🔍</button>
    <input type="number" value="1" class="ml-3 p-2 w-20 bg-gray-700 text-white rounded-md text-center"/>
    <button class="ml-3 bg-blue-500 p-2 text-white rounded" onclick="openModal('modalAgregarProducto')">➕</button>

    <!-- Nuevo Ticket Mejorado -->
    <button onclick="openModal('modalNuevoTicket')"
        class="ml-5 flex items-center bg-purple-600 text-white px-4 py-2 rounded-md shadow-lg hover:bg-purple-700 transition">
        <span class="text-xl mr-2">➕</span> Nuevo Ticket
    </button>
</div>

<!-- Tabla de Venta -->
<div class="mt-5">
    <table class="w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">NO.</th>
                <th class="p-3">CÓDIGO DE BARRAS</th>
                <th class="p-3">DESCRIPCIÓN</th>
                <th class="p-3">CANTIDAD</th>
                <th class="p-3">PRECIO</th>
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-900 text-center">
                <td class="p-3">1</td>
                <td class="p-3">123456789</td>
                <td class="p-3">Producto Ejemplo</td>
                <td class="p-3">2</td>
                <td class="p-3">$200</td>
                <td class="p-3">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded" onclick="openModal('modalEditarProducto')">✏️ Editar</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded" onclick="openModal('modalCancelarVenta')">❌ Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Botones de Acción -->
<div class="mt-5 flex justify-between">
    <button class="bg-red-600 text-white p-2 rounded-md" onclick="openModal('modalCancelarVenta')">❌ Cancelar venta</button>
    <button class="bg-green-600 text-white p-2 rounded-md" onclick="openModal('modalPagar')">💵 Pagar</button>
</div>

<!-- ======================== MODALS ======================== -->

<!-- Modal: Agregar Producto -->
<div id="modalAgregarProducto" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Agregar Producto</h2>
        <input type="text" placeholder="Código de barras" class="w-full p-2 border rounded mb-3">
        <input type="text" placeholder="Descripción" class="w-full p-2 border rounded mb-3">
        <input type="number" placeholder="Cantidad" class="w-full p-2 border rounded mb-3">
        <input type="number" placeholder="Precio" class="w-full p-2 border rounded mb-3">
        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalAgregarProducto')">Cancelar</button>
            <button class="bg-blue-500 text-white px-3 py-1 rounded">Agregar</button>
        </div>
    </div>
</div>

<!-- Modal: Editar Producto -->
<div id="modalEditarProducto" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Editar Producto</h2>
        <input type="text" value="123456789" class="w-full p-2 border rounded mb-3">
        <input type="text" value="Producto Ejemplo" class="w-full p-2 border rounded mb-3">
        <input type="number" value="2" class="w-full p-2 border rounded mb-3">
        <input type="number" value="200" class="w-full p-2 border rounded mb-3">
        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalEditarProducto')">Cancelar</button>
            <button class="bg-yellow-500 text-white px-3 py-1 rounded">Guardar</button>
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
            <button class="bg-red-600 text-white px-3 py-1 rounded">Sí, Cancelar</button>
        </div>
    </div>
</div>

<!-- Modal: Pagar -->
<div id="modalPagar" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Finalizar Venta</h2>
        <p>Total a pagar: <span class="font-bold">$200</span></p>
        <input type="number" placeholder="Monto recibido" class="w-full p-2 border rounded mt-3">
        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalPagar')">Cancelar</button>
            <button class="bg-green-600 text-white px-3 py-1 rounded">💵 Pagar</button>
        </div>
    </div>
</div>
<!-- Modal: Nuevo Ticket -->
<div id="modalNuevoTicket" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Crear Nuevo Ticket</h2>
        
        <label class="block text-gray-700 font-medium">Cliente (Opcional)</label>
        <input type="text" placeholder="Nombre del Cliente" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Fecha</label>
        <input type="date" value="{{ now()->format('Y-m-d') }}" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Método de Pago</label>
        <select class="w-full p-2 border rounded mb-3">
            <option>Efectivo</option>
            <option>Tarjeta de Crédito</option>
            <option>Tarjeta de Débito</option>
            <option>Transferencia</option>
        </select>

        <label class="block text-gray-700 font-medium">Notas Adicionales</label>
        <textarea class="w-full p-2 border rounded mb-3" rows="3" placeholder="Agregar notas aquí..."></textarea>

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalNuevoTicket')">Cancelar</button>
            <button class="bg-purple-600 text-white px-3 py-1 rounded hover:bg-purple-700">Crear Ticket</button>
        </div>
    </div>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove("hidden");
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add("hidden");
    }
</script>

@endsection
