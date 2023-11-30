$(document).ready(function () {
  // Esta parte maneja la solicitud AJAX cuando se carga la página del carrito
  if (localStorage.getItem("productos") != null) {
    let array = JSON.parse(localStorage.getItem("productos"));
    if (array.length > 0) {
      $.ajax({
        url: "carrito.php",
        type: "POST",
        async: true,
        data: {
          action: "buscar",
          data: array,
        },
        success: function (response) {
          try {
            response = response.replace(/\\u00c1/g, "Á");
            const res = JSON.parse(response);

            // Limpia la tabla del carrito antes de agregar nuevas filas
            $("#tblCarrito").html("");

            // Recorre los datos y agrega cada producto a la tabla
            res.datos.forEach((element) => {
              agregarProductoATabla(element);
            });

            // Actualiza el total a pagar
            $("#total_pagar").text(res.total);
          } catch (error) {
            console.error("Error al analizar JSON:", error);
          }
        },
      });
    }
  }

  // Esta parte maneja el clic en el botón de vaciar carrito
  $("#btnVaciar").on("click", function () {
    // Vacía el carrito en el localStorage
    localStorage.removeItem("productos");
    // Actualiza el contador del carrito
    actualizarContadorCarrito();
    // Limpia la tabla del carrito
    $("#tblCarrito").html("");
    // Restablece el total a pagar a 0.00
    $("#total_pagar").text("0.00");
  });
});

// Función para agregar un producto a la tabla
function agregarProductoATabla(producto) {
  // Construye la fila HTML con la información del producto
  const fila = `
        <tr>
          <td>${producto.id}</td>
          <td>${producto.nombre}</td>
          <td><img src="img/${producto.imagen}" alt="${producto.nombre}" style="width: 50px; height: 50px;"></td>
          <td>${producto.cantidad}</td>
          <td>${producto.precio}</td>
        </tr>
      `;

  // Agrega la fila al final del tbody
  $("#tblCarrito").append(fila);
}

// Función para actualizar el contador del carrito
function actualizarContadorCarrito() {
  if (localStorage.getItem("productos") != null) {
    let array = JSON.parse(localStorage.getItem("productos"));
    // Actualiza el número en el botón de carrito
    $("#carrito").text(array.length);
  }
}
