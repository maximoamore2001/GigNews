<?php

namespace App\Http\Controllers;
//entidades
use App\entidades\sucursal;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//alertas
require app_path() . '/start/constants.php';

class ControladorWebTasaciones extends Controller
{
    public function index()
    {
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        return view("web.tasaciones", compact("aSucursales"));
    }

    public function enviar(Request $request)
    {
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        // Recopila los datos del formulario
        $nombre = $request->input('txtNombre');
        $telefono = $request->input('txtTelefono');
        $correo = $request->input('txtCorreo');
        $mensaje = $request->input('txtTextArea');

        if ($correo != "" && $nombre != "" && $telefono != "" && $mensaje != "") {

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
                $mail->Body = "Nombre: $nombre<br>Telefono: $telefono<br>Correo: $correo<br>Mensaje: $mensaje";



                // Envía el correo
                //$mail->send();


                return view('web.contacto-gracias', compact('aSucursales'));
            } catch (Exception $e) {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = "Error al enviar el correo";
                return view('web.contacto', compact('msg', 'aSucursales'));
            }
        } else {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = "complete todos los datos";
            return view('web.contacto', compact('msg', 'aSucursales'));
        }
    }

}
