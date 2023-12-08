<main class="contenedor seccion">
  <h1>Zona de Administración</h1>
  <!-- Mensajes de ejecución -->
  <?php 
  if($resultado) {
    $mensaje = mostrarMensaje(intval($resultado));
    if($mensaje) { ?>
  <p class="alerta exito"><?php echo s($mensaje); ?></p>
  <?php 
    }
  }
  ?>
  <a href="/propiedades-crear" class="btn btn-primary btn-lg">Nueva Propiedad</a>
  <a href="/vendedores-crear" class="btn btn-success btn-lg">Nuevo(a) Vendedor</a>
  <!-- Propiedades -->
  <h2>Propiedades</h2>
  <?php 
    if(count($propiedades) === 0) { ?>
  <div class="alerta advertencia">Actualmente no hay propiedades registradas</div>
  <?php
    } else { ?>
  <!--Mostrar tabla de propiedades -->
  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
    }
  ?>
      <?php foreach($propiedades as $propiedad) { ?>
      <tr>
        <td><?php echo $propiedad->id?></td>
        <td><?php echo $propiedad->titulo?></td>
        <td>
          <img src="../imagenes/<?php echo $propiedad->imagen?>" class="imagen-tabla" alt="Imagen propiedad" />
        </td>
        <td><?php echo "$ " . number_format($propiedad->precio, 2)?></td>
        <td>
          <form action="propiedades/eliminar" class="w-100" method="POST">
            <input type="hidden" name="id" value="<?php echo $propiedad->id?>" />
            <input type="hidden" name="tipo" value="propiedad" />
            <input type="submit" class="boton-rojo-block" value="Eliminar" />
          </form>
          <a href="/propiedades-actualizar?id=<?php echo $propiedad->id?>" class="boton-amarillo-block">Editar</a>
        </td>
      </tr>
      <?php   
    }
  ?>
    </tbody>
  </table>
  <h2>Vendedores</h2>
  <?php 
    if(count($vendedores) === 0) { ?>
  <div class="alerta advertencia">Actualmente no hay vendedores registrados</div>
  <?php
    } else { ?>
  <!--Mostrar tabla de vendedores -->
  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php 
    }
  ?>
      <?php 
    foreach($vendedores as $vendedor) { ?>
      <tr>
        <td><?php echo $vendedor->id?></td>
        <td><?php echo $vendedor->nombre . " " . $vendedor->apellido?></td>
        <td><?php echo $vendedor->telefono?></td>
        <td>
          <form action="vendedores/eliminar" class="w-100" method="POST">
            <input type="hidden" name="id" value="<?php echo $vendedor->id ?>" />
            <input type="hidden" name="tipo" value="vendedor" />
            <input type="submit" class="boton-rojo-block" value="Eliminar" />
          </form>
          <a href="/vendedores-actualizar?id=<?php echo $vendedor->id?>" class="boton-amarillo-block">Editar</a>
        </td>
      </tr>
      <?php 
    } 
  ?>
    </tbody>
  </table>
</main>