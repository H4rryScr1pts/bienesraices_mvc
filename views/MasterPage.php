<!-- MASTER PAGE -->
<?php 
  // Sesion para modificaciones en modo administracion
  if(!isset($_SESSION)) 
    session_start();
  
  $auth = $_SESSION["login"]??null;

  if(!isset($inicio)) {
    $inicio = false;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienes Raices</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
  <!-- Header -->
  <header class="header <?php echo $inicio ? "inicio" : "";?>">
    <div class="contenedor contenido-header">
      <div class="barra">
        <a href="/">
          <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
        </a>
        <div class="movile-menu">
          <img src="/build/img/barras.svg" alt="icono menu-responsive">
        </div>
        <div class="derecha">
          <abbr title="Cambiar Modo"><img class="dark-mode-btn" src="/build/img/dark-mode.svg" alt=""></abbr>
          <nav class="navegacion">
            <a href="/nosotros">Nosotros</a>
            <a href="/propiedades">Propiedades</a>
            <a href="/blog">Blog</a>
            <a href="/contacto">Contacto</a>
            <?php if($auth) { ?>
            <a href="/admin">Administración</a>
            <a href="/logout">Cerrar Sesión</a>
            <?php 
              }
            ?>
          </nav>
        </div>
      </div> <!-- Barra -->
      <?php if($inicio) { ?>
      <h1>Venta de Casas y Departamentos de Lujo</h1>
      <?php 
          }
        ?>
    </div>
  </header>

  <!-- Mostrar contenido especifico de cada página -->
  <?php echo $contenido; ?>

  <!-- Footer -->
  <footer class="footer seccion">
    <div class="contenedor contenedor-footer">
      <nav class="navegacion">
        <a href="/nosotros">Nosotros</a>
        <a href="/anuncios">Anuncios</a>
        <a href="/blog">Blog</a>
        <a href="/contacto">Contacto</a>
      </nav>
    </div>
    <p class="copyright">Todos los derechos reservados. 20<?php echo date("y");?> &copy;</p>
  </footer>
  <script src="/build/js/bundle.min.js"></script>
  <script src="https://www.youtube.com/iframe_api"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
</body>

</html>