@extends('layout.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Productos</h2>

    <button onclick="openCreateModal()"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Nuevo producto
    </button>
</div>

<div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-200">
    <table class="min-w-full text-sm text-gray-700">
        <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
            <tr>
                <th class="px-6 py-4 text-left">Producto</th>
                <th class="px-6 py-4 text-left">Categoría</th>
                <th class="px-6 py-4 text-left">Precio</th>
                <th class="px-6 py-4 text-left">Stock</th>
                <th class="px-6 py-4 text-right">Acciones</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @foreach ($productos as $producto)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-900">
                    {{ $producto->nombre }}
                </td>

                <td class="px-6 py-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                        {{ $producto->categoria }}
                    </span>
                </td>

                <td class="px-6 py-4">
                    <span class="font-semibold">${{ number_format($producto->precio, 2) }}</span>
                </td>

                <td class="px-6 py-4">
                    <span class="inline-flex items-center px-2 py-1 rounded-md text-xs
                        {{ $producto->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $producto->stock }}
                    </span>
                </td>

                <td class="px-6 py-4 text-right space-x-2">
                    <button
                        type="button"
                        onclick="openEditModal(@js($producto))"
                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium
           rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 transition">
                        Editar
                    </button>

                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button
                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 transition">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="mt-6">
    {{ $productos->links() }}
</div>

@include('productos.modals.create')
@include('productos.modals.edit')

@endsection