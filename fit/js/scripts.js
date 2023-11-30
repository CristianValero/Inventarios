$(document).ready(function () {
  inicializarCarrito();

  $("#btnCarrito").on("click", function () {
    mostrarCarrito();
  });

  $(document).on("click", ".agregar", function () {
    agregarProducto($(this).data("id"));
  });
});

function inicializarCarrito() {
  if (localStorage.getItem("productos") == null) {
    localStorage.setItem("productos", JSON.stringify([]));
  }
}

function agregarProducto(id) {
  let productos =
    localStorage.getItem("productos") !== null
      ? JSON.parse(localStorage.getItem("productos"))
      : [];

  productos.push({ id: id });

  localStorage.setItem("productos", JSON.stringify(productos));

  actualizarContadorCarrito();
}

function actualizarContadorCarrito() {
  $("#carrito").text(JSON.parse(localStorage.getItem("productos")).length);
}

function mostrarCarrito() {}

// Manejar el clic en una categoría
$(document).on("click", ".nav-link", function () {
  const selectedCategory = $(this).attr("category");

  // Ocultar todos los productos
  $(".productos").hide();

  // Mostrar solo los productos de la categoría seleccionada
  if (selectedCategory === "all") {
    $(".productos").show();
  } else {
    $(`.productos[category='${selectedCategory}']`).show();
  }
});
