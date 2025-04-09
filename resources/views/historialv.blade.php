@extends('layouts.blaze')

@section('title', 'Historial de Ventas - Multiverso Comics')

@section('content')
<div class="bg-gray-800 p-5 rounded-md flex justify-between items-center">
    <h2 class="text-2xl font-bold">📜 Historial de Ventas</h2>
</div>

<!-- Formulario de filtros -->
<form action="{{ route('historial.index') }}" method="GET" class="mb-6">
    <div class="flex flex-wrap gap-4">
        <!-- Buscar por folio -->
        <div>
            <label for="folio" class="block text-white">Folio</label>
            <input type="text" name="folio" id="folio" placeholder="Buscar por folio" value="{{ request('folio') }}" class="p-2 rounded bg-gray-700 text-white">
        </div>
        <!-- Buscar por fecha -->
        <div>
            <label for="fecha" class="block text-white">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="{{ request('fecha') }}" class="p-2 rounded bg-gray-700 text-white">
        </div>
        <!-- Buscar por total -->
        <div>
            <label for="total" class="block text-white">Total</label>
            <input type="number" name="total" id="total" placeholder="Total" value="{{ request('total') }}" class="p-2 rounded bg-gray-700 text-white" step="0.01">
        </div>
        <!-- Buscar por hora -->
        <div>
            <label for="hora" class="block text-white">Hora</label>
            <input type="time" name="hora" id="hora" value="{{ request('hora') }}" class="p-2 rounded bg-gray-700 text-white">
        </div>
        <!-- Selección de orden -->
        <div>
            <label for="orden" class="block text-white">Ordenar</label>
            <select name="orden" id="orden" class="p-2 rounded bg-gray-700 text-white">
                <option value="asc" {{ request('orden') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                <option value="desc" {{ request('orden') == 'desc' ? 'selected' : '' }}>Descendente</option>
            </select>
        </div>
        <!-- Botón Filtrar -->
        <div class="flex items-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Filtrar
            </button>
        </div>
    </div>
</form>

<!-- Tabla de Historial de Ventas -->
<div class="mt-5">
    <table class="w-full border-collapse bg-gray-800 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">FOLIO</th>
                <th class="p-3">FECHA Y HORA</th>
                <th class="p-3">TOTAL</th>
                <th class="p-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody id="ventasBody">
            <!-- Las filas se actualizarán en tiempo real -->
            @foreach ($ventas as $venta)
            <tr class="bg-gray-900 text-center">
                <td class="p-3">{{ $venta->id }}</td>
                <td class="p-3">{{ $venta->fecha_creacion }}</td>
                <td class="p-3">${{ number_format($venta->total, 2) }}</td>
                <td class="p-3">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded"
                        onclick="openVentaModal(this)"
                        data-id="{{ $venta->id }}"
                        data-total="{{ $venta->total }}"
                        data-fecha="{{ $venta->fecha_creacion }}">
                        👁️ Ver
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal: Ver Detalles de Venta Mejorado -->
<div id="modalVerVenta" class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center">
    <div class="bg-gray-800 p-8 rounded-lg shadow-2xl w-11/12 md:w-3/4 lg:w-1/2">
        <!-- Encabezado de la venta -->
        <div class="border-b pb-4 mb-6 border-gray-600">
            <h2 class="text-4xl font-extrabold text-blue-400" id="venta-folio">Folio #123</h2>
            <p class="text-lg text-gray-300 mt-2" id="venta-fecha">Fecha y Hora: 2025-04-05 12:00:00</p>
        </div>

        <!-- Lista de productos (artículos comprados) -->
        <div class="mb-6">
            <h3 class="text-2xl font-bold mb-4 text-white">Artículos Comprados</h3>
            <div id="venta-productos" class="space-y-4">
                <!-- Aquí se insertarán dinámicamente los productos -->
            </div>
        </div>

        <!-- Total de la venta -->
        <div class="border-t pt-4 mb-6 border-gray-600">
            <p class="text-2xl font-bold text-white">Total: <span id="venta-total">$0.00</span></p>
        </div>

        <!-- Pie del modal -->
        <div class="flex justify-end">
            <button class="bg-gray-600 hover:bg-gray-500 text-white px-6 py-2 rounded-lg" onclick="closeModal('modalVerVenta')">
                Cerrar
            </button>
        </div>
    </div>
</div>
<script>
    // Referencia a los filtros
    const folioInput = document.getElementById('folio');
    const fechaInput = document.getElementById('fecha');
    const totalInput = document.getElementById('total');
    const horaInput = document.getElementById('hora');
    const ordenSelect = document.getElementById('orden');

    // Función modificada que incluye los parámetros
    async function fetchVentas() {
        const params = new URLSearchParams({
            folio: folioInput.value,
            fecha: fechaInput.value,
            total: totalInput.value,
            hora: horaInput.value,
            orden: ordenSelect.value,
        });
        try {
            let response = await fetch('/api/ventas?' + params.toString());
            if (response.ok) {
                let ventas = await response.json();
                updateVentasTable(ventas);
            }
        } catch (error) {
            console.error("Error al obtener las ventas:", error);
        }
    }

    // Añade event listeners para actualizar en tiempo real
    folioInput.addEventListener('input', fetchVentas);
    fechaInput.addEventListener('change', fetchVentas);
    totalInput.addEventListener('input', fetchVentas);
    horaInput.addEventListener('change', fetchVentas);
    ordenSelect.addEventListener('change', fetchVentas);

    // Se mantiene la función updateVentasTable y openVentaModal sin cambios
    function updateVentasTable(ventas) {
        let tbody = document.getElementById('ventasBody');
        tbody.innerHTML = ''; // Limpia la tabla

        ventas.forEach((venta) => {
            let tr = document.createElement('tr');
            tr.classList.add("bg-gray-900", "text-center");

            tr.innerHTML = `
                <td class="p-3">${venta.id}</td>
                <td class="p-3">${venta.fecha_creacion}</td>
                <td class="p-3">$${parseFloat(venta.total).toFixed(2)}</td>
                <td class="p-3">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded"
                        onclick="openVentaModal(this)"
                        data-id="${venta.id}"
                        data-total="${venta.total}"
                        data-fecha="${venta.fecha_creacion}">
                        👁️ Ver
                    </button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    // Se mantiene la función openVentaModal y las de abrir/cerrar modales
    async function openVentaModal(elem) {
        var ventaId = elem.dataset.id;
        var fecha = elem.dataset.fecha;
        var total = "$" + parseFloat(elem.dataset.total).toFixed(2);

        document.getElementById('venta-folio').textContent = "Folio #" + ventaId;
        document.getElementById('venta-fecha').textContent = "Fecha y Hora: " + fecha;
        document.getElementById('venta-total').textContent = total;

        try {
            let response = await fetch('/api/ventas/' + ventaId);
            if (response.ok) {
                let venta = await response.json();
                let productos = venta.detallespedidos;
                let productosLista = document.getElementById('venta-productos');
                productosLista.innerHTML = '';

                productos.forEach(function(detalle) {
                    let articleDiv = document.createElement('div');
                    articleDiv.classList.add("flex", "items-center", "justify-between", "bg-gray-700", "p-4", "rounded-lg", "shadow");

                    let infoDiv = document.createElement('div');
                    let prodName = document.createElement('p');
                    prodName.classList.add("text-lg", "font-semibold", "text-white");

                    // Muestra la descripción si está disponible
                    if (detalle.producto && detalle.producto.descripcion) {
                        prodName.textContent = "Producto: " + detalle.producto.descripcion;
                    } else {
                        prodName.textContent = "Producto ID: " + detalle.id_producto;
                    }

                    let prodCant = document.createElement('p');
                    prodCant.classList.add("text-sm", "text-gray-300");
                    prodCant.textContent = "Cantidad: " + detalle.cantidad;

                    infoDiv.appendChild(prodName);
                    infoDiv.appendChild(prodCant);

                    // Si el detalle ya fue devuelto, muestra texto; de lo contrario, agrega botón para procesar devolución
                    if (detalle.estado && detalle.estado.toLowerCase() === 'devuelta') {
                        let spanDevuelto = document.createElement('span');
                        spanDevuelto.classList.add("bg-green-600", "text-white", "px-4", "py-2", "rounded");
                        spanDevuelto.textContent = "Devuelto";
                        articleDiv.appendChild(infoDiv);
                        articleDiv.appendChild(spanDevuelto);
                    } else {
                        let btnDevolucion = document.createElement('button');
                        btnDevolucion.classList.add("bg-yellow-500", "hover:bg-yellow-600", "text-white", "px-4", "py-2", "rounded");
                        btnDevolucion.textContent = "Devolución";
                        btnDevolucion.addEventListener('click', function() {
                            // Llama a la función para procesar la devolución
                            procesarDevolucion(detalle);
                        });
                        articleDiv.appendChild(infoDiv);
                        articleDiv.appendChild(btnDevolucion);
                    }

                    productosLista.appendChild(articleDiv);
                });

                openModal('modalVerVenta');
            } else {
                console.error("Error al obtener la venta, estado: " + response.status);
            }
        } catch (error) {
            console.error("Error al obtener los detalles de la venta:", error);
        }
    }

    async function procesarDevolucion(detalle) {
        if (!confirm("¿Desea devolver este producto al stock?")) return;
        try {
            let response = await fetch('/ventas/devolucion', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    detalle_id: detalle.id_detalle, // Asegúrate de que la respuesta de la API incluya id_detalle
                    producto_id: detalle.id_producto,
                    cantidad: detalle.cantidad
                })
            });
            if (response.ok) {
                let data = await response.json();
                alert(data.message);
                // Recarga la venta para mostrar el cambio
                openVentaModal({ dataset: { id: detalle.ventas_id, total: document.getElementById('venta-total').textContent, fecha: document.getElementById('venta-fecha').textContent }});
                fetchVentas();
            } else {
                alert("Error en la devolución. Estado: " + response.status);
            }
        } catch (error) {
            console.error("Error en la devolución:", error);
        }
    }

    function openModal(modalId) {
        document.getElementById(modalId).classList.remove("hidden");
    }
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add("hidden");
    }

    // Actualiza la tabla cada 5 segundos (5000 ms)
    setInterval(fetchVentas, 5000);
</script>
@endsection
