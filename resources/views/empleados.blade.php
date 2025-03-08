@extends('layouts.blaze')

@section('title', 'Empleados - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">👥 Empleados</h2>
    <button class="bg-green-500 text-white px-4 py-2 rounded-md" onclick="openModal('modalNuevoEmpleado')">➕ Agregar Empleado</button>
</div>

<!-- Tabla de Empleados -->
<div class="mt-5">
    <table class="w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">ID</th>
                <th class="p-3">NOMBRE</th>
                <th class="p-3">EMAIL</th>
                <th class="p-3">ROL</th>
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-900 text-center">
                <td class="p-3">1</td>
                <td class="p-3">Carlos Ramírez</td>
                <td class="p-3">carlos@comicstore.com</td>
                <td class="p-3 text-blue-400">Cajero</td>
                <td class="p-3">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded" onclick="openModal('modalEditarEmpleado')">✏️ Editar</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded" onclick="openModal('modalEliminarEmpleado')">❌ Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- MODALS -->
<div id="modalNuevoEmpleado" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-5 rounded shadow-lg text-black w-96">
        <h2 class="text-xl font-bold mb-4">Agregar Empleado</h2>
        <input type="text" placeholder="Nombre" class="w-full p-2 border rounded mb-3">
        <input type="email" placeholder="Email" class="w-full p-2 border rounded mb-3">
        <div class="flex justify-end gap-2">
            <button class="bg-gray-500 text-white px-3 py-1 rounded" onclick="closeModal('modalNuevoEmpleado')">Cancelar</button>
            <button class="bg-green-600 text-white px-3 py-1 rounded">Registrar</button>
        </div>
    </div>
</div>

<script>
    function openModal(modalId) { document.getElementById(modalId).classList.remove("hidden"); }
    function closeModal(modalId) { document.getElementById(modalId).classList.add("hidden"); }
</script>
@endsection
