<?php 
/** CONSTANTES */
define("TEMPLATES_URL", __DIR__."/templates");
define("FUNCIONES_URL", __DIR__."funciones.php");

  /** Autenticación de usuario
  * @return  bool
  */
  function estaAutenticado() : bool {
    session_start();
    if(!$_SESSION["login"]) { 
        header("Location: /bienesraices_e/index.php");
    }
    return false;
  }
    
  /** Función para visualizar resultados formateados. La función muestra un resultado y detiene toda la ejecución del programa.
  * @return void
  */
  function debuguear(mixed $var) : void {
    echo "<pre>";
    var_dump($var);
    echo "<pre>";
    exit;
  }

  /** Función que sanitiza el HTML y retorna datos sanitizados
   * @param string $html
   * @return string 
  */
  function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
  }

  /** Valida el tipo de contenido en la entrada de datos al eliminar registros
   * @param string $tipo
   * @return bool
  */
  function validarContenido(string $tipo) : bool {
    $tipos = ["vendedor", "propiedad"];
    return in_array($tipo, $tipos);
  }

  /** Muestra mensajes de ejecución de acciones dentro del crud
   * @return string
   * @param int $code
  */
  function mostrarMensaje(int $codigo) : string {
    $mensaje = "";
    switch($codigo) {
        case 1:
            $mensaje = "Creado Correctamente";
            break;
        case 2:
            $mensaje = "Actualizado Correctamente";
            break;
        case 3:
            $mensaje = "Eliminado Correctamente";
            break;
        default:
            $mensaje = false;
            break;                
    }
    return $mensaje;
  }

  /** Valida alguna entrada de id's por metodo get y redirecciona en caso de no pasar la validación
   * @param string $url
   * @return int 
   */
  function valOred(string $url) : int {
    // Filtrar el id por dato entero
    $id = filter_var($_GET["id"], FILTER_VALIDATE_INT);

    // Validación del id
    if(!$id) {
      header("Location: $url");
    }
    return $id;
  }
?>