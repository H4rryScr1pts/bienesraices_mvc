<main class="contenedor seccion">
  <h1>Contacto</h1>
  <?php if($mensaje) {?>
      <p class="alerta exito"><?php echo $mensaje?></p>
    <?php 
    }
  ?>
  <picture>
    <source srcset="/build/img/destacada3.webp" type="image/webp" />
    <source srcset="/build/img/destacada3.jpg" type="image/jpeg" />
    <img loading="lazy" src="/build/img/destacada3.jpg" alt="imagen contacto" />
  </picture>
  <h2>Llene el formulario de contacto</h2>
  <form action="./contacto" class="formulario" method="POST">
    <fieldset>
      <legend>Información personal</legend>
      <label for="nombre">Nombre</label>
      <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required/>
      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje" name="contacto[mensaje]"></textarea>
    </fieldset>
    <fieldset>
      <legend>Información sobre la propiedad</legend>
      <label for="opciones">Vende o Compra</label>
      <select id="opciones" name="contacto[tipo]" required>
        <option value="" disabled selected>--Seleccione--</option>
        <option value="compra">Compra</option>
        <option value="vende">Vende</option>
      </select>
      <label for="precio">Precio o Presupuesto</label>
      <input
        type="number"
        placeholder="Tu precio o presupuesto"
        id="presupuesto"
        min="1"
        name="contacto[precio]"  required/>
    </fieldset>
    <fieldset>
      <legend>Contacto</legend>
      <p>¿Como desea ser conactado?</p>
      <div class="forma-contacto">
        <label for="contactar-telefono">Telefono</label>
        <input
          type="radio"
          value="telefono"
          id="contactar-telefono"
          name="contacto[contacto]"/>
        <label for="contactar-email">E-mail</label>
        <input
          type="radio"
          value="email"
          id="contactar-email"
          name="contacto[contacto]"/>
      </div>
      <div id="contacto"></div>
    </fieldset>
    <input type="submit" value="enviar" class="boton-verde" />
  </form>
</main>