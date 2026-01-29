<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-100 dark:bg-gray-900">

<head>
    <meta charset="UTF-8">
    <title>Dashboard | Productos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full text-gray-800 dark:text-gray-100">
    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col">
            <div class="h-16 flex items-center gap-3 px-6 font-semibold">
                <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-600 text-white">i</div>
                Clean Inventory
            </div>

            <nav class="flex-1 px-3 space-y-1">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg bg-blue-50 dark:bg-blue-900 text-blue-600 font-medium">
                    📦 Productos
                </a>
            </nav>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="text-sm text-white bg-red-600 w-full p-4 rounded-lg mb-2  hover:bg-red-700">
                    Cerrar sesión
                </button>
            </form>
        </aside>

        <!-- MAIN -->
        <div class="flex-1 flex flex-col">

            <!-- TOPBAR -->
            <header class="h-16 bg-white dark:bg-gray-800 border-b flex items-center justify-between px-6">
                <input type="text" placeholder="Buscar productos..."
                    class="w-full max-w-lg bg-gray-100 rounded-lg px-4 py-2 text-sm">

                <div class="flex items-center gap-4">
                    🔔
                    <div class="flex items-center gap-2">
                        <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/40">
                        <span class="text-sm font-medium">Admin</span>
                    </div>
                </div>
            </header>

            <!-- CONTENT -->
            <main class="flex-1 overflow-y-auto p-6">

                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Gestión de Productos</h1>
                    <button onclick="openCreateModal()" class="btn-primary">
                        ➕ Añadir Producto
                    </button>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="p-4 text-left">Producto</th>
                                <th class="p-4 text-left">Categoría</th>
                                <th class="p-4 text-left">Precio</th>
                                <th class="p-4 text-left">Stock</th>
                                <th class="p-4 text-left">Estado</th>
                                <th class="p-4"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($productos as $producto)
                            <tr class="border-t hover:bg-gray-100/60 hover:text-black hover:">
                                <td class="p-4 font-medium">{{ $producto->nombre }}</td>
                                <td class="p-4">{{ $producto->categoria }}</td>
                                <td class="p-4">${{ number_format($producto->precio,2) }}</td>
                                <td class="p-4">{{ $producto->stock }}</td>
                                <td class="p-4">
                                    @if($producto->stock > 20)
                                    <span class="badge-green">Disponible</span>
                                    @elseif($producto->stock > 0)
                                    <span class="badge-yellow">Bajo stock</span>
                                    @else
                                    <span class="badge-red">Sin stock</span>
                                    @endif
                                </td>
                                <td class="p-4 text-right space-x-3">
                                    <button onclick='openEdit(@json($producto))' class="text-blue-600">Editar</button>
                                    <button onclick='openView(@json($producto))' class="text-gray-600">Ver</button>
                                    <button
                                        onclick='openDeleteConfirm(@json($producto))'
                                        class="text-red-600 hover:underline">
                                        Eliminar
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="p-4 border-t">
                        {{ $productos->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    {{-- MODAL CREATE --}}
    @include('productos.modals.create')

    {{-- MODAL EDIT / VIEW / DELETE --}}
    @include('productos.modals.edit')

    @include('productos.modals.delete-confirm')

</body>

</html>