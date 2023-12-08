<main class="contenedor seccion contenido-centrado">
  <h1>Iniciar Sesión</h1>
  <?php foreach($errores as $error) { ?>
    <div class="alerta error"><?php echo $error;?></div>
    <?php 
    }   
  ?>
  <form class="formulario" method="POST" action="/login">
    <fieldset>
      <legend>Email y Password</legend>
      <label for="email">E-mail</label>
      <input type="email" placeholder="Tu email" id="email" name="email" />
      <label for="password">Password</label>
      <input
        type="password"
        placeholder="Tu password"
        id="contraseña"
        name="contrasña"/>
    </fieldset>
    <input type="submit" value="Iniciar Sesión" class="boton boton-verde" />
  </form>
</main>