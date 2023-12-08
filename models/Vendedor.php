<?php 
namespace Model;

class Vendedor extends ActiveRecord {
  protected static $tabla = "vendedores";

  // Columnas de tabla en BD
  protected static $columasDB = ["id", "nombre", "apellido", "telefono"]; //Para identificar la forma de los datos

  // Atributos de clase
  public $id;
  public $nombre;
  public $apellido;
  public $telefono;

  /** Constructor de clase Propiedad
  * @param array
  * @return Propiedad
  */
  public function __construct($args = []) { 
    $this->id = $args["id"]?? null ;
    $this->nombre = $args["nombre"]??"";
    $this->apellido = $args["apellido"]??"";
    $this->telefono = $args["telefono"]??"";
  }

  /** Valida que todos los campos del formulario se encuentren llenos y si no lo estan retorna un arreglo con mensajes deerrores.
  * @return array
  */
  public function validar() : array { 
    if(!$this->nombre) {
      self::$errores[] = "El nombre es obligatorio";
    }
    if(!$this->apellido) {
      self::$errores[] = "El apellido es obligatorio";
    }
     if(!$this->telefono) {
      self::$errores[] = "El número de teléfono es obligatorio";
    return self::$errores;
    }

    // Expresión regular -> Buscar un patron dentro de un texto
    if(!preg_match("/[0-9]{10}/", $this->telefono)) {
      self::$errores[] = "Formato de teléfono no valido";
    }

    // Retornar los errores de validación
    return Vendedor::$errores;
  }
}
?>