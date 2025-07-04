// Función para iniciar sesión según el correo y contraseña
function iniciarSesion() {
  const correo = document.getElementById("correo").value;
  const contrasena = document.getElementById("contrasena").value;

  // Simulación de un administrador (puedes añadir más roles si quieres)
  if (correo === "admin@kshop.com" && contrasena === "admin123") {
    // Guardar sesión (opcional)
    localStorage.setItem("usuarioLogueado", JSON.stringify({ rol: "admin" }));

    // Redirigir al panel del administrador
    window.location.href = "../Paneles/paneladmin.html";
  } else {
    alert("Correo o contraseña incorrectos.");
  }
  // Simulación de un avendedor
  if (correo === "vendedorkshop.com" && contrasena === "vendedor123") {
    // Guardar sesión (opcional)
    localStorage.setItem("usuarioLogueado", JSON.stringify({ rol: "vendedor" }));

    // Redirigir al panel del vendedor
    window.location.href = "../Paneles/panelvendedor.html";
  } else {
    alert("Correo o contraseña incorrectos.");
  }
}

  // Buscar usuario
  const usuario = usuarios.find(user => user.correo === correo && user.contrasena === contrasena);

  if (usuario) {
    // Guardar sesión en localStorage
    localStorage.setItem("usuarioLogueado", JSON.stringify(usuario));
    window.location.href = usuario.redireccion;
  } else {
    alert("Correo o contraseña incorrectos.");
  }

// Función para cerrar sesión
function cerrarSesion() {
  localStorage.removeItem("usuarioLogueado");
  window.location.href = "../index.html";
}

// Verificación automática de acceso (puedes usarla en cada panel)
function verificarSesion(rolEsperado) {
  const datos = localStorage.getItem("usuarioLogueado");
  if (!datos) {
    window.location.href = "../Iniciarsesion.html";
    return;
  }

  const usuario = JSON.parse(datos);
  if (usuario.rol !== rolEsperado) {
    alert("No tienes permisos para acceder a esta página.");
    window.location.href = "../Iniciarsesion.html";
  }
}


// Guardar el rol y redirigir al panel correspondiente
function iniciarSesion() {
  const correo = document.getElementById("correo").value;
  const contrasena = document.getElementById("contrasena").value;
  const rol = document.getElementById("rol").value;

  // Validación simple: puedes reemplazar esto con una validación real más adelante
  if (correo && contrasena && rol) {
    localStorage.setItem("usuarioRol", rol); // Guardar el rol en localStorage

    // Redirigir según el rol
    switch (rol) {
      case "cliente":
        window.location.href = "Panelcliente.html";
        break;
      case "vendedor":
        window.location.href = "Panelvendedor.html";
        break;
      case "admin":
        window.location.href = "paneladmin.html";
        break;
      default:
        alert("Rol no válido");
    }
  } else {
    alert("Por favor, completa todos los campos.");
  }
}

// Cerrar sesión y limpiar localStorage
function cerrarSesion() {
  localStorage.removeItem("usuarioRol");
  window.location.href = "../index.html"; // O redirige a login
}

// Validar que el usuario tiene permiso para estar en la página
function verificarAcceso(rolPermitido) {
  const rolUsuario = localStorage.getItem("usuarioRol");

  if (rolUsuario !== rolPermitido) {
    alert("Acceso denegado. Redirigiendo...");
    window.location.href = "../Iniciarsesion.html"; // Redirigir al login
  }
}

// Lógica para agregar al carrito (producto desde productos.html)
function agregarAlCarrito(producto) {
  let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
  carrito.push(producto);
  localStorage.setItem("carrito", JSON.stringify(carrito));
  alert("Producto agregado al carrito");
}

// Mostrar productos en el carrito (carrito.html)
function mostrarCarrito() {
  const contenedor = document.getElementById("lista-carrito");
  const totalSpan = document.getElementById("total-carrito");
  let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

  contenedor.innerHTML = "";
  let total = 0;

  carrito.forEach((item, index) => {
    const div = document.createElement("div");
    div.classList.add("carrito-item");
    div.innerHTML = `
      <img src="${item.imagen}" alt="${item.nombre}" />
      <div class="detalle">
        <h3>${item.nombre}</h3>
        <p>$${item.precio}</p>
        <button class="eliminar" onclick="eliminarProducto(${index})">Eliminar</button>
      </div>
    `;
    contenedor.appendChild(div);
    total += Number(item.precio);
  });

  totalSpan.textContent = `$${total}`;
}

// Eliminar producto por índice
function eliminarProducto(indice) {
  let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
  carrito.splice(indice, 1);
  localStorage.setItem("carrito", JSON.stringify(carrito));
  mostrarCarrito(); // Actualizar la vista
}

// Finalizar compra (requiere sesión cliente)
function finalizarCompra() {
  const rolUsuario = localStorage.getItem("usuarioRol");
  if (rolUsuario === "cliente") {
    alert("¡Gracias por su compra!");
    localStorage.removeItem("carrito");
    window.location.href = "Productos.html"; // Redirigir tras comprar
  } else {
    alert("Debes iniciar sesión como cliente para finalizar la compra.");
    window.location.href = "Iniciarsesion.html";
  }
}

// Simula un carrito en memoria
let carrito = [];

// Agrega producto al carrito
function agregarAlCarrito(nombre, precio) {
  carrito.push({ nombre, precio });
  alert(`Producto "${nombre}" agregado al carrito`);
}

// Elimina producto del carrito (por índice)
function eliminarDelCarrito(index) {
  if (index >= 0 && index < carrito.length) {
    carrito.splice(index, 1);
    mostrarCarrito();
  }
}

// Muestra el carrito (usar esta función en carrito.html)
function mostrarCarrito() {
  const contenedor = document.getElementById("lista-carrito");
  const total = document.getElementById("total-carrito");

  contenedor.innerHTML = "";
  let suma = 0;

  carrito.forEach((item, index) => {
    const div = document.createElement("div");
    div.classList.add("carrito-item");
    div.innerHTML = `
      <div class="detalle">
        <h3>${item.nombre}</h3>
        <p>Precio: $${item.precio}</p>
        <button class="eliminar" onclick="eliminarDelCarrito(${index})">Eliminar</button>
      </div>
    `;
    contenedor.appendChild(div);
    suma += parseFloat(item.precio);
  });

  total.innerHTML = `<h2>Total: $${suma.toFixed(2)}</h2>`;
}

// Simula proceso de compra
function comprar() {
  const sesionActiva = false; // Simulación. Cámbialo según login real.

  if (!sesionActiva) {
    alert("Debe iniciar sesión para completar la compra");
    window.location.href = "Iniciarsesion.html";
  } else {
    alert("Compra realizada con éxito");
    carrito = [];
    mostrarCarrito();
  }
}
// Este fragmento simula un login muy básico
function iniciarSesion() {
  const correo = document.getElementById("correo").value;
  const contrasena = document.getElementById("contrasena").value;
  const rol = document.getElementById("rol").value;

  if (correo && contrasena) {
    redirigirSegunRol(rol);
  } else {
    alert("Por favor, complete todos los campos.");
  }
}
 //Mostrar productos y eliminar en el carrito de compras//
// Obtener carrito desde localStorage
function obtenerCarrito() {
  return JSON.parse(localStorage.getItem("carrito")) || [];
}

// Guardar carrito en localStorage
function guardarCarrito(carrito) {
  localStorage.setItem("carrito", JSON.stringify(carrito));
}

// Agregar producto al carrito
function agregarAlCarrito(producto) {
  let carrito = obtenerCarrito();
  carrito.push(producto);
  guardarCarrito(carrito);
  alert("Producto agregado al carrito");
}

// Mostrar productos en carrito
function mostrarCarrito() {
  const lista = document.getElementById("lista-carrito");
  const total = document.getElementById("total-carrito");

  if (!lista || !total) return;

  lista.innerHTML = "";
  let carrito = obtenerCarrito();
  let totalPrecio = 0;

  if (carrito.length === 0) {
    lista.innerHTML = "<p>No hay productos en el carrito.</p>";
    total.textContent = "$0";
    return;
  }

  carrito.forEach((item, index) => {
    totalPrecio += item.precio;

    const div = document.createElement("div");
    div.className = "card mb-3";
    div.innerHTML = `
      <div class="row g-0 align-items-center">
        <div class="col-3">
          <img src="${item.imagen}" class="img-fluid rounded-start" alt="${item.nombre}">
        </div>
        <div class="col-6">
          <div class="card-body">
            <h5 class="card-title">${item.nombre}</h5>
            <p class="card-text">$${item.precio.toLocaleString()}</p>
          </div>
        </div>
        <div class="col-3 text-end pe-3">
          <button class="btn btn-sm btn-outline-danger" onclick="eliminarDelCarrito(${index})">Eliminar</button>
        </div>
      </div>
    `;
    lista.appendChild(div);
  });

  total.textContent = "$" + totalPrecio.toLocaleString();
}

// Eliminar producto del carrito
function eliminarDelCarrito(index) {
  let carrito = obtenerCarrito();
  carrito.splice(index, 1);
  guardarCarrito(carrito);
  mostrarCarrito();
}

// Vaciar carrito
function vaciarCarrito() {
  localStorage.removeItem("carrito");
  mostrarCarrito();
}

// Finalizar compra
function finalizarCompra() {
  alert("¡Gracias por tu compra!");
  vaciarCarrito();
}

// Mostrar carrito al cargar la página
document.addEventListener("DOMContentLoaded", mostrarCarrito);
