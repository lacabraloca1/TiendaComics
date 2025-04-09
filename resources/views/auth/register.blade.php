<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleado - ComicStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex flex-col justify-center items-center min-h-screen">
    <div class="bg-gray-800 p-8 rounded-lg shadow-md w-96">
        <h1 class="text-center text-2xl font-bold mb-4">Registro de Empleado</h1>

        <!-- Bloque para mostrar errores -->
        @if ($errors->any())
            <div class="bg-red-600 p-3 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-gray-300">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
            </div>

            <div class="mb-4">
                <label for="apellidoP" class="block text-gray-300">Apellido Paterno:</label>
                <input type="text" name="apellidoP" id="apellidoP" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
            </div>

            <div class="mb-4">
                <label for="apellidoM" class="block text-gray-300">Apellido Materno:</label>
                <input type="text" name="apellidoM" id="apellidoM" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
            </div>

            <div class="mb-4">
                <label for="telefono" class="block text-gray-300">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
            </div>

            <div class="mb-4">
                <label for="correo" class="block text-gray-300">Correo electrónico:</label>
                <input type="email" name="correo" id="correo" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
            </div>
            
            <!-- Nuevo campo: Dirección -->
            <div class="mb-4">
                <label for="direccion" class="block text-gray-300">Dirección:</label>
                <input type="text" name="direccion" id="direccion" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
            </div>
            
            <!-- Nuevo campo: Rol (selector) -->
            <div class="mb-4">
                <label for="Roles_id" class="block text-gray-300">Rol:</label>
                <select name="Roles_id" id="Roles_id" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
                    <option value="1">Administrador</option>
                    <option value="2" selected>Empleado</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-300">Contraseña:</label>
                <input type="password" name="password" id="password" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-300">Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full p-2 mt-1 bg-gray-700 rounded border border-gray-600">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">
                Registrar
            </button>
        </form>
    </div>
</body>
</html>
