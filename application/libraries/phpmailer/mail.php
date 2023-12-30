<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailerr\PHPMailer\Exception;

//Load composer's autoloader
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


function myMail2( $sendFrom , $password , $senderName , $sendTo , $receiverName , $subject , $body){

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
       
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $sendFrom;                 // SMTP username
        $mail->Password = $password;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($sendFrom, $senderName);
        $mail->addAddress($sendTo, $receiverName);     // Add a recipient
        $mail->addReplyTo("no-reply@gmail.com", "no-reply");
        /*$mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');*/

        //Attachments
       /* $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');  */  // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
       // echo 'Message has been sent';
        return "success";
    } catch (Exception $e) {
        //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        return "fail";
    }
}