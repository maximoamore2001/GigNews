<?php

namespace App\Http\Controllers;
//entidades
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//alertas
require app_path() . '/start/constants.php';

class ControladorWebContacto extends Controller
{
    public function index()
    {
        return view("web.contacto");
    }

    public function enviar(Request $request)
    {
        

        // Recopila los datos del formulario
        $nombre = $request->input('txtNombre');
        $apellido = $request->input('txtApellido');
        $correo = $request->input('txtCorreo');
        $mensaje = $request->input('txtTextArea');
        

        if ($correo != "" && $nombre != "" && $mensaje != ""  && $apellido != "") {

            $data = "Instrucciones";
            // Configura PHPMailer
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                                   // Enable verbose debug output
                $mail->isSMTP();                                        // Set mailer to use SMTP
                $mail->Host = env('MAIL_HOST');                         // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                                 // Enable SMTP authentication
                $mail->Username = env('MAIL_USERNAME');                 // SMTP username
                $mail->Password = env('MAIL_PASSWORD');                 // SMTP password
                $mail->SMTPSecure = env('MAIL_ENCRYPTION');             // Enable TLS encryption, `ssl` also accepted
                $mail->Port = env('MAIL_PORT');                         // TCP port to connect to

                // Configuración del remitente y destinatario
                $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $mail->addAddress($correo);

                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Nuevo mensaje de contacto';
                $mail->Body = "Nombre: $nombre<br>Correo: $correo<br>Mensaje: $mensaje<br>Apellido: $apellido";



                // Envía el correo
                //$mail->send();


                return view('web.contacto-gracias');
            } catch (Exception $e) {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = "Error al enviar el correo";
                return view('web.contacto');
               
            }
        } else {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = "complete todos los datos";
            return view('web.contacto');
            
        }
    }

}
