<x-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Productos</h1>
        <a href="{{ route('productos.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
           Nuevo Producto
        </a>
    </div>

    <table class="min-w-full bg-white border">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border">Nombre</th>
                <th class="py-2 px-4 border">Categoría</th>
                <th class="py-2 px-4 border">Precio</th>
                <th class="py-2 px-4 border">Stock</th>
                <th class="py-2 px-4 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr class="border-t">
                <td class="py-2 px-4">{{ $producto->nombre }}</td>
                <td class="py-2 px-4">{{ $producto->categoria }}</td>
                <td class="py-2 px-4">${{ $producto->precio }}</td>
                <td class="py-2 px-4">{{ $producto->stock }}</td>
                <td class="py-2 px-4 flex gap-2">
                    <a href="{{ route('productos.edit', $producto) }}"
                       class="text-blue-600 hover:underline">Editar</a>
                    <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
