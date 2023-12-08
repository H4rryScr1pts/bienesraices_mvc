<?php 
namespace Controller;
use MVC\Router;
use Model\Admin;

class LoginController {
  
  /** Proceso de Autenticación de usuario
   * @param Router $router
   */
  public static function login(Router $router) : void {
    $errores = [];

    // Procedimiento de autenticación
    if($_SERVER["REQUEST_METHOD"] === "POST"){
      $auth = new Admin($_POST);

      // Errores para validación
      $errores = $auth->validar();
      
      if(empty($errores)) {
        // Verificar si el usuario existe
        $resultado = $auth->existeAdmin();

        if(!$resultado) {
          // Mensaje de error
          $errores = Admin::getErrores();
        } else {
          // Verificar el password
          $autenticado = $auth->comprobarPW($resultado);

          if($autenticado){
            // Autenticar al usuario
            $auth->autenticar();
          } else {
            // Password incorrecto (Mensaje de error)
            $errores = Admin::getErrores();
          }
        }
      }
    }

    // Importar la vista
    $router->render("/auth/login", [
      "errores" => $errores
    ]);
  }

  /** Cerrar Sesión
   * @return void
   */
  public static function logout() : void {
    session_start();
    $_SESSION = [];
    header("Location: ./");
  }
}
?>