<x-layout>
    <h1 class="text-xl font-bold mb-4">Crear Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST" class="space-y-4 max-w-md">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" class="border p-2 w-full rounded">
        <input type="text" name="categoria" placeholder="Categoría" class="border p-2 w-full rounded">
        <input type="number" step="0.01" name="precio" placeholder="Precio" class="border p-2 w-full rounded">
        <input type="number" name="stock" placeholder="Stock" class="border p-2 w-full rounded">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Guardar
        </button>
    </form>
</x-layout>
