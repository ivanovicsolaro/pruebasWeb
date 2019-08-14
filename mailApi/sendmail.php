<?php 
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('content-type: application/json; charset=utf-8');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    if( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

        $name = isset( $_GET['name'] ) ? $_GET['name'] : 'PruebaNombre';
        $email = isset( $_GET['email'] ) ? $_GET['email'] : 'pruebaemail@email.com';
        $phone = isset( $_GET['phone'] ) ? $_GET['phone'] : '12345567';
        $subject = isset( $_GET['subject'] ) ? $_GET['subject'] : 'Mensaje de contacto desde la web';
        $message = isset( $_GET['message'] ) ? $_GET['message'] : 'mensaje';
        $email_to = isset( $_GET['email_agent']) ? $_GET['email_agent'] : '';
 


        if (!isset($name) || !isset($name)) {
            # code...
        }

        $subject = isset($subject) ? $subject : 'Nuevo mensaje desde Costa Solar Properties.';

        try {
            $mail->isSMTP();                     
            $mail->Host = 'costasolarproperties.cl';  
            $mail->SMTPAuth = true;                              
            $mail->Username = 'admin@costasolarproperties.cl';                 
            $mail->Password = 'C0U$^9{&_;=o';                           
            $mail->SMTPSecure = 'ssl';                            
            $mail->Port = 465;                                    

            $mail->SetFrom( $email , $name );
            $mail->addAddress($email_to, 'Costa Solar');     

            $mail->isHTML(true);                                 

            $mail->Subject = $subject;

            $name = isset($name) ? "Nombre: $name<br><br>\n" : '';
            $email = isset($email) ? "Email: $email<br><br>\n" : '';
            $phone = isset($phone) ? "Teléfono: $phone<br><br>\n" : '';
            $message = isset($message) ? "Mensaje: $message<br><br>\n" : '';

            $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>Éste formulario fue enviado desde: ' . $_SERVER['HTTP_REFERER'] : '';

            $body = "$name $email $phone  $message $referrer";

            $mail->MsgHTML( $body );
            $sendEmail = $mail->Send();
     
            echo json_encode(['msj' => 'Mensaje enviado, gracias por su interes!', 'status' => 1]);
        } catch (Exception $e) {
            echo json_encode(['msj' => 'Hubo un error al enviar el formulario. Verifique sus datos o inténtelo nuevamente más tarde', 'status' => 0]);
        }
    }else{
        echo json_encode(['msj' => 'Disculpe, hubo un error. Inténtelo nuevamente más tarde', 'status' => 0]);
    }
?>