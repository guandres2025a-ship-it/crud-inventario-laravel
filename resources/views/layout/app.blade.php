<x-app-layout>

<div class="h-full text-gray-800 dark:text-gray-100">
    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col">
            <div class="h-16 flex items-center justify-center border-b border-gray-200 dark:border-gray-700">
                <span class="text-lg font-bold">
                    {{ config('app.name', 'Clothes_CRUD') }}
                </span>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700
                           {{ request()->routeIs('dashboard') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                    Inicio
                </a>

                <a href="{{ route('productos.index') }}"
                    class="block px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700
                           {{ request()->routeIs('productos.*') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                    Productos
                </a>

                <a href=""
                    class="block px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700
                           {{ request()->routeIs('categorias.*') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                    Categorías
                </a>
            </nav>
        </aside>

        <!-- MAIN -->
        <div class="flex-1 flex flex-col">

            <!-- TOPBAR -->
            <header class="h-16 bg-white dark:bg-gray-800 border-b flex items-center justify-between px-6">

                <input
                    type="text"
                    placeholder="Buscar productos..."
                    class="w-full max-w-lg bg-gray-100 rounded-lg px-4 py-2 text-sm"
                >

                <div class="flex items-center gap-6">

                    <x-dropdown align="right" width="48">

                        <!-- BOTÓN (CLICK) -->
                        <x-slot name="trigger">
                            <button type="button" class="flex items-center gap-2 focus:outline-none">
                                <img
                                    class="w-8 h-8 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}"
                                >
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <!-- MENÚ -->
                        <x-slot name="content">

                            <div class="px-4 py-2">
                                <div class="text-sm font-medium">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                            </div>

                            <div class="border-t"></div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                Perfil
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link
                                    href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();"
                                >
                                    Cerrar sesión
                                </x-dropdown-link>
                            </form>

                        </x-slot>
                    </x-dropdown>

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

    @include('productos.modals.create')

    {{-- MODAL EDIT / VIEW / DELETE --}}
    @include('productos.modals.edit')

    @include('productos.modals.delete-confirm')
            </main>
            

        </div>
    </div>
</div>

</x-app-layout>
