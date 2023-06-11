<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';
//require_once __DIR__ . '/../Config.class.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

class EMailer
{
    public function sendEmail($title, $content, $receiver, $full_name)
    {
        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

    // here we have to modify the values after creating an account on Mailgun
    // from Host till Port
    // if we change the provide we can easily change the values

        try {
            //Server settings
            $mail->SMTPDebug =  2; //SMTP::DEBUG_SERVER;                 //Enable verbose debug output
            $mail->isSMTP();                                             //Send using SMTP
            $mail->Host       = gethostbyname('smtp.mailgun.com');       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                    //Enable SMTP authentication
            $mail->Username   = getenv('SMTP_USERNAME');                           //SMTP username FROM CONFIG
            $mail->Password   = getenv('SMTP_PASSWORD');                           //SMTP password FROM CONFIG
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          //Enable implicit TLS encryption
            $mail->Port       = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            ); //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('itcardealership@example.com', 'ITcar');
            // $mail->addAddress('ajla.herenda@stu.ibu.edu.ba', 'Ajla Herenda');     //Add a recipient
            $mail->addAddress($receiver, $full_name);               //Name is optional
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $content;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
