<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class mail{
    public function Send($name,$email,$sub,$file_name = null){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL;                     //SMTP username
            $mail->Password   = PASS;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(EMAIL,$name);
            $mail->addAddress($email);     //Add a recipient
            $mail->addReplyTo(EMAIL);

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            if(!is_null($file_name)){
                 $mail->addAttachment($file_name);
            }

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Message from '.$name;
            $mail->Body    = $sub;
            $mail->AltBody = '';

            $mail->send();
            setcookie('success','Message Sent',time()+5,'/');
        } catch (Exception $e) {
            setcookie('faild',"Message not sent. Mailer Error: {$mail->ErrorInfo}",time()+5,'/');
        }
    }
}

