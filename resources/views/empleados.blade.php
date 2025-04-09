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
        <tbody id="empleadosTabla">
            @foreach ($empleados as $empleado)
            <tr id="empleado-row-{{ $empleado->id }}" class="bg-gray-900 text-center"
                data-id="{{ $empleado->id }}"
                data-nombre="{{ $empleado->nombre }}"
                data-apellidop="{{ $empleado->apellidoP }}"
                data-apellidom="{{ $empleado->apellidoM }}"
                data-email="{{ $empleado->correo }}"
                data-telefono="{{ $empleado->telefono }}"
                data-direccion="{{ $empleado->direccion }}"
                data-rol="{{ $empleado->Roles_id }}">
                <td class="p-3">{{ $empleado->id }}</td>
                <td class="p-3">{{ $empleado->nombre }} {{ $empleado->apellidoP }} {{ $empleado->apellidoM }}</td>
                <td class="p-3">{{ $empleado->correo }}</td>
                <td class="p-3">{{ $empleado->Roles_id }}</td>
                <td class="p-3">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded" onclick="openModal('modalEditarEmpleado', {{ $empleado->id }})">✏️ Editar</button>
                   
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal: Nuevo Empleado -->
<div id="modalNuevoEmpleado" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-white w-96">
    <h2 class="text-2xl font-bold mb-4">Agregar Empleado</h2>
    <form action="{{ route('empleados.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label class="block font-medium">Nombre</label>
        <input type="text" name="nombre" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
        <label class="block font-medium">Apellido Paterno</label>
        <input type="text" name="apellidoP" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
        <label class="block font-medium">Apellido Materno</label>
        <input type="text" name="apellidoM" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
        <label class="block font-medium">Correo</label>
        <input type="email" name="correo" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
        <label class="block font-medium">Teléfono</label>
        <input type="text" name="telefono" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
        <label class="block font-medium">Dirección</label>
        <input type="text" name="direccion" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
          <label class="block font-medium">Rol</label>
          <select name="Roles_id" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
              <option value="1">Administrador</option>
              <option value="2">Empleado</option>
              <!-- Agrega más roles según corresponda -->
          </select>
      </div>
      <div class="mb-4">
          <label class="block font-medium">Contraseña</label>
          <input type="password" name="password" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="flex justify-end gap-2">
          <button type="button" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded" onclick="closeModal('modalNuevoEmpleado')">Cancelar</button>
          <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded">Registrar</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal: Editar Empleado -->
<div id="modalEditarEmpleado" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-white w-3/7">
    <h2 class="text-2xl font-bold mb-4">Editar Empleado</h2>
    <form id="editEmpleadoForm" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" id="editEmpleadoId">
      <div class="mb-4">
          <label class="block font-medium">Nombre</label>
          <input type="text" name="nombre" id="editEmpleadoNombre" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
          <label class="block font-medium">Apellido Paterno</label>
          <input type="text" name="apellidoP" id="editEmpleadoApellidoP" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
          <label class="block font-medium">Apellido Materno</label>
          <input type="text" name="apellidoM" id="editEmpleadoApellidoM" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
          <label class="block font-medium">Correo</label>
          <input type="email" name="correo" id="editEmpleadoCorreo" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
          <label class="block font-medium">Teléfono</label>
          <input type="text" name="telefono" id="editEmpleadoTelefono" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
          <label class="block font-medium">Dirección</label>
          <input type="text" name="direccion" id="editEmpleadoDireccion" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
          <label class="block font-medium">Rol</label>
          <select name="Roles_id" id="editEmpleadoRol" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
              <option value="1">Administrador</option>
              <option value="2">Empleado</option>
          </select>
      </div>
      <div class="flex justify-end gap-4">
          <button type="button" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded" onclick="closeModal('modalEditarEmpleado')">Cancelar</button>
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">Guardar Cambios</button>
          <!-- Botón de eliminar dentro del modal de editar -->
          <button type="button" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded" onclick="openModal('modalEliminarEmpleado', document.getElementById('editEmpleadoId').value)">Eliminar</button>
          <!-- Botón para cambiar password: abre modal de cambiar password -->
          <button type="button" class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded" onclick="openModal('modalCambiarPassword', document.getElementById('editEmpleadoId').value)">Cambiar Password</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal: Eliminar Empleado -->
<div id="modalEliminarEmpleado" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-white w-96">
    <h2 class="text-2xl font-bold mb-4">Eliminar Empleado</h2>
    <p class="mb-4">¿Está seguro de eliminar este empleado?</p>
    <form id="deleteEmpleadoForm" method="POST">
      @csrf
      @method('DELETE')
      <input type="hidden" name="id" id="deleteEmpleadoId">
      <div class="flex justify-end gap-2">
          <button type="button" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded" onclick="closeModal('modalEliminarEmpleado')">Cancelar</button>
          <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded">Eliminar</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal: Cambiar Password -->
<div id="modalCambiarPassword" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-white w-96">
    <h2 class="text-2xl font-bold mb-4">Cambiar Password</h2>
    <form id="cambiarPasswordForm" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" id="passwordEmpleadoId">
      <div class="mb-4">
          <label class="block font-medium">Nueva Contraseña</label>
          <input type="password" name="password" id="nuevoPassword" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
          <label class="block font-medium">Confirmar Contraseña</label>
          <input type="password" name="password_confirmation" id="confirmPassword" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="flex justify-end gap-2">
          <button type="button" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded" onclick="closeModal('modalCambiarPassword')">Cancelar</button>
          <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded">Cambiar</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openModal(modalId, empleadoId = null) {
      if(modalId === 'modalEditarEmpleado' && empleadoId != null) {
          const row = document.getElementById('empleado-row-' + empleadoId);
          if(row) {
              document.getElementById('editEmpleadoId').value = empleadoId;
              document.getElementById('editEmpleadoNombre').value = row.dataset.nombre;
              document.getElementById('editEmpleadoApellidoP').value = row.dataset.apellidop;
              document.getElementById('editEmpleadoApellidoM').value = row.dataset.apellidom;
              document.getElementById('editEmpleadoCorreo').value = row.dataset.email;
              document.getElementById('editEmpleadoTelefono').value = row.dataset.telefono;
              document.getElementById('editEmpleadoDireccion').value = row.dataset.direccion;
              document.getElementById('editEmpleadoRol').value = row.dataset.rol;
              document.getElementById('editEmpleadoForm').action = '/empleados/' + empleadoId;
          }
          document.getElementById(modalId).classList.remove("hidden");
      } else if(modalId === 'modalEliminarEmpleado' && empleadoId != null) {
          document.getElementById('deleteEmpleadoForm').action = '/empleados/' + empleadoId;
          document.getElementById('deleteEmpleadoId').value = empleadoId;
          document.getElementById(modalId).classList.remove("hidden");
      } else if(modalId === 'modalCambiarPassword' && empleadoId != null) {
          document.getElementById('passwordEmpleadoId').value = empleadoId;
          document.getElementById('cambiarPasswordForm').action = '/empleados/' + empleadoId + '/password';
          document.getElementById(modalId).classList.remove("hidden");
      } else {
          document.getElementById(modalId).classList.remove("hidden");
      }
  }

  function closeModal(modalId) {
      document.getElementById(modalId).classList.add("hidden");
  }
</script>
@endsection
