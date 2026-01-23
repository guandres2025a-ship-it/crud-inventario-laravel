<div
    id="createModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <!-- Modal container -->
    <div
        class="relative w-full max-w-3xl mx-4 bg-white rounded-2xl shadow-2xl
               transform transition-all scale-95 opacity-0"
        id="createModalContent">

        <!-- Header -->
        <div class="flex items-center justify-between px-8 py-5 border-b">
            <h2 class="text-xl font-semibold text-gray-800">
                Crear nuevo producto
            </h2>
            <button
                onclick="closeCreateModal()"
                class="text-gray-400 hover:text-gray-600 text-2xl leading-none">
                &times;
            </button>
        </div>

        <!-- Body -->
        <form
            action="{{ route('productos.store') }}"
            method="POST"
            class="px-8 py-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="label">Nombre del producto</label>
                    <input
                        name="nombre"
                        class="input"
                        placeholder="Ej: Camiseta básica"
                        required>
                </div>

                <div>
                    <label class="label">Categoría</label>
                    <input
                        name="categoria"
                        class="input"
                        placeholder="Ej: Camisas"
                        required>
                </div>

                <div>
                    <label class="label">Precio</label>
                    <input
                        name="precio"
                        type="number"
                        step="0.01"
                        class="input"
                        placeholder="0.00"
                        required>
                </div>

                <div>
                    <label class="label">Stock</label>
                    <input
                        name="stock"
                        type="number"
                        class="input"
                        placeholder="Cantidad disponible"
                        required>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-4 mt-8 pt-6 border-t">
                <button
                    type="button"
                    onclick="closeCreateModal()"
                    class="btn-secondary">
                    Cancelar
                </button>

                <button type="submit" class="btn-primary">
                    Guardar producto
                </button>
            </div>
        </form>
    </div>
</div>