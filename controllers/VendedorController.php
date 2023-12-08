<?php 
namespace Controller;

use Model\Vendedor;
use MVC\Router;

class VendedorController {

  /** Controlador para la creación de vendedores 
   * @param Router $router
  */
  public static function crear(Router $router) {
    $vendedor = new Vendedor;
    $errores = Vendedor::getErrores();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
      // Nueva instancia de vendedor
      $vendedor = new Vendedor($_POST["vendedor"]);
    
      // Validar campos vacios
      $errores = $vendedor->validar();
    
      // Inseción de dato en caso de formulario lleno
      if(empty($errores)) {
        $vendedor->guardar();
      }
    }

    $router->render("vendedores/crear", [
      "vendedor" => $vendedor,
      "errores" => $errores
    ]);
  }

  /** Controlador para la actualización de vendedores
   * @param Router $router
   */
  public static function actualizar(Router $router) {
    $errores = Vendedor::getErrores();
    $id = valOred("../admin");
    $vendedor = Vendedor::find($id);

    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Procedimiento de actualización de vendedor
      $args = $_POST["vendedor"];
    
      // Sincronizar el objeto en memoria con lo que el usuario llenó
      $vendedor->sincronizar($args);
    
      // Validación de formulario
      $errores = $vendedor->validar();
    
      // Guardar cambios
      if(empty($errores)) {
        $vendedor->guardar();
      }
    
    }

    $router->render("vendedores/actualizar", [
      "vendedor" => $vendedor,
      "errores" => $errores
    ]);
  }

  /** Controlador para la eliminación de vendedores */
  public static function eliminar() {
    // Validar entrada de datos por metodo _POST
    if($_SERVER["REQUEST_METHOD"] === "POST") {
      // Filtrar el id
      $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
      // Validación de id
      if($id) {
        // Validar el tipo de registro a eliminar
        $tipo = $_POST["tipo"];
        // Si hay un id valido con un tipo de registro valido, se elimina el vendedor
        if(validarContenido($tipo)) {
          $vendedor = Vendedor::find($id);
          $vendedor->eliminar();
        }
      }
    }
  }
}
?>