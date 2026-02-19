@extends('layout.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Editar Categoría</h2>
            <a href="{{ route('categorias.index') }}" class="text-gray-500 hover:text-gray-700 transition">
                &larr; Volver
            </a>
        </div>

        <div class="bg-white shadow-sm rounded-xl p-6 border border-gray-200">
            <form action="{{ route('categorias.update', $categoria) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input type="text" name="nombre" id="nombre"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        value="{{ old('nombre', $categoria->nombre) }}" required>
                    @error('nombre')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Actualizar Categoría
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection