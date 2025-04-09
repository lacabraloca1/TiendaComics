@extends('layouts.blaze')

@section('title', 'Membresías - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">👤 Clientes y Membrecias</h2>
</div>

<!-- Tabla de Membresías por Cliente -->
<div class="mt-5">
    <table class="w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">ID Cliente</th>
                <th class="p-3">Nombre</th>
                <th class="p-3">Apellido</th>
                <th class="p-3">Correo</th>
                <th class="p-3">Teléfono</th>
                <th class="p-3">Dirección</th>
                <th class="p-3">Membresía</th>
                <th class="p-3">Monto</th>
                <th class="p-3">Fecha Registro</th>
                <th class="p-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr id="cliente-row-{{ $cliente->id_cliente }}" 
                data-nombre="{{ $cliente->nombre }}"
                data-apellido="{{ $cliente->apellido }}"
                data-correo="{{ $cliente->correo }}"
                data-telefono="{{ $cliente->telefono }}"
                data-direccion="{{ $cliente->direccion }}"
                data-membrecias-id="{{ $cliente->membrecias->id ?? '' }}"
                data-monto="{{ $cliente->membrecias->monto ?? '' }}">
                <td class="p-3">{{ $cliente->id_cliente }}</td>
                <td class="p-3">{{ $cliente->nombre }}</td>
                <td class="p-3">{{ $cliente->apellido }}</td>
                <td class="p-3">{{ $cliente->correo }}</td>
                <td class="p-3">{{ $cliente->telefono }}</td>
                <td class="p-3">{{ $cliente->direccion }}</td>
                <td class="p-3">{{ $cliente->membrecias->nombre ?? 'Sin membresía' }}</td>
                <td class="p-3">${{ number_format($cliente->membrecias->monto, 2) ?? '' }}</td>
                <td class="p-3">{{ $cliente->fecha_registro }}</td>
                <td class="p-3">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded" onclick="openModal('modalEditarCliente', {{ $cliente->id_cliente }})">✏️ Editar</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded" onclick="openModal('modalEliminarCliente', {{ $cliente->id_cliente }})">❌ Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal: Editar Cliente y Membresía -->
<div id="modalEditarCliente" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-white w-1/2 max-h-[80vh] overflow-y-auto">
    <h2 class="text-2xl font-bold mb-4">Editar Cliente y Membresía</h2>
    <form id="editClienteForm" method="POST" action="">
      @csrf
      @method('PUT')
      <input type="hidden" name="id_cliente" id="editClienteId">
      
      <!-- Datos del Cliente -->
      <div class="mb-4">
          <label class="block font-medium">Nombre</label>
          <input type="text" name="nombre" id="editClienteNombre" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
          <label class="block font-medium">Apellido</label>
          <input type="text" name="apellido" id="editClienteApellido" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
          <label class="block font-medium">Correo</label>
          <input type="email" name="correo" id="editClienteCorreo" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
          <label class="block font-medium">Teléfono</label>
          <input type="text" name="telefono" id="editClienteTelefono" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="mb-4">
          <label class="block font-medium">Dirección</label>
          <input type="text" name="direccion" id="editClienteDireccion" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      
      <!-- Datos de la Membresía -->
      <div class="mb-4">
          <label class="block font-medium">Membresía</label>
          <select name="membrecias_id" id="editClienteMembresia" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600" onchange="updateMembresiaInfo()">
             @foreach($membrecias as $membresia)
                <option value="{{ $membresia->id }}" data-monto="{{ $membresia->monto }}" data-beneficios="{{ $membresia->caracteristicas }}">
                  {{ $membresia->nombre }} (${{ number_format($membresia->monto,2) }})
                </option>
             @endforeach
          </select>
      </div>
      <div class="mb-4">
          <label class="block font-medium">Beneficios</label>
          <textarea id="membresiaBeneficios" readonly class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600"></textarea>
      </div>
      <div class="mb-4">
          <label class="block font-medium">Monto</label>
          <input type="number" step="0.01" name="monto" id="editClienteMonto" required readonly class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      
      <div class="flex justify-end gap-4">
          <button type="button" onclick="closeModal('modalEditarCliente')" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded">Cancelar</button>
          <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded">Guardar Cambios</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal: Editar Membresía del Cliente -->
<div id="modalEditarMembresia" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-white w-1/3 max-h-[80vh] overflow-y-auto">
    <h2 class="text-2xl font-bold mb-4">Editar Membresía</h2>
    <!-- Se asume que has definido la ruta "clientes.updateMembresia" -->
    <form id="editMembresiaForm" method="POST" action="">
      @csrf
      @method('PUT')
      <input type="hidden" name="id_cliente" id="editMembresiaClienteId">
      
      <div class="mb-4">
          <label class="block font-medium">Tipo de Membresía</label>
          <select name="membrecias_id" id="editMembresiaSelect" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600" onchange="updateMontoFromSelect()">
             @foreach($membrecias as $membresia)
                <option value="{{ $membresia->id }}" data-monto="{{ $membresia->monto }}">
                  <strong>{{ $membresia->nombre }}</strong> – 
                  <small>{{ $membresia->caracteristicas }}</small> 
                  (${{ number_format($membresia->monto,2) }})
                </option>
             @endforeach
          </select>
      </div>
      <div class="mb-4">
          <label class="block font-medium">Monto</label>
          <input type="number" step="0.01" name="monto" id="editMembresiaMonto" required readonly class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
      </div>
      <div class="flex justify-end gap-4">
          <button type="button" onclick="closeModal('modalEditarMembresia')" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded">Cancelar</button>
          <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded">Actualizar Membresía</button>
      </div>
    </form>
  </div>
</div>

<script>
  // Función para abrir el modal de edición y rellenar los campos con la información del cliente
  function openModal(modalId, clienteId) {
      document.getElementById(modalId).classList.remove("hidden");
      if(modalId === 'modalEditarCliente' && clienteId) {
          // En este ejemplo se asume que cada fila de la tabla tiene un id "cliente-row-{id_cliente}" y data attributes correspondientes
          const row = document.getElementById('cliente-row-' + clienteId);
          if(row) {
              document.getElementById('editClienteId').value = clienteId;
              document.getElementById('editClienteNombre').value = row.dataset.nombre;
              document.getElementById('editClienteApellido').value = row.dataset.apellido;
              document.getElementById('editClienteCorreo').value = row.dataset.correo;
              document.getElementById('editClienteTelefono').value = row.dataset.telefono;
              document.getElementById('editClienteDireccion').value = row.dataset.direccion;
              // Selecciona la membresía actual (si es que existe)
              if(row.dataset.membreciasId){
                  document.getElementById('editClienteMembresia').value = row.dataset.membreciasId;
              }
              // Asigna el monto actual (puedes obtenerlo de otro data attribute, por ejemplo data-monto)
              if(row.dataset.monto){
                  document.getElementById('editClienteMonto').value = row.dataset.monto;
              }
              updateMembresiaInfo();
              // Define la acción del formulario de edición (ruta "clientes.update", la cual debes definir en tus rutas)
              document.getElementById('editClienteForm').action = '/clientes/' + clienteId;
          }
      }
      if(modalId === 'modalEditarMembresia' && clienteId) {
          const row = document.getElementById('cliente-row-' + clienteId);
          if(row) {
              // Rellena el ID del cliente
              document.getElementById('editMembresiaClienteId').value = clienteId;
              // Si el cliente ya tiene membresía asignada, selecciona la opción correspondiente
              if(row.dataset.membreciasId) {
                  document.getElementById('editMembresiaSelect').value = row.dataset.membreciasId;
              }
              // Actualiza el monto según la opción seleccionada en el select
              updateMontoFromSelect();
              // Define la acción del formulario, por ejemplo: /clientes/{clienteId}/membresia
              document.getElementById('editMembresiaForm').action = '/clientes/' + clienteId + '/membresia';
          }
      }
  }

  function closeModal(modalId) {
      document.getElementById(modalId).classList.add("hidden");
  }

  function updateMontoFromSelect() {
      const select = document.getElementById('editMembresiaSelect');
      const monto = select.options[select.selectedIndex].getAttribute('data-monto');
      document.getElementById('editMembresiaMonto').value = monto;
  }

  // Función para eliminar al cliente, que redirige a la ruta de eliminación (debes tener la ruta 'clientes.destroy')
  function deleteCliente() {
      const clienteId = document.getElementById('editClienteId').value;
      if(confirm('¿Está seguro de eliminar este cliente?')){
          // Crea un formulario dinámico para enviar la petición DELETE
          const form = document.createElement('form');
          form.method = 'POST';
          form.action = '/clientes/' + clienteId;
          // Agrega los tokens necesarios
          form.innerHTML = `@csrf @method('DELETE')`;
          document.body.appendChild(form);
          form.submit();
      }
  }

  // Actualiza los campos de Membresía: monto y beneficios (características) según la opción seleccionada
  function updateMembresiaInfo() {
      const select = document.getElementById('editClienteMembresia');
      const selectedOption = select.options[select.selectedIndex];
      const monto = selectedOption.getAttribute('data-monto');
      const beneficios = selectedOption.getAttribute('data-beneficios');
      document.getElementById('editClienteMonto').value = monto;
      document.getElementById('membresiaBeneficios').value = beneficios;
  }
</script>
@endsection
