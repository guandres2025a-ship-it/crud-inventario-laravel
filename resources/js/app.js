import '../css/app.css';

/* =========================
   CREATE MODAL
========================= */
window.openCreateModal = () => {
    const modal = document.getElementById('createModal');
    const content = document.getElementById('createModalContent');

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    }, 10);
};

window.closeCreateModal = () => {
    const modal = document.getElementById('createModal');
    const content = document.getElementById('createModalContent');

    content.classList.add('scale-95', 'opacity-0');
    content.classList.remove('scale-100', 'opacity-100');

    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 200);
};

/* =========================
   EDIT MODAL
========================= */
window.openEditModal = (producto) => {
  console.log('EDIT CLICK', producto);
    const modal = document.getElementById('editModal');
  const content = document.getElementById('editModalContent');
  

    // Acción del form
    document.getElementById('editForm').action = `/productos/${producto.id}`;

    // Valores
    document.getElementById('editNombre').value = producto.nombre;
    document.getElementById('editCategoria').value = producto.categoria;
    document.getElementById('editPrecio').value = producto.precio;
    document.getElementById('editStock').value = producto.stock;

    // Mostrar modal
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    }, 10);
};

window.closeEditModal = () => {
    const modal = document.getElementById('editModal');
    const content = document.getElementById('editModalContent');

    content.classList.add('scale-95', 'opacity-0');
    content.classList.remove('scale-100', 'opacity-100');

    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 200);
};
