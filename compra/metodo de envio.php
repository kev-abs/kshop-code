<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Método de Envío</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../Estilos/stilos.css" />
</head>

<body>
  <!-- Encabezado -->
  <header class="header">
    <div class="logo">K-SHOP</div>
    <form action="/buscar" method="GET" class="form-busqueda">
      <input type="text" name="q" placeholder="Buscar..." />
    </form>
    <nav class="navbar">
      <ul>
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="../Barra de navegacion/Productos.php">Productos</a></li>
        <li><a href="../Barra de navegacion/servicios.php">Servicios</a></li>
        <li><a href="../Barra de navegacion/contactos.php">Contáctanos</a></li>
      </ul>
    </nav>
  </header>

  <main class="container my-5">
    <div class="row">
      <!-- Columna izquierda: Método de envío -->
      <div class="col-md-8">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Método de envío</li>
            <li class="breadcrumb-item">Método de pago</li>
            <li class="breadcrumb-item">Resumen</li>
          </ol>
        </nav>

        <h2 class="fw-bold mb-4">Elige un método de envío</h2>

        <div class="list-group mb-4">
          <label class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              <input type="radio" name="envio" value="tienda" class="form-check-input me-2 envio-opcion" />
              <strong>Express</strong><br />
              <small class="text-muted">Fecha estimada</small>
            </div>
            <span class="fw-bold">$22,000 COP</span>
          </label>

          <label class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              <input type="radio" name="envio" value="estandar" class="form-check-input me-2 envio-opcion" />
              <strong>Estándar</strong><br />
              <small class="text-muted">Fecha estimada</small>
            </div>
            <span class="fw-bold">$10,000 COP</span>
          </label>
        </div>

        <a href="envio_formulario.php" id="continuarBtn" class="btn btn-dark btn-lg w-100 disabled" tabindex="-1"
          aria-disabled="true">CONTINUAR</a>
      </div>

      <!-- Columna derecha: Resumen de compra -->
      <div class="col-md-4 resumen-fijo">
        <h5 class="fw-bold">Resumen de la compra (0)</h5>
        <div class="d-flex mb-3">
          <img src="../Imagenes/camiseta boxy.jpeg" alt="Producto" class="img-thumbnail me-3" style="width: 100px" />
          <div>
            <p class="mb-0 fw-bold">
              0 COP 
            </p>
            <p class="mb-1 small">Descripcion</p>
            <p class="small text-muted mb-0">Talla: M</p>
          </div>
        </div>
        <hr />
        <div class="d-flex justify-content-between fw-bold">
          <span>Subtotal</span>
          <span>0 COP</span>
        </div>
        <div class="d-flex justify-content-between fw-bold mt-2">
          <span>Total <small class="text-muted">(IVA Incluido)</small></span>
          <span>0 COP</span>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <div class="container">
      <div class="mb-3">
        <a href="#" class="text-white me-3">Términos y condiciones</a>
        <a href="#" class="text-white me-3">Política de privacidad</a>
        <a href="#" class="text-white me-3">¿Necesitas ayuda?</a>
      </div>
      <p class="mb-0">
        &copy; 2025 Tienda K-Shop - Todos los derechos reservados
      </p>
    </div>
  </footer>

  <script>
    document.querySelectorAll(".envio-opcion").forEach((radio) => {
      radio.addEventListener("change", function () {
        const continuarBtn = document.getElementById("continuarBtn");
        continuarBtn.classList.remove("disabled");
        continuarBtn.removeAttribute("aria-disabled");
        continuarBtn.setAttribute("tabindex", "0");
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../Funciones/funciones.js" defer></script>
</body>

</html>