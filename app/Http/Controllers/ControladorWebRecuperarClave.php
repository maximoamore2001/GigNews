<?php

namespace App\Http\Controllers;

use App\entidades\sucursal;
use App\entidades\Cliente;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Session;

class ControladorWebRecuperarClave extends Controller
{

      public function index(Request $request)
      {
            $sucursal = new sucursal();
            $aSucursales = $sucursal->obtenerTodos();
            return view('web.recuperar-clave', compact("aSucursales"));
      }


      public function recuperar(Request $request)
      {
            $sucursal = new sucursal();
            $aSucursales = $sucursal->obtenerTodos();

            $titulo = 'Recupero de clave';
            $correo = $request->input('txtMail');
            $clave = rand(1000, 9999);

            $cliente = new Cliente();
            $cliente->obtenerPorCorreo($correo);

            if ($cliente->correo != "") {
                  //Envia  mail con las instrucciones

                  $data = "Instrucciones";

                  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                  try {
                        //Server settings
                        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = env('MAIL_HOST');  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = env('MAIL_USERNAME');                 // SMTP username
                        $mail->Password = env('MAIL_PASSWORD');                           // SMTP password
                        $mail->SMTPSecure = env('MAIL_ENCRYPTION');                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = env('MAIL_PORT');                                    // TCP port to connect to

                        //Recipients
                        $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                        $mail->addAddress($correo);

                        //Content
                        $mail->isHTML(true);
                        $mail->Subject = 'Recuperación de clave';
                        $mail->Body    = "Los datos de acceso son:
                        Usuario: $cliente->correo 
                        clave: $clave
                        ";

                        $mensaje = "Tu nueva contraseña es $clave, recibirás un correo con los datos.";
                        //$mail->send();
                        $cliente->clave = password_hash($clave, PASSWORD_DEFAULT);
                        $cliente->guardar();
                        //actualizar en el cliente la nueva clave ya encriptada


                        return view('web.recuperar-clave', compact('titulo', 'mensaje', 'aSucursales'));
                  } catch (Exception $e) {
                        $mensaje = "Hubo un error al enviar el correo:" . $e->getMessage();
                        return view('web.recuperar-clave', compact('titulo', 'mensaje', 'aSucursales'));
                  }
            } else {
                  $mensaje = "Email no encontrado";
                  return view('web.recuperar-clave', compact('titulo', 'mensaje', 'aSucursales'));
            }
      }
}
