@extends('layouts.blaze')

@section('title', 'Notificaciones - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">🔔 Notificaciones de Stock</h2>
</div>

<!-- Tabla de Productos con Bajo Stock -->
<div class="mt-5">
    <table class="w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">ID</th>
                <th class="p-3">PRODUCTO</th>
                <th class="p-3">CANTIDAD DISPONIBLE</th>
                <th class="p-3">ESTADO</th>
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody id="productosTabla">
            <tr class="bg-gray-900 text-center">
                <td class="p-3">1</td>
                <td class="p-3">Cómic Spiderman #25</td>
                <td class="p-3 text-red-400">2 unidades</td>
                <td class="p-3 text-yellow-400">Stock Bajo</td>
                <td class="p-3">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded" onclick="marcarRevisado(this)">✔ Marcar como Revisado</button>
                </td>
            </tr>
            <tr class="bg-gray-900 text-center">
                <td class="p-3">2</td>
                <td class="p-3">Cómic Batman #10</td>
                <td class="p-3 text-red-400">1 unidad</td>
                <td class="p-3 text-yellow-400">Stock Bajo</td>
                <td class="p-3">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded" onclick="marcarRevisado(this)">✔ Marcar como Revisado</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    function marcarRevisado(button) {
        let row = button.parentNode.parentNode;
        row.querySelector("td:nth-child(4)").innerHTML = `<span class="text-green-400">✔ Revisado</span>`;
        button.remove();
    }
</script>

@endsection
