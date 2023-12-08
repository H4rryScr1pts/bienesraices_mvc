<main class="contenedor seccion fondo">
  <h1>Registrar Vendedor(a)</h1>
  <a href="/admin" class="boton boton-verde">Volver</a>
  <?php // Mostrar errorres de validacion
    foreach($errores as $error){ ?>
  <div class="alerta error">
    <?php echo $error;?>
  </div>
  <?php 
    }
  ?>
  <form action="../vendedores/crear" class="formulario" method="POST" enctype="multipart/form-data">
    <?php include "formulario.php"; ?>
    <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
  </form>
</main>