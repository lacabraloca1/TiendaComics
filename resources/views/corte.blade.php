@extends('layouts.blaze')

@section('title', 'Corte de Caja - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">💰 Corte de Caja</h2>
</div>

<div class="mt-5 flex justify-center">
    <button class="bg-red-600 text-white px-6 py-3 rounded-md text-lg" onclick="openModal('modalCerrarCaja')">🔒 Cerrar Caja</button>
</div>

<!-- MODALS -->
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

<script>
    function openModal(modalId) { document.getElementById(modalId).classList.remove("hidden"); }
    function closeModal(modalId) { document.getElementById(modalId).classList.add("hidden"); }
</script>
@endsection
