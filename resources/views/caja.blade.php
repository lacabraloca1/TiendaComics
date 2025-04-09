@extends('layouts.blaze')

@section('title', 'Caja - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between">
    <div>
        <p>Atiende: {{ Auth::user()->nombre }} {{ Auth::user()->apellidoP }}</p>
        <p>Fecha y hora: <span id="current-time">{{ now()->format('d/m/Y h:i:s A') }}</span></p>
    </div>
    <!-- Botón para Nuevo Ticket -->
    <div>
        <button onclick="openModal('modalNuevoTicket')"
            class="flex items-center bg-purple-600 text-white px-4 py-2 rounded-md shadow-lg hover:bg-purple-700 transition">
            <span class="text-xl mr-2">➕</span> Nuevo Ticket
        </button>
    </div>
</div>

<!-- Buscador y botones -->
<div class="mt-5 flex flex-col">
    <div class="flex items-center">
        <input type="text" id="product-search" placeholder="Buscar producto" class="p-2 w-full bg-gray-700 text-white rounded-md"/>
        <button class="ml-3 bg-gray-600 p-2 rounded">🔍</button>
        <input type="number" id="product-quantity" value="1" class="ml-3 p-2 w-20 bg-gray-700 text-white rounded-md text-center"/>
    </div>
    <!-- Contenedor para mostrar resultados de búsqueda -->
    <div id="search-results" class="mt-2 bg-gray-700 rounded-md"></div>
</div>

<!-- Tabla del Ticket (productos agregados) -->
<div class="mt-5">
    <table class="w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">ID</th>
                <th class="p-3">Código de Barras</th>
                <th class="p-3">Descripción</th>
                <th class="p-3">Cantidad Agregada</th>
                <th class="p-3">Subtotal</th>
                <th class="p-3">Acciones</th>
            </tr>
        </thead>
        <tbody id="ticket-tbody">
            <!-- Aquí se cargarán los productos agregados al ticket -->
        </tbody>
    </table>
</div>

<!-- Botón para confirmar el pedido -->
<div class="mt-5 flex justify-end">
    <button onclick="confirmOrder()"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md shadow-lg transition">
        Confirmar Pedido
    </button>
</div>

<script>
// Referencias a elementos
const searchInput = document.getElementById('product-search');
const searchResultsDiv = document.getElementById('search-results');
const ticketTbody = document.getElementById('ticket-tbody');
const quantityInput = document.getElementById('product-quantity');

// Renderiza los resultados de búsqueda en el contenedor
function renderSearchResults(productos) {
    searchResultsDiv.innerHTML = '';
    if(productos.length === 0) {
        searchResultsDiv.innerHTML = '<p class="p-2 text-center text-gray-300">No se encontraron productos.</p>';
        return;
    }
    productos.forEach(producto => {
        const div = document.createElement('div');
        div.classList.add('p-2','border-b','border-gray-600','flex','justify-between','items-center','hover:bg-gray-600','cursor-pointer');
        // Se agrega el producto en un data attribute del botón
        div.innerHTML = `
            <div>
                <p class="text-white font-bold">${producto.descripcion}</p>
                <p class="text-sm text-gray-300">Código: ${producto.codigo_barras ?? '-'}</p>
                <p class="text-sm text-gray-300">Stock: ${producto.stock_actual}</p>
            </div>
            <button data-product='${JSON.stringify(producto)}'
                class="bg-green-600 px-2 py-1 rounded text-white"
                onclick="seleccionarProducto(this)">Agregar</button>
        `;
        searchResultsDiv.appendChild(div);
    });
}

// Realiza la búsqueda vía AJAX
function searchProductos(query) {
    fetch(`{{ route('productos.search') }}?query=` + encodeURIComponent(query))
        .then(response => response.json())
        .then(data => {
            console.log('Resultados búsqueda:', data);
            renderSearchResults(data);
        })
        .catch(err => console.error('Error en la búsqueda:', err));
}

// Búsqueda en tiempo real
searchInput.addEventListener('input', (e) => {
    const query = e.target.value.trim();
    if(query.length > 0) {
        searchProductos(query);
    } else {
        searchResultsDiv.innerHTML = '';
    }
});

// Función para seleccionar un producto del listado de búsqueda
function seleccionarProducto(btn) {
    // Se obtiene el objeto producto desde el atributo data-product
    const productJSON = btn.getAttribute('data-product');
    const producto = JSON.parse(productJSON);
    const quantity = parseInt(quantityInput.value);
    if(isNaN(quantity) || quantity < 1) {
        alert('Ingrese una cantidad válida.');
        return;
    }
    // Verifica si la cantidad solicitada no excede el stock
    if(quantity > producto.stock_actual) {
        alert('La cantidad solicitada excede el stock disponible.');
        return;
    }
    agregarProductoAlTicket(producto, quantity);
    // Limpia la búsqueda y oculta los resultados
    searchResultsDiv.innerHTML = '';
    searchInput.value = '';
}

// Actualizamos la función para incluir una columna de acciones
function agregarProductoAlTicket(producto, cantidadAgregada) {
    let row = document.getElementById('ticket-row-' + producto.id_producto);
    if(row) {
        let cantidadCell = row.querySelector('.ticket-cantidad');
        let subtotalCell = row.querySelector('.ticket-subtotal');
        let cantidadActual = parseInt(cantidadCell.textContent);
        let nuevaCantidad = cantidadActual + cantidadAgregada;
        cantidadCell.textContent = nuevaCantidad;
        subtotalCell.textContent = `$${(nuevaCantidad * producto.precio).toFixed(2)}`;
    } else {
        row = document.createElement('tr');
        row.id = 'ticket-row-' + producto.id_producto;
        row.classList.add('bg-gray-900','text-center');
        row.innerHTML = `
            <td class="p-3">${producto.id_producto}</td>
            <td class="p-3">${producto.codigo_barras ?? '-'}</td>
            <td class="p-3">${producto.descripcion}</td>
            <td class="p-3 ticket-cantidad">${cantidadAgregada}</td>
            <td class="p-3 ticket-subtotal">$${(cantidadAgregada * producto.precio).toFixed(2)}</td>
            <td class="p-3">
                <button class="bg-yellow-500 text-white px-2 py-1 rounded" onclick="editarCantidad('${producto.id_producto}', ${producto.precio})">Editar</button>
                <button class="bg-red-600 text-white px-2 py-1 rounded" onclick="eliminarProducto('${producto.id_producto}')">Eliminar</button>
            </td>
        `;
        ticketTbody.appendChild(row);
    }
    alert('Producto agregado al ticket.');
}

// Función para editar la cantidad de un producto existente en el ticket
function editarCantidad(productoId, precio) {
    let row = document.getElementById('ticket-row-' + productoId);
    if(!row) return;
    let cantidadCell = row.querySelector('.ticket-cantidad');
    let subtotalCell = row.querySelector('.ticket-subtotal');
    let cantidadActual = parseInt(cantidadCell.textContent);
    let nuevaCantidad = prompt("Ingrese la nueva cantidad:", cantidadActual);
    nuevaCantidad = parseInt(nuevaCantidad);
    if(isNaN(nuevaCantidad) || nuevaCantidad < 1) {
        alert("Cantidad inválida.");
        return;
    }
    cantidadCell.textContent = nuevaCantidad;
    subtotalCell.textContent = `$${(nuevaCantidad * precio).toFixed(2)}`;
}

// Función para eliminar un producto del ticket
function eliminarProducto(productoId) {
    let row = document.getElementById('ticket-row-' + productoId);
    if(row) {
        if(confirm("¿Está seguro de eliminar este producto del ticket?")) {
            row.remove();
        }
    }
}

// Función para confirmar el pedido: calcula el total y actualiza el stock en la BD
function confirmOrder() {
    const rows = document.querySelectorAll("#ticket-tbody tr");
    let orderDetails = [];
    let total = 0;
    rows.forEach(row => {
        const productId = row.id.replace("ticket-row-", "");
        const quantity = parseInt(row.querySelector(".ticket-cantidad").textContent);
        const subtotalText = row.querySelector(".ticket-subtotal").textContent;
        const subtotal = parseFloat(subtotalText.replace('$', ''));
        total += subtotal;
        orderDetails.push({ id: productId, quantity: quantity });
    });
    if (orderDetails.length === 0) {
        alert("No hay productos en el ticket.");
        return;
    }
    if (!confirm("El total del pedido es $" + total.toFixed(2) + ". ¿Confirmar pedido?")) {
        return;
    }
    // Asumiremos que el método de pago es 1 y que el pago se realiza exactamente con el total.
    fetch(`{{ route('ventas.store') }}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            orderDetails: orderDetails,
            total: total,
            Metodo_pagos_id: 1,
            pago_con: total
        })
    })
    .then(response => {
        if (!response.ok) return response.json().then(err => { throw err; });
        return response.json();
    })
    .then(data => {
        alert("Venta confirmada. ID Venta: " + data.venta_id);
        // Limpia el ticket
        ticketTbody.innerHTML = "";
    })
    .catch(error => {
        alert("Error al confirmar la venta: " + (error.error || "Error desconocido"));
    });
}

// Funciones para abrir/cerrar modales (si fueran necesarios)
function openModal(modalId) {
    document.getElementById(modalId).classList.remove("hidden");
}
function closeModal(modalId) {
    document.getElementById(modalId).classList.add("hidden");
}

function updateTime(){
    const now = new Date();
    // Ajusta las opciones de horario según tus necesidades; aquí se formatea en español.
    const options = { 
        year: 'numeric', month: '2-digit', day: '2-digit', 
        hour: '2-digit', minute: '2-digit', second: '2-digit', 
        hour12: true 
    };
    const formatted = now.toLocaleString('es-ES', options);
    document.getElementById('current-time').textContent = formatted;
}
updateTime();
setInterval(updateTime, 1000);
</script>
@endsection
