<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Envío a Domicilio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <li><a href="Productos.php">Productos</a></li>
        <li><a href="servicios.php">Servicios</a></li>
        <li><a href="contactos.php">Contacto</a></li>
      </ul>
    </nav>
  </header>

  <!-- Cuerpo principal -->
  <main class="container my-5">
    <div class="row">
      <!-- Columna izquierda: formulario de datos -->
      <div class="col-md-8">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Método de envío</a></li>
            <li class="breadcrumb-item active" aria-current="page">Método de pago</li>
            <li class="breadcrumb-item">Resumen</li>
          </ol>
        </nav>

        <h2 class="fw-bold">Envío estándar a domicilio</h2>

        <!-- Reemplaza el bloque <form> por este -->
        <form action="pago.php" method="POST">
          <h5 class="mt-4">Datos Personales</h5>
          <div class="row g-3">
            <div class="col-md-6">
              <label>Nombre</label>
              <input type="text" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>Apellidos</label>
              <input type="text" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>E-mail</label>
              <input type="email" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>Telefono</label>
              <input type="email" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>Tipo de documento</label>
              <select class="form-select" required>
                <option value="CC">Cédula</option>
                <option value="TI">Tarjeta de Identidad</option>
              </select>
            </div>
            <div class="col-md-6">
              <label>Número de documento</label>
              <input type="text" class="form-control" required>
            </div>
          </div>

          <h5 class="mt-5">Dirección de envío</h5>
          <div class="row g-3">
            <div class="col-12">
              <input type="text" class="form-control" placeholder="Calle y número" required>
            </div>
            <div class="col-12">
              <input type="text" class="form-control" placeholder="Escalera, piso... (Opcional)">
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Código postal" required>
            </div>
            <div class="col-md-6">
              <select class="form-select" required>
                <option value="">Seleccione departamento</option>
                <option value="Amazonas">Amazonas</option>
                <option value="Antioquia">Antioquia</option>
                <option value="Arauca">Arauca</option>
                <option value="Atlántico">Atlántico</option>
                <option value="Bolívar">Bolívar</option>
                <option value="Boyacá">Boyacá</option>
                <option value="Caldas">Caldas</option>
                <option value="Caquetá">Caquetá</option>
                <option value="Casanare">Casanare</option>
                <option value="Cauca">Cauca</option>
                <option value="Cesar">Cesar</option>
                <option value="Chocó">Chocó</option>
                <option value="Córdoba">Córdoba</option>
                <option value="Cundinamarca">Cundinamarca</option>
                <option value="Guainía">Guainía</option>
                <option value="Guaviare">Guaviare</option>
                <option value="Huila">Huila</option>
                <option value="La Guajira">La Guajira</option>
                <option value="Magdalena">Magdalena</option>
                <option value="Meta">Meta</option>
                <option value="Nariño">Nariño</option>
                <option value="Norte de Santander">Norte de Santander</option>
                <option value="Putumayo">Putumayo</option>
                <option value="Quindío">Quindío</option>
                <option value="Risaralda">Risaralda</option>
                <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                <option value="Santander">Santander</option>
                <option value="Sucre">Sucre</option>
                <option value="Tolima">Tolima</option>
                <option value="Valle del Cauca">Valle del Cauca</option>
                <option value="Vaupés">Vaupés</option>
                <option value="Vichada">Vichada</option>
              </select>
            </div>
            <div class="col-md-6">
              <label>Municipio</label>
              <select class="form-select" name="municipio" required>
                <option value="">Seleccione municipio</option>

                <option>Medellín</option>
                <option>Bello</option>
                <option>Itagüí</option>
                <option>Envigado</option>
                <option>Apartadó</option>
                <option>Turbo</option>

                <option>Barranquilla</option>
                <option>Soledad</option>
                <option>Malambo</option>
                <option>Puerto Colombia</option>
                <option>Bogotá</option>
                </optgroup>
              </select>
            </div>
          </div>

          <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="metodo de envio.php" class="btn btn-link">&lt; Volver a método de envío</a>
            <button type="submit" class="btn btn-dark px-5">CONTINUAR</button>
          </div>
        </form>

      </div>

      <!-- Columna derecha: Resumen -->
      <div class="col-md-4">
        <div class="resumen-fijo">
          <h5 class="fw-bold">Resumen de la compra (1)</h5>
          <div class="d-flex mb-3">
            <img src="https://via.placeholder.com/100x100" alt="Producto" class="img-thumbnail me-3"
              style="width: 100px;">
            <div>
              <p class="mb-0 text-danger fw-bold">0 COP <del class="text-muted">0 COP</del></p>
              <p class="mb-1 small">Descripcion</p>
              <p class="small text-muted mb-0">Talla: #</p>
            </div>
          </div>
          <hr>
          <div class="d-flex justify-content-between fw-bold">
            <span>Subtotal</span>
            <span>0 COP</span>
          </div>
          <div class="d-flex justify-content-between fw-bold">
            <span>Total <small>(IVA incluido)</small></span>
            <span>0 COP</span>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
      <div class="mb-3">
        <a href="#" class="text-white me-3">Términos y condiciones</a>
        <a href="#" class="text-white me-3">Política de privacidad</a>
        <a href="#" class="text-white me-3">¿Necesitas ayuda?</a>
      </div>
      <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>