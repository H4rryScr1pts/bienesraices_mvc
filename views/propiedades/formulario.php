<fieldset>
  <legend>Información general</legend>
  <label for="titulo">Titulo:</label>
  <input
    type="text"
    id="titulo"
    name="propiedad[titulo]"
    placeholder="Titulo propiedad"
    value="<?php echo s($propiedad->titulo);?>"/>
  <label for="precio">Precio:</label>
  <input
    type="number"
    id="precio"
    name="propiedad[precio]"
    placeholder="Precio"
    min="1"
    value="<?php echo s($propiedad->precio);?>"/>
  <label for="imagen">Imagen:</label>
  <input
    type="file"
    id="imagen"
    name="propiedad[imagen]"
    accept="image/jpeg, image/png"/>
    <?php if($propiedad->imagen) { ?>
      <img
      src="../../imagenes/<?php echo $propiedad->imagen?>"
      alt=""
      class="imagen-small"/>
      <?php 
      }
    ?>
  <label for="descripcion">Descripción</label>
  <textarea id="descripcion" name="propiedad[descripcion]">
    <?php echo s($propiedad->descripcion);?>
  </textarea>
</fieldset>
<fieldset>
  <legend>Información de la Propiedad</legend>
  <label for="habitaciones">Habitaciones:</label>
  <input
    type="number"
    id="habitaciones"
    placeholder="Ejem: 3"
    min="1"
    max="25"
    name="propiedad[habitaciones]"
    value="<?php echo s($propiedad->habitaciones);?>"/>
  <label for="wc">Baños:</label>
  <input
    type="number"
    id="wc"
    placeholder="Ejem: 3"
    min="1"
    max="25"
    name="propiedad[wc]"
    value="<?php echo s($propiedad->wc);?>"/>
  <label for="estacionamiento">Lugares Estacionamiento:</label>
  <input
    type="number"
    id="estacionamiento"
    placeholder="Ejem: 3"
    min="0"
    max="25"
    name="propiedad[estacionamiento]"
    value="<?php echo s($propiedad->estacionamiento);?>"/>
</fieldset>
<fieldset>
  <legend>Vendedor</legend>
  <label for="vendedor">Vendedor</label>
  <select name="propiedad[vendedores_Id]" id="vendedor">
    <option disabled selected value="">-- Seleccione --</option>
      <?php foreach($vendedores as $vendedor) { ?>
        <option 
          <?php echo $propiedad->vendedores_Id == $vendedor->id ? 'selected' : '';?> 
          value="<?php echo s($vendedor->id)?>">
          <?php echo s($vendedor->nombre). " " . s($vendedor->apellido);?>
        </option>
        <?php 
        }   
      ?>
  </select>
</fieldset>

