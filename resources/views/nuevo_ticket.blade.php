@extends('layouts.blaze')

@section('title', 'Nuevo Ticket - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">➕ Nuevo Ticket</h2>
</div>

<!-- Formulario de Nuevo Ticket -->
<div class="mt-5 bg-gray-800 p-6 rounded-md">
    <form action="#" method="POST">
        <label class="block text-gray-300 font-medium">Código de Barras</label>
        <input type="text" placeholder="Escanea o ingresa el código" class="w-full p-2 border rounded mb-3 bg-gray-700 text-white">

        <label class="block text-gray-300 font-medium">Cantidad</label>
        <input type="number" min="1" value="1" class="w-full p-2 border rounded mb-3 bg-gray-700 text-white">

        <label class="block text-gray-300 font-medium">Descripción</label>
        <input type="text" placeholder="Ejemplo: Cómic Spiderman" class="w-full p-2 border rounded mb-3 bg-gray-700 text-white">

        <label class="block text-gray-300 font-medium">Precio</label>
        <input type="text" placeholder="$0.00" class="w-full p-2 border rounded mb-3 bg-gray-700 text-white">

        <div class="flex justify-between mt-5">
            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="window.history.back()">⬅ Volver</button>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">📝 Guardar Ticket</button>
        </div>
    </form>
</div>

@endsection
