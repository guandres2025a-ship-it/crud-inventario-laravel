document.addEventListener("DOMContentLoaded", () => {
    fetch("/api/productos")
        .then((response) => response.json())
        .then((productos) => {
            renderProductos(productos);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});

function renderProductos(productos) {
    const tbody = document.getElementById("productos-body");
    tbody.innerHTML = "";

    productos.forEach((producto) => {
        
        if (!IS_ADMIN && producto.user_id !== USER_ID) {
            return;
        }

        const tr = document.createElement("tr");

        tr.innerHTML = `
            <td class="px-6 py-4">${producto.nombre}</td>
            <td class="px-6 py-4">${producto.categoria}</td>
            <td class="px-6 py-4">${producto.precio}</td>
            <td class="px-6 py-4">${producto.stock}</td>
        `;

        tbody.appendChild(tr);
    });
}
