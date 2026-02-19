@extends('layout.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Categorías</h2>

        <a href="{{ route('categorias.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Nueva categoría
        </a>
    </div>

    <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-200">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-4 text-left">ID</th>
                    <th class="px-6 py-4 text-left">Nombre</th>
                    <th class="px-6 py-4 text-right">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($categorias as $categoria)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">{{ $categoria->id }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $categoria->nombre }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('categorias.edit', $categoria) }}"
                                class="text-blue-600 hover:text-blue-900 font-medium transition">
                                Editar
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                            No hay categorías registradas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection