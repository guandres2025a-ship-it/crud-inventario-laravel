<x-layout>
    <h1 class="text-xl font-bold mb-4">Editar Producto</h1>

    <form action="{{ route('productos.update', $producto) }}" method="POST" class="space-y-4 max-w-md">
        @csrf
        @method('PUT')
        <input type="text" name="nombre" value="{{ $producto->nombre }}" class="border p-2 w-full rounded">
        <input type="text" name="categoria" value="{{ $producto->categoria }}" class="border p-2 w-full rounded">
        <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" class="border p-2 w-full rounded">
        <input type="number" name="stock" value="{{ $producto->stock }}" class="border p-2 w-full rounded">
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Actualizar
        </button>
    </form>
</x-layout>
