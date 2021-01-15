<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include 'conexion.php';
$telf = $_POST["telf"];
$email= $_POST["email"];
$nick = $_POST["usuario"];
$contra = $_POST["contrasenya"];
completarRegistro($conexion, $nick, $contra, $telf, $email);
if($email!=null){
    enviarEmail($email,$nick);
}

function completarRegistro($conexion, $nick, $contra, $telf, $email){
    $sql="UPDATE Usuario SET telefono ='$telf',email ='$email',registroCompleto =true WHERE nick= '$nick'";
    $sql1= "Select qr from Usuario where nick ='$nick';";
    if ($conexion->query($sql)== TRUE) {
        echo "Record updated successfully";
        $_SESSION["usuRegistro"]=$nick;
        $_SESSION["contraRegistro"]=$contra;
        $result = $conexion->query($sql1);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row["qr"]!=""){
                    $qrcode = $row["qr"];
                }

            }
        }
        $_SESSION["qr"]=$qrcode;
        header("Location: ../es/registroCompleto.php");
    } else {
        echo "Error updating record: " . $conexion->error;
    }
}
function enviarEmail($email,$nick){

    $mail = new PHPMailer; // Passing `true` enables exceptions
    try {
        //Server settings
        //$mail->SMTPDebug = 0; // Enable verbose debug output
        $mail->isSMTP(); //Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'pruebas.irekia2020@gmail.com'; // SMTP username
        $mail->Password = 'LagunArtean2020'; // SMTP password
        //$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 25; // TCP port to connect to

        //Recipients
        $mail->setFrom('pruebas.irekia2020@gmail.com', 'Administradores Lagun Artean'); // Sender email and name
        $mail->addAddress($email); // Reciver email

        //Content
        $mail->isHTML(true);// Set email format to HTML
        $mail->Subject = 'Preregistro completado'; // Subject of the email
        $mail->Body = 'Hola '.$nick.',<br><br>
    Te has registrado correctamente, ya puedes usar el servicio. Acude a nosotros ante cualquier duda.<br><br>
    Un saludo<br><br>
    Los administradores de Lagun Artean<br><br><br><br>
    Aviso de confidencialidad<br>
    Este correo electrónico y, en su caso, cualquier fichero anexo al mismo, contiene información de carácter confidencial exclusivamente dirigida a su destinatario o destinatarios. Queda prohibida su divulgación, copia o distribución a terceros sin la previa autorización expresa y escrita de su autor. En el caso de haber recibido este correo electrónico por error, se ruega que se notifique inmediatamente esta circunstancia mediante reenvío a la dirección electrónica del remitente.<br>
    Política de Protección de Datos de Carácter Personal<br><br>
    Responsable: Administrador del servicio';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

}
?>
