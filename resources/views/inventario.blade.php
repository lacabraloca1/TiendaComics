@extends('layouts.blaze')

@section('title', 'Inventario - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold text-white">📦 Inventario de Productos</h2>
    <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md transition" onclick="openModal('modalNuevoProducto')">
        ➕ Agregar Producto
    </button>
</div>

<!-- Tabla del inventario -->
<div class="mt-5 overflow-x-auto">
    <table class="min-w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">ID</th>
                <th class="p-3">Código de Barras</th>
                <th class="p-3">Descripción</th>
                <th class="p-3">Stock Actual</th>
                <th class="p-3">Precio</th>
                <th class="p-3">Precio Proveedor</th>
                <th class="p-3">Fecha Registro</th>
                <th class="p-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr class="bg-gray-900 text-center">
                <td class="p-3">{{ $producto->id_producto }}</td>
                <td class="p-3">{{ $producto->codigo_barras ?? '-' }}</td>
                <td class="p-3">{{ $producto->descripcion }}</td>
                <td class="p-3">{{ $producto->stock_actual }}</td>
                <td class="p-3">${{ number_format($producto->precio, 2) }}</td>
                <td class="p-3">${{ number_format($producto->precio_proveedor, 2) }}</td>
                <td class="p-3">{{ \Carbon\Carbon::parse($producto->fecha_registro)->format('Y-m-d') }}</td>
                <td class="p-3">
                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded transition" onclick="openEditModal({{ $producto->id_producto }})">✏️ Editar</button>
                    <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded transition" onclick="openDeleteModal({{ $producto->id_producto }})">❌ Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal: Nuevo Producto -->
<div id="modalNuevoProducto" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-gray-900 p-6 rounded-md shadow-lg text-white w-[600px]">
        <h2 class="text-xl font-bold mb-4 text-green-400">Agregar Nuevo Producto</h2>
        <form id="nuevoProductoForm" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Código de Barras</label>
                    <input type="number" name="codigo_barras" class="w-full p-2 border rounded bg-gray-800 text-white" 
                           placeholder="Ingrese el código"
                           min="0" 
                           step="1"
                           pattern="[0-9]*"
                           inputmode="numeric">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Descripción *</label>
                    <input type="text" name="descripcion" required class="w-full p-2 border rounded bg-gray-800 text-white" 
                           placeholder="Ingrese la descripción">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Stock Actual *</label>
                    <input type="number" name="stock_actual" required class="w-full p-2 border rounded bg-gray-800 text-white" 
                           placeholder="Cantidad en stock">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Imagen</label>
                    <input type="file" name="imagen_url" accept="image/*" 
                           class="w-full p-2 border rounded bg-gray-800 text-white">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Precio Proveedor *</label>
                    <input type="number" step="0.01" name="precio_proveedor" required 
                           class="w-full p-2 border rounded bg-gray-800 text-white" 
                           placeholder="Ingrese el precio proveedor">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Precio Venta *</label>
                    <input type="number" step="0.01" name="precio" required 
                           class="w-full p-2 border rounded bg-gray-800 text-white" 
                           placeholder="Ingrese el precio de venta">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Categoría *</label>
                    <select name="categorias_id" required class="w-full p-2 border rounded bg-gray-800 text-white">
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Editorial *</label>
                    <select name="editorial_id" required class="w-full p-2 border rounded bg-gray-800 text-white">
                        <option value="">Seleccione una editorial</option>
                        @foreach($editoriales as $editorial)
                            <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Proveedor *</label>
                    <select name="proveedores_id" required class="w-full p-2 border rounded bg-gray-800 text-white">
                        <option value="">Seleccione un proveedor</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded transition" 
                        onclick="closeModal('modalNuevoProducto')">Cancelar</button>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded transition">
                    Agregar Producto</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal: Editar Producto -->
<div id="modalEditarProducto" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-gray-900 p-6 rounded-md shadow-lg text-white w-[600px]">
        <h2 class="text-xl font-bold mb-4 text-yellow-400">Editar Producto</h2>
        <form id="editarProductoForm" method="POST" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_producto" id="editarProductoId">
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Código de Barras</label>
                    <input type="text" name="codigo_barras" id="editarCodigoBarras" 
                           class="w-full p-2 border rounded bg-gray-800 text-white"
                           pattern="[0-9]*"
                           inputmode="numeric"
                           maxlength="13">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Descripción *</label>
                    <input type="text" name="descripcion" id="editarDescripcion" required 
                           class="w-full p-2 border rounded bg-gray-800 text-white">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Stock Actual *</label>
                    <input type="number" name="stock_actual" id="editarStock" required 
                           class="w-full p-2 border rounded bg-gray-800 text-white">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Imagen</label>
                    <input type="file" name="imagen_url" accept="image/*" 
                           class="w-full p-2 border rounded bg-gray-800 text-white">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Precio Proveedor *</label>
                    <input type="number" step="0.01" name="precio_proveedor" id="editarPrecioProveedor" required 
                           class="w-full p-2 border rounded bg-gray-800 text-white">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Precio Venta *</label>
                    <input type="number" step="0.01" name="precio" id="editarPrecio" required 
                           class="w-full p-2 border rounded bg-gray-800 text-white">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Categoría *</label>
                    <select name="categorias_id" id="editarCategoria" required class="w-full p-2 border rounded bg-gray-800 text-white">
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Editorial *</label>
                    <select name="editorial_id" id="editarEditorial" required class="w-full p-2 border rounded bg-gray-800 text-white">
                        <option value="">Seleccione una editorial</option>
                        @foreach($editoriales as $editorial)
                            <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 font-medium">Proveedor *</label>
                    <select name="proveedores_id" id="editarProveedor" required class="w-full p-2 border rounded bg-gray-800 text-white">
                        <option value="">Seleccione un proveedor</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded transition" 
                        onclick="closeModal('modalEditarProducto')">Cancelar</button>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded transition">
                    Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal: Eliminar Producto -->
<div id="modalEliminarProducto" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-gray-900 p-6 rounded-md shadow-lg text-white w-96">
        <h2 class="text-xl font-bold mb-4 text-red-400">Eliminar Producto</h2>
        <p class="mb-4">¿Está seguro que desea eliminar este producto de forma permanente?</p>
        <div class="flex justify-end gap-2">
            <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded transition" 
                    onclick="closeModal('modalEliminarProducto')">Cancelar</button>
            <button type="button" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition" 
                    onclick="confirmDelete()">Eliminar</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function openModal(modalId) {
    document.getElementById(modalId).classList.remove("hidden");
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add("hidden");
}

function openEditModal(id) {
    fetch(`/productos/${id}`, {
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al cargar los datos');
        }
        return response.json();
    })
    .then(producto => {
        // Actualizar los campos del formulario
        document.getElementById('editarProductoId').value = producto.id_producto;
        document.getElementById('editarCodigoBarras').value = producto.codigo_barras || '';
        document.getElementById('editarDescripcion').value = producto.descripcion;
        document.getElementById('editarStock').value = producto.stock_actual;
        document.getElementById('editarPrecio').value = producto.precio;
        document.getElementById('editarPrecioProveedor').value = producto.precio_proveedor;
        document.getElementById('editarCategoria').value = producto.categorias_id;
        document.getElementById('editarEditorial').value = producto.editorial_id;
        document.getElementById('editarProveedor').value = producto.proveedores_id;
        
        // Actualizar la acción del formulario
        document.getElementById('editarProductoForm').action = `/productos/${producto.id_producto}`;
        
        // Mostrar el modal
        document.getElementById('modalEditarProducto').classList.remove('hidden');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al cargar los datos del producto: ' + error.message);
    });
}

document.getElementById('editarProductoForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const id = document.getElementById('editarProductoId').value;
    
    const formData = new FormData(this);

    fetch(`/productos/${id}`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Producto actualizado correctamente');
            location.reload();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al actualizar el producto');
    });
});

document.getElementById('nuevoProductoForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);

    fetch('{{ route("productos.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al procesar la solicitud');
    });
});

let productoIdToDelete = null;

function openDeleteModal(id) {
    productoIdToDelete = id;
    document.getElementById('modalEliminarProducto').classList.remove('hidden');
}

function confirmDelete() {
    if (!productoIdToDelete) return;

    fetch(`/productos/${productoIdToDelete}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Producto eliminado correctamente');
            location.reload();
        } else {
            throw new Error(data.message || 'Error al eliminar el producto');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al eliminar el producto: ' + error.message);
    })
    .finally(() => {
        closeModal('modalEliminarProducto');
        productoIdToDelete = null;
    });
}
</script>
@endsection
