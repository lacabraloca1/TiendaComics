@extends('layouts.blaze')

@section('title', 'Corte de Caja - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold text-white">💰 Corte de Caja</h2>
</div>

@if(session('success'))
    <div class="bg-green-600 text-white p-4 rounded-md mb-4">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-600 text-white p-4 rounded-md mb-4">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Tabla del historial de cortes -->
<div class="mt-5 overflow-x-auto">
    <table class="min-w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">NO.</th>
                <th class="p-3">Empleado</th>
                <th class="p-3">Fecha</th>
                <th class="p-3">Hora</th>
                <th class="p-3">Dinero en Caja</th>
                <th class="p-3">Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cortes as $index => $corte)
            <tr class="bg-gray-900 text-center">
                <td class="p-3">{{ $index + 1 }}</td>
                <td class="p-3">{{ $corte->empleado->nombre ?? 'N/A' }}</td>
                <td class="p-3">{{ \Carbon\Carbon::parse($corte->fecha_creacion)->format('Y-m-d') }}</td>
                <td class="p-3">{{ \Carbon\Carbon::parse($corte->fecha_creacion)->format('H:i') }}</td>
                <td class="p-3">${{ number_format($corte->dinero_caja, 2) }}</td>
                <td class="p-3">{{ $corte->descripcion ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Botones para abrir los modales -->
<div class="mt-5 flex justify-center gap-3">
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md text-lg transition" 
            onclick="openModal('modalGenerarInforme')">📊 Generar Informe</button>
    <button class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-md text-lg transition" 
            onclick="openModal('modalCerrarCaja')">🔒 Cerrar Caja</button>
</div>

<!-- Modal: Generar Informe de Corte -->
<div id="modalGenerarInforme" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-white w-96">
        <h2 class="text-xl font-bold mb-4 text-blue-400">Generar Informe de Corte</h2>
        <p class="mb-3">El total de las ventas del día es: $<span id="informeTotalVentas">{{ number_format($totalVentas ?? 0, 2) }}</span></p>
        <div class="flex justify-end gap-2 mt-4">
            <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded transition" 
                    onclick="closeModal('modalGenerarInforme')">Cancelar</button>
            <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition" 
                    onclick="generarInforme()">Generar</button>
        </div>
    </div>
</div>

<!-- Modal: Cerrar Caja -->
<div id="modalCerrarCaja" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-white w-96">
        <h2 class="text-xl font-bold mb-4 text-red-400">Cerrar Caja</h2>
        <form id="cierreForm" method="POST" action="{{ route('corte.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block font-medium text-gray-300">Total Ventas del Día:</label>
                <input type="number" step="0.01" id="totalVentasInput" name="total_ventas" 
                       class="w-full p-2 mt-1 bg-gray-600 text-white rounded border border-gray-600"
                       value="{{ $totalVentas ?? 0 }}" readonly>
            </div>
            <div class="mb-4">
                <label class="block font-medium text-gray-300">Dinero en Caja:</label>
                <input type="number" step="0.01" id="totalCajaInput" name="dinero_caja" 
                       class="w-full p-2 mt-1 bg-gray-700 text-white rounded border border-gray-600"
                       placeholder="Ingrese el dinero en caja">
            </div>
            <div class="mb-4">
                <label class="block font-medium text-gray-300">Descripción:</label>
                <textarea id="descripcionInput" name="descripcion" 
                          class="w-full p-2 mt-1 bg-gray-700 text-white rounded border border-gray-600"
                          placeholder="Ingrese una descripción (opcional)"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded transition" 
                        onclick="closeModal('modalCerrarCaja')">Cancelar</button>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition">
                    Cerrar Caja</button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(modalId) {
    document.getElementById(modalId).classList.remove("hidden");
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add("hidden");
}

function generarInforme() {
    alert("Informe generado correctamente.");
    closeModal('modalGenerarInforme');
}

document.getElementById('cierreForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const dineroEnCaja = document.getElementById('totalCajaInput').value;
    
    if (!dineroEnCaja) {
        alert('Por favor ingrese el dinero en caja');
        return;
    }
    
    this.submit();
});
</script>
@endsection
