@extends('layout.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Gestión de Productos</h1>
        <button onclick="openCreateModal()" class="btn-primary">
            ➕ Añadir Producto
        </button>
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
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
                    <tr class="border-t hover:bg-gray-100/60 hover:text-black" data-producto='@json($producto)'>
                        <td class="p-4 font-medium">{{ $producto->nombre }}</td>
                        <td class="p-4">{{ $producto->categoria }}</td>
                        <td class="p-4">${{ number_format($producto->precio, 2) }}</td>
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
                            <button onclick="openEdit(JSON.parse(this.closest('tr').dataset.producto))" class="text-blue-600 hover:underline">Editar</button>
                            <button onclick="openView(JSON.parse(this.closest('tr').dataset.producto))" class="text-gray-600 hover:underline">Ver</button>
                            <button onclick="openDeleteConfirm(JSON.parse(this.closest('tr').dataset.producto))" class="text-red-600 hover:underline">
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
@endsection