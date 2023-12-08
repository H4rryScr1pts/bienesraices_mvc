<?php 
namespace Controller;

use Model\Propiedad;

class APIController {
  public static function propiedades() {
    $propiedades = Propiedad::all();
    echo json_encode($propiedades);
  }
}
?>