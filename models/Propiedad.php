<?php 
namespace Model;

/** Clase de Propiedades
 * @author leonardoTH <harrywilsonth@gmail.com>
 */
class Propiedad extends ActiveRecord { 
  protected static $tabla = "propiedades";

  // Columnas de tabla en BD  
  protected static $columasDB = ["id", "titulo", "precio", "imagen", "descripcion", "habitaciones", "wc", "estacionamiento", "creado", "vendedores_Id"]; //Para identificar la forma de los datos

  // Atributos de clase
  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedores_Id;

  /** Constructor de clase Propiedad
   * @param array
   * @return Propiedad
   */
  public function __construct($args = []) { 
    $this->id = $args["id"]?? null ;
    $this->titulo = $args["titulo"]??"";
    $this->precio = $args["precio"]??"";
    $this->imagen = $args["imagen"]??"";
    $this->descripcion = $args["descripcion"]??"";
    $this->habitaciones = $args["habitaciones"]??"";
    $this->wc = $args["wc"]??"";
    $this->estacionamiento = $args["estacionamiento"]??"";
    $this->creado = date("y/m/d");
    $this->vendedores_Id = $args["vendedores_Id"]??1;
  }

  /** Valida que todos los campos del formulario se encuentren llenos y si no lo estan retorna un arreglo con mensajes de errores.
   * @return array
   */
  public function validar() : array { 
    if(!$this->titulo) {
        self::$errores[] = "El titulo es obligatorio";
    }
    if(!$this->precio) {
        self::$errores[] = "El precio es obligatorio";
    }
     if(strlen($this->descripcion) < 30) {
        self::$errores[] = "La descripción es oblogatoria y debe contener mínimo 30 carcateres";
    }
     if(!$this->habitaciones) {
        self::$errores[] = "El número de habitaciones es obligatorio";
    }
    if(!$this->wc) {
       self::$errores[] = "El número de baños es obligatorio";
    }
    if(!$this->estacionamiento) {
        self::$errores[] = "El número de estacionamientos es obligatorio";
    }
    if(!$this->vendedores_Id) {
        self::$errores[] = "Debe de seleccionar un vendedor"; 
    }

    // Validaciones para imagen
    if(!$this->imagen) {
      self::$errores[] = "La imagen de la propiedad es oblgatoria";
    } 
    return self::$errores;
  }
}
?>
