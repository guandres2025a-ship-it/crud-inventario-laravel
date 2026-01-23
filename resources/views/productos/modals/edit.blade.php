<div
    id="editModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div
        id="editModalContent"
        class="bg-white w-full max-w-3xl rounded-2xl shadow-2xl
               transform transition-all scale-95 opacity-0">
        <!-- Header -->
        <div class="flex justify-between items-center px-8 py-5 border-b">
            <h3 class="text-xl font-semibold text-gray-800">Editar producto</h3>
            <button
                type="button"
                onclick="closeEditModal()"
                class="text-gray-400 hover:text-gray-600 text-2xl">
                &times;
            </button>
        </div>

        <!-- Body -->
        <form id="editForm" method="POST" class="px-8 py-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="label">Nombre</label>
                    <input id="editNombre" name="nombre" class="input">
                </div>

                <div>
                    <label class="label">Categoría</label>
                    <input id="editCategoria" name="categoria" class="input">
                </div>

                <div>
                    <label class="label">Precio</label>
                    <input id="editPrecio" name="precio" type="number" step="0.01" class="input">
                </div>

                <div>
                    <label class="label">Stock</label>
                    <input id="editStock" name="stock" type="number" class="input">
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-4 pt-6 border-t">
                <button
                    type="button"
                    onclick="closeEditModal()"
                    class="btn-secondary">
                    Cancelar
                </button>

                <button type="submit" class="btn-primary">
                    Actualizar producto
                </button>
            </div>
        </form>
    </div>
</div>