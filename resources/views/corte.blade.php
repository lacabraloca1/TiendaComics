@extends('layouts.blaze')

@section('title', 'Corte de Caja - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">💰 Corte de Caja</h2>
</div>

<!-- Tabla de Corte de Caja -->
<div class="mt-5">
    <table class="w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">NO.</th>
                <th class="p-3">Empleado</th>
                <th class="p-3">Fecha</th>
                <th class="p-3">Hora</th>
                <th class="p-3">Monto Inicial</th>
                <th class="p-3">Monto Final</th>
                <th class="p-3">Tipo de Corte</th>
                <th class="p-3">Total en Caja</th>
            </tr>
        </thead>
        <tbody id="corteCajaBody">
            <!-- Aquí se llenarán los datos dinámicamente -->
        </tbody>
    </table>
</div>

<!-- Botón para realizar el corte de caja -->
<div class="mt-5 flex justify-center">
    <button class="bg-blue-600 text-white px-6 py-3 rounded-md text-lg" onclick="openModal('modalCorteCaja')">📊 Generar Informe</button>
    <button class="ml-3 bg-red-600 text-white px-6 py-3 rounded-md text-lg" onclick="openModal('modalCerrarCaja')">🔒 Cerrar Caja</button>
</div>

<!-- Modal: Generar Informe de Corte -->
<div id="modalCorteCaja" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Generar Informe de Corte</h2>

        <label class="block text-gray-700 font-medium">Empleado</label>
        <input type="text" id="empleado" placeholder="Nombre del empleado" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Fecha</label>
        <input type="date" id="fechaCorte" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Hora</label>
        <input type="time" id="horaCorte" class="w-full p-2 border rounded mb-3">

        <label class="block text-gray-700 font-medium">Monto Inicial</label>
        <input type="number" id="montoInicial" class="w-full p-2 border rounded mb-3" value="1000">

        <label class="block text-gray-700 font-medium">Monto Final</label>
        <input type="number" id="montoFinal" class="w-full p-2 border rounded mb-3" readonly>

        <label class="block text-gray-700 font-medium">Tipo de Corte</label>
        <select id="tipoCorte" class="w-full p-2 border rounded mb-3">
            <option value="informe">Informe sin cerrar caja</option>
            <option value="cierre">Cierre definitivo</option>
        </select>

        <label class="block text-gray-700 font-medium">Total en Caja</label>
        <input type="number" id="totalCaja" class="w-full p-2 border rounded mb-3" readonly>

        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalCorteCaja')">Cancelar</button>
            <button class="bg-green-600 text-white px-3 py-1 rounded" onclick="guardarCorteCaja()">📊 Guardar Informe</button>
        </div>
    </div>
</div>

<!-- Modal: Confirmar Cierre de Caja -->
<div id="modalCerrarCaja" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Confirmar Cierre de Caja</h2>
        <p>¿Estás seguro de que deseas cerrar la caja?</p>
        <div class="flex justify-end gap-2 mt-4">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalCerrarCaja')">Cancelar</button>
            <button class="bg-red-600 text-white px-3 py-1 rounded">🔒 Cerrar</button>
        </div>
    </div>
</div>

<!-- JavaScript para calcular y agregar cortes de caja -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    calcularMontoFinal();
});

function calcularMontoFinal() {
    let montoInicial = parseFloat(document.getElementById('montoInicial').value);
    let ventasDelDia = Math.floor(Math.random() * 5000) + 1000; // Simulación de ventas

    let montoFinal = montoInicial + ventasDelDia;
    document.getElementById('montoFinal').value = montoFinal;
    document.getElementById('totalCaja').value = montoFinal;
}

function guardarCorteCaja() {
    let empleado = document.getElementById('empleado').value;
    let fecha = document.getElementById('fechaCorte').value;
    let hora = document.getElementById('horaCorte').value;
    let montoInicial = document.getElementById('montoInicial').value;
    let montoFinal = document.getElementById('montoFinal').value;
    let tipoCorte = document.getElementById('tipoCorte').value;
    let totalCaja = document.getElementById('totalCaja').value;

    if (!empleado || !fecha || !hora) {
        alert("Por favor completa todos los campos.");
        return;
    }

    let tabla = document.getElementById('corteCajaBody');
    let newRow = document.createElement('tr');
    newRow.classList.add("bg-gray-900", "text-center");

    newRow.innerHTML = `
        <td class="p-3">${tabla.children.length + 1}</td>
        <td class="p-3">${empleado}</td>
        <td class="p-3">${fecha}</td>
        <td class="p-3">${hora}</td>
        <td class="p-3">$${montoInicial}</td>
        <td class="p-3">$${montoFinal}</td>
        <td class="p-3">${tipoCorte === "informe" ? "Informe" : "Cierre"}</td>
        <td class="p-3">$${totalCaja}</td>
    `;

    tabla.appendChild(newRow);
    closeModal('modalCorteCaja');
}

function openModal(modalId) {
    document.getElementById(modalId).classList.remove("hidden");
    if (modalId === "modalCorteCaja") {
        calcularMontoFinal();
    }
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add("hidden");
}
</script>

@endsection
