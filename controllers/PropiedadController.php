<?php 

namespace Controller;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
  /** Mostrar la vista principal de administracións
   * @param Router $router
  */
  public static function index(Router $router) : void { // Objeto probeniente del archivo principal (index.php)
    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();
    $resultado = $_GET["resultado"] ?? null;

    // Vista a mostrar con el contenido llamado desde el modelo
    $router->render("propiedades/admin", [
      "propiedades" => $propiedades,
      "resultado" => $resultado,
      "vendedores" => $vendedores
    ]);
  }

  /** Controlador para la creación de una propiedad. Muestra la vista de la creación de propiedades y ejecuta el modelo Propiedad para realizar registros en la base de datos.
   * @param Router $router
  */
  public static function crear(Router $router) {
    // Recursos para el controlador
    $propiedad = new Propiedad;
    $vendedores = Vendedor::all();
    $errores = Propiedad::getErrores();

    // Procedimiento de creación de propiedad (Vía POST)
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      // Creando objeto de tipo Propiedad con datos del formulario -> via $_POST
      $propiedad = new Propiedad($_POST["propiedad"]);

      /* SUBIDA DE ARCHIVOS */ 
      // Crear nombre unico para imagenes dentro del servidor
      $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

      /** Setear la imagen */
      // Realiza un rezize a la imagen con Intervention\Image
      if($_FILES["propiedad"]["tmp_name"]["imagen"]) {
        $image = Image::make($_FILES["propiedad"]["tmp_name"]["imagen"])->fit(800, 600);
        $propiedad->setImage($nombreImagen);
      }

      // Validar formulario de creacion de popiedad
      $errores = $propiedad->validar(); 

      // Validacion de campos vacios en el formulario
      if(empty($errores)) {
          // Crea una carpeta en el servidor para subir las imagenes de propiedades
          if(!is_dir("../public/imagenes")) {
              mkdir("../public/imagenes");
          }
          // Guarda la imagen en el servidor
          $image->save("../public/imagenes/" . $nombreImagen);

          // Guarda en la BD
          $propiedad->guardar();
      }
    }

    // Importar la vista con la información proveniente del controlador
    $router->render("propiedades/crear", [
      "propiedad" => $propiedad,
      "vendedores" => $vendedores,
      "errores" => $errores
    ]);
  }

  /** Controlador para la actualización de propiedades 
   * @param Router $router
  */
  public static function actualizar(Router $router) {
    $id = valOred("../admin");
    $propiedad = Propiedad::find($id);
    $errores = Propiedad::getErrores();
    $vendedores = Vendedor::all();

    // Procedimiento de actualización de propiedad (Metodo $_POST)
    if($_SERVER["REQUEST_METHOD"] === "POST") {

      // Arreglo para asignar los atributos a la propiedad
      $args = $_POST["propiedad"];

      // Sincronizar datos de $_POST[] Con las propiedades del objeto (Propiedad)
      $propiedad->sincronizar($args);

      // Validación de campos vacios dentro del formulario
      $errores = $propiedad->validar();

      /** SUBIDA DE ARCHIVOS **/
      // Crear nombre unico para imagenes dentro del servidor
      $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

      if($_FILES["propiedad"]["tmp_name"]["imagen"]) {
          $image = Image::make($_FILES["propiedad"]["tmp_name"]["imagen"])->fit(800, 600);
          $propiedad->setImage($nombreImagen);
      }

      // Validacion de campos llenos en el formulario
      if(empty($errores)) {
        if($_FILES["propiedad"]["tmp_name"]["imagen"]) {
          // Almacenar la imagen
          $image->save("../public/imagenes/" . $nombreImagen);
        }
        $propiedad->guardar();
      }
  }

  // Vista a mostrar con el contenido llamado desde el modelo
    $router->render("/propiedades/actualizar", [
      "propiedad" => $propiedad,
      "errores" => $errores,
      "vendedores" => $vendedores
    ]);
  }

  public static function eliminar() {
    if($_SERVER["REQUEST_METHOD"] === "POST") {
      $id = $_POST["id"];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if($id) {
        $tipo = $_POST["tipo"];
        if(validarContenido($tipo)) {
          $propiedad = Propiedad::find($id);
          $propiedad->eliminar(); 
        } 
      } 
    }
  }
}
?>