@extends('layouts.blaze')

@section('title', 'Proveedores - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">📦 Proveedores</h2>
    <div class="flex gap-4">
        <button class="bg-yellow-500 text-black px-4 py-2 rounded-md" onclick="openModal('modalNuevoProveedor')">➕ Nuevo Proveedor</button>
    </div>
</div>

<!-- Tabla de Proveedores -->
<div class="mt-5">
    <table class="w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">ID</th>
                <th class="p-3">NOMBRE</th>
                <th class="p-3">EMAIL</th>
                <th class="p-3">TELÉFONO</th>
                <th class="p-3">DIRECCIÓN</th>
                <th class="p-3">FECHA ÚLTIMO ABASTE</th>
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
            <tr id="proveedor-row-{{ $proveedor->id }}" class="bg-gray-900 text-center"
                data-nombre="{{ $proveedor->nombre }}"
                data-email="{{ $proveedor->email }}"
                data-telefono="{{ $proveedor->telefono }}"
                data-direccion="{{ $proveedor->direccion }}">
                <td class="p-3">{{ $proveedor->id }}</td>
                <td class="p-3">{{ $proveedor->nombre }}</td>
                <td class="p-3">{{ $proveedor->email }}</td>
                <td class="p-3">{{ $proveedor->telefono }}</td>
                <td class="p-3">{{ $proveedor->direccion }}</td>
                <td class="p-3">{{ $proveedor->fecha_ultimo_abastecimiento }}</td>
                <td class="p-3">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded" onclick="openModal('modalEditarProveedor', {{ $proveedor->id }})">✏️ Editar</button>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal: Nuevo Proveedor -->
<div id="modalNuevoProveedor" class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center">
  <div class="bg-gray-800 p-6 rounded-lg shadow-xl w-96">
    <h2 class="text-2xl font-bold text-blue-400 mb-4">Registrar Nuevo Proveedor</h2>
    <form action="{{ route('proveedores.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label class="block text-white font-medium">Nombre</label>
        <input type="text" name="nombre" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600 text-white">
      </div>
      <div class="mb-4">
        <label class="block text-white font-medium">Correo</label>
        <input type="email" name="email" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600 text-white">
      </div>
      <div class="mb-4">
        <label class="block text-white font-medium">Teléfono</label>
        <input type="text" name="telefono" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600 text-white">
      </div>
      <div class="mb-4">
        <label class="block text-white font-medium">Dirección</label>
        <input type="text" name="direccion" class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600 text-white">
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded" onclick="closeModal('modalNuevoProveedor')">Cancelar</button>
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Registrar</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal: Editar Proveedor -->
<div id="modalEditarProveedor" class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center">
  <div class="bg-gray-800 p-6 rounded-lg shadow-xl w-96">
    <h2 class="text-2xl font-bold text-blue-400 mb-4">Editar Proveedor</h2>
    <form id="editProveedorForm" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" id="editProveedorId">
      <div class="mb-4">
        <label class="block text-white font-medium">Nombre</label>
        <input type="text" name="nombre" id="editProveedorNombre" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600 text-white">
      </div>
      <div class="mb-4">
        <label class="block text-white font-medium">Correo</label>
        <input type="email" name="email" id="editProveedorEmail" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600 text-white">
      </div>
      <div class="mb-4">
        <label class="block text-white font-medium">Teléfono</label>
        <input type="text" name="telefono" id="editProveedorTelefono" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600 text-white">
      </div>
      <div class="mb-4">
        <label class="block text-white font-medium">Dirección</label>
        <input type="text" name="direccion" id="editProveedorDireccion" class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600 text-white">
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded" onclick="closeModal('modalEditarProveedor')">Cancelar</button>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Guardar Cambios</button>
        <!-- Botón de eliminar dentro del modal de editar -->
        <button type="button" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded" onclick="openModal('modalEliminarProveedor', document.getElementById('editProveedorId').value)">Eliminar</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal: Eliminar Proveedor -->
<div id="modalEliminarProveedor" class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center">
  <div class="bg-gray-800 p-6 rounded-lg shadow-xl w-96">
    <h2 class="text-2xl font-bold text-blue-400 mb-4">Eliminar Proveedor</h2>
    <p class="text-white mb-4">Para eliminar este proveedor, seleccione otro proveedor al que se reasignarán los productos asociados.</p>
    <form id="deleteProveedorForm" method="POST">
      @csrf
      @method('DELETE')
      <input type="hidden" name="id" id="deleteProveedorId">
      <div class="mb-4">
         <label for="nuevo_proveedor_id" class="block text-white font-medium">Nuevo Proveedor</label>
         <select name="nuevo_proveedor_id" id="nuevo_proveedor_id" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600 text-white">
           <!-- Se generarán dinámicamente las opciones que excluyen el proveedor eliminado -->
         </select>
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded" onclick="closeModal('modalEliminarProveedor')">Cancelar</button>
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Eliminar</button>
      </div>
    </form>
  </div>
</div>

<script>
  // Se guarda la lista completa de proveedores en JS
  let allProveedores = @json($proveedores);
  
  function openModal(modalId, proveedorId = null) {
    if(modalId === 'modalEditarProveedor' && proveedorId != null) {
      var row = document.getElementById('proveedor-row-' + proveedorId);
      if(row) {
        document.getElementById('editProveedorId').value = proveedorId;
        document.getElementById('editProveedorNombre').value = row.dataset.nombre;
        document.getElementById('editProveedorEmail').value = row.dataset.email;
        document.getElementById('editProveedorTelefono').value = row.dataset.telefono;
        document.getElementById('editProveedorDireccion').value = row.dataset.direccion;
        document.getElementById('editProveedorForm').action = '/proveedores/' + proveedorId;
      }
      document.getElementById('modalEditarProveedor').classList.remove("hidden");
    } else if(modalId === 'modalEliminarProveedor' && proveedorId != null) {
      // Asigna la acción para eliminar y el id del proveedor
      document.getElementById('deleteProveedorForm').action = '/proveedores/' + proveedorId;
      document.getElementById('deleteProveedorId').value = proveedorId;
      // Rellenamos el select filtrando los proveedores que no sean el que se va a eliminar:
      let select = document.getElementById('nuevo_proveedor_id');
      select.innerHTML = ''; // Limpia opciones previas
      allProveedores.forEach(function(prov) {
          if(prov.id !== parseInt(proveedorId)){
              let option = document.createElement('option');
              option.value = prov.id;
              option.textContent = prov.nombre;
              select.appendChild(option);
          }
      });
      document.getElementById('modalEliminarProveedor').classList.remove("hidden");
    } else {
      document.getElementById(modalId).classList.remove("hidden");
    }
  }

  function closeModal(modalId) {
    document.getElementById(modalId).classList.add("hidden");
  }
</script>

@endsection
