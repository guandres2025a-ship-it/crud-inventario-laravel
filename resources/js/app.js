document.addEventListener("DOMContentLoaded", () => {
    /* ======================
       CREATE MODAL
    ====================== */
    window.openCreateModal = () =>
        toggleModal("createModal", "createModalContent", true);
    window.closeCreateModal = () =>
        toggleModal("createModal", "createModalContent", false);

    /* ======================
       PRODUCT MODAL
    ====================== */
    const modal = document.getElementById("productModal");
    const content = document.getElementById("productModalContent");
    const form = document.getElementById("productForm");

    const title = document.getElementById("modalTitle");
    const submit = document.getElementById("modalSubmit");
    const method = document.getElementById("modalMethod");

    const f = {
        nombre: document.getElementById("modalNombre"),
        categoria: document.getElementById("modalCategoria"),
        precio: document.getElementById("modalPrecio"),
        stock: document.getElementById("modalStock"),
    };

    function openBase(p) {
        if (!p) return;

        f.nombre.value = p.nombre ?? "";
        f.categoria.value = p.categoria ?? "";
        f.precio.value = p.precio ?? "";
        f.stock.value = p.stock ?? "";

        modal.classList.remove("hidden");
        modal.classList.add("flex");

        setTimeout(() => {
            content.classList.remove("scale-95", "opacity-0");
        }, 10);
    }

    window.openEdit = (p) => {
        openBase(p);
        title.innerText = "Editar Producto";
        submit.innerText = "Guardar cambios";
        submit.classList.remove("hidden", "bg-red-600");
        submit.classList.add("bg-blue-600");

        method.value = "PUT";
        form.action = `/productos/${p.id}`;

        Object.values(f).forEach((i) => (i.disabled = false));
    };

    window.openView = (p) => {
        openBase(p);
        title.innerText = "Detalle del Producto";
        submit.classList.add("hidden");

        Object.values(f).forEach((i) => (i.disabled = true));
    };

    /* =========================
   DELETE CONFIRM MODAL
========================= */
    window.openDeleteConfirm = (producto) => {
        const modal = document.getElementById("deleteModal");
        const form = document.getElementById("deleteForm");
        const name = document.getElementById("deleteProductName");

        name.textContent = producto.nombre;
        form.action = `/productos/${producto.id}`;

        modal.classList.remove("hidden");
        modal.classList.add("flex");
    };

    window.closeDeleteConfirm = () => {
        const modal = document.getElementById("deleteModal");
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    };

    window.closeProductModal = () =>
        toggleModal("productModal", "productModalContent", false);

    function toggleModal(m, c, open) {
        const modal = document.getElementById(m);
        const content = document.getElementById(c);

        if (open) {
            modal.classList.remove("hidden");
            modal.classList.add("flex");
            setTimeout(
                () => content.classList.remove("scale-95", "opacity-0"),
                10,
            );
        } else {
            content.classList.add("scale-95", "opacity-0");
            setTimeout(() => {
                modal.classList.add("hidden");
                modal.classList.remove("flex");
            }, 200);
        }
    }
});
