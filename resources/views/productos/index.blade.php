@extends('layout.app')

@section('content')

{{-- DEBUG TEMPORAL (puedes borrar luego) --}}
<div class="mb-4 text-sm text-gray-500">
    Usuario: {{ auth()->user()->email }} |
    Rol: {{ auth()->user()->role }} |
    Productos visibles: {{ $productos->count() }}
</div>

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Productos</h2>

    <button
        type="button"
        onclick="openCreateModal()"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
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
            <tr class="hover:bg-gray-50 transition text-gray-800">
                <td class="px-6 py-4 font-medium">
                    {{ $producto->nombre }}
                </td>

                <td class="px-6 py-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                        {{ $producto->categoria }}
                    </span>
                </td>

                <td class="px-6 py-4 font-semibold">
                    ${{ number_format($producto->precio, 2) }}
                </td>

                <td class="px-6 py-4">
                    <span class="inline-flex items-center px-2 py-1 rounded-md text-xs
                            {{ $producto->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $producto->stock }}
                    </span>
                </td>

                <td class="px-6 py-4 text-right space-x-2">

                    {{-- EDITAR --}}
                    <button
                        type="button"
                        onclick="openEditModal(JSON.parse(this.dataset.producto))"
                        data-producto='@json($producto)'
                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium
                                   rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 transition">
                        Editar
                    </button>

                    {{-- ELIMINAR --}}
                    @if(auth()->user()->isAdmin() || $producto->user_id === auth()->id())
                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button
                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium
                                           rounded-md text-red-700 bg-red-100 hover:bg-red-200 transition"
                            onclick="return confirm('¿Eliminar este producto?')">
                            Eliminar
                        </button>
                    </form>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- PAGINACIÓN --}}
<div class="mt-6">
    {{ $productos->links() }}
</div>

{{-- MODALES --}}
@include('productos.modals.create')
@include('productos.modals.edit')

@endsection