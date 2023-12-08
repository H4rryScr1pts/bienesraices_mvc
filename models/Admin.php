<?php 
namespace Model;

class Admin extends ActiveRecord {
  // Base de datos
  protected static $tabla = "usuario";
  protected static $columnasDB = ["id", "email", "contrasña"];

  public $id;
  public $email;
  public $contrasña;

  public function __construct($args = []) {
    $this->id = $args["id"]??null;
    $this->email = $args["email"]??null;
    $this->contrasña = $args["contrasña"]??null;
  }

  /** Validación de atributos del objeto
   * @return array
   */
  public function validar() : array {
    if(!$this->email) {
      self::$errores[] = "El email es obligatorio";
    }
    if(!$this->contrasña) {
      self::$errores[] = "El password es obligatorio";
    }
    return self::$errores;
  }

  /** Revisar si un usuario existe dentro de la base de datos */
  public function existeAdmin() {
    // Consulta para el usuario
    $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email. "' LIMIT 1";
    $resultado = self::$db->query($query);

    // Verificar si el usuario existe
    if(!$resultado->num_rows) {
      self::$errores[] = "El usuario No existe";
      return;
    } 
    return $resultado;
  }


  /** Comprueba el password que ingresa el usuario con el password guardado en el registro del usuario dentro de la base de datos
   * @return bool
   */
  public function comprobarPW($resultado) : bool {
    $usuario = $resultado->fetch_object();
    $autenticado = password_verify($this->contrasña, $usuario->contrasña);

    if(!$autenticado) {
      self::$errores[] = "El password es Incorrecto";
    }
    return $autenticado;
  }

  public function autenticar() {
    session_start();
    // Llenar el arreglo de la sesión
    $_SESSION["usuario"] = $this->email;
    $_SESSION["login"] = true;

    header("Location: ./admin");
  }
}
  ?>