<?php 
namespace Controller;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {

  /** Importar la vista principal del sitio web
   * @param Router $router
   */
  public static function index(Router $router) : void {
    $propiedades = Propiedad::get(3);
    $inicio = true;
    $router->render("paginas/index", [
      "inicio" => $inicio,
      "propiedades" => $propiedades,
    ]);
  }
  
  /** Controlador de la vista de nosotros
   * @param Router $router
   */
  public static function nosotros(Router $router) : void{
    $router->render("paginas/nosotros", []);
  }

  /** Controlador de la sección de propiedades
   * @param Router $router
   */
  public static function propiedades(Router $router) : void {
    $propiedades = Propiedad::all();
    $router->render("paginas/propiedades", [
      "propiedades" => $propiedades
    ]);
  }

  /** Controlador de la sección de propiedad 
   * @param Router $router
  */  
  public static function propiedad(Router $router) : void {
    $id = valOred("./propiedades");
    $propiedad = Propiedad::find($id);
    $router->render("paginas/propiedad", [
      "propiedad" => $propiedad
    ]);
  }

  /** Controlador para la sección del blog
   * @param Router $router
   */
  public static function blog(Router $router) : void {
    $router->render("paginas/blog", []);
  }

  /** Controlador para la sección de contacto 
   * @param Router $router
  */
  public static function entrada(Router $router) : void {
    $router->render("paginas/entrada", []);
  }

  /** Controlador para la sección de contácto
   * @param Router $router
   */
  public static function contacto(Router $router) : void {
    $mensaje = null;
    if($_SERVER["REQUEST_METHOD"] === "POST") {
      // Mensaje de exito

      // Respuestas del usuario
      $respuestas = $_POST["contacto"];

      // Crear instancias de PHPMailer
      $mail = new PHPMailer();

      // Configurar protocolo (SMTP)
      $mail->isSMTP();
      $mail->Host = 'sandbox.smtp.mailtrap.io';
      $mail->SMTPAuth = true;
      $mail->Username = 'fbc16a775ae271';
      $mail->Password = '778b118a4e48d6';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 2525;
      
      // Configurar información del E-mail
      $mail->setFrom("admin@bienesraices.com"); // -> Quien envía el e-mail
      $mail->addAddress("admin@bienesraices.com", "Bienesraices.com"); // -> Quien recibe el e-mail
      $mail->Subject = "Tienes un nuevo mensaje"; // Primer contenido del e-mail

      // Habilitar HTML
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';

      // Definirl el contenido del E-mail
      $contenido = '<html>';
      $contenido .= '<p> Tienes un nuevo mensaje </P>';
      $contenido .= '<p>Nombre: ' . $respuestas["nombre"] . " </p>";
      $contenido .= '<p>Mensaje: ' . $respuestas["mensaje"] . " </p>";
      $contenido .= '<p>Vende o Compra: ' . $respuestas["tipo"] . " </p>";
      $contenido .= '<p>Precio o Presupuesto: $' . number_format($respuestas["precio"]) . " </p>";

      // Enviar de forma condicional algunos campos de email o telefono
      if($respuestas["contacto"] === "telefono") {
        $contenido .= "<p> Eligió ser contactado vía telefónica </p>";
        $contenido .= '<p>Telfono: ' . $respuestas["telefono"] . " </p>";
        $contenido .= '<p>Fecha para contáctar: ' . $respuestas["fecha"] . " </p>";
        $contenido .= '<p>Hora para llamar: ' . $respuestas["hora"] . " </p>";
      } else {
        // Es un email
        $contenido .= '<p>Eligió ser contactado por E-mail</p>';
        $contenido .= '<p>Correo Electrónico: ' . $respuestas["email"] . " </p>";
      } 
      $contenido .= '</html>';
      
      //Agregar el contenido al e-mail
      $mail->Body = $contenido;

      // Texto alternativo (En caso de que el servicio de e-mails no soporte HTML)
      $mail->AltBody = "Esto es texto alternativ0 sin HTML";

      // Enviar el e-mail
      if($mail->send()) { 
        $mensaje = "Mensaje enviado correctamente";
      
      } else { 
        $mensaje = "Error al enviar el mensaje, por favor intente nuevamente";
      }
    }

    // Importar la vista
    $router->render("paginas/contacto", [
      "mensaje" => $mensaje
    ]);
  }

  /** Controlador de la sección de la pagina de error 404
   * @param Router $router
   */
  public static function error(Router $router) {
    $router->render("/paginas/error", []);
  }
}
?>