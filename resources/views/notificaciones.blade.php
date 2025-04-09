@extends('layouts.blaze')

@section('title', 'Notificaciones - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">🔔 Notificaciones de Stock</h2>
</div>

<div class="mt-5 grid grid-cols-1 gap-4">
    @forelse($notificaciones as $notificacion)
        <div class="bg-gray-800 p-4 rounded-lg shadow-md flex justify-between items-center">
            <div>
                <p class="text-white font-medium">{{ $notificacion->Descripcion }}</p>
                <p class="text-gray-400 text-sm">Fecha: {{ $notificacion->fecha_creacion }}</p>
            </div>
            <form action="{{ route('notificaciones.markAsSeen', $notificacion->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Marcar como visto
                </button>
            </form>
        </div>
    @empty
        <p class="text-white">No hay notificaciones pendientes.</p>
    @endforelse
</div>
@endsection
