<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/vendor/PHPMailer-master/src/PHPMailer.php';
require 'assets/vendor/PHPMailer-master/src/Exception.php';
require 'assets/vendor/PHPMailer-master/src/SMTP.php';
if (!function_exists('getUserAdminByUserAndPassword')) {
    function getUserAdminByUserAndPassword($user, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM khach_hang WHERE user = :user AND mat_khau = :mat_khau LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":user", $user);
            $stmt->bindParam(":mat_khau", $mat_khau);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('loadAccountToEmail')) {
    function loadAccountToEmail($email)
    {
        try {
            $sql = "SELECT user,mat_khau FROM khach_hang WHERE email = :email LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('sendemail')) {
    function sendemail($headers, $to_email, $mat_khau)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 1;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'anhkkzz2@gmail.com';                     //SMTP username
            $mail->Password   = 'aioe mulz mxuw bruy';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;             //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 465 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('anhkkzz2@gmail.com', 'Allia Support');
            $mail->addAddress('' . $to_email . '', '' . $mat_khau['user'] . '');     //Add a recipient              //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Allia mật khẩu';
            $mail->Body    = '<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
            ' . $headers . '<br>
            <h2 style="text-align: center; color: #007bff;">Email Gửi Lại Mật Khẩu</h2><br>
            <p style="margin-bottom: 10px;">Kính gửi: <span style="font-weight: bold;">' . $mat_khau['user'] . '</span><br><br></p>
            <p style="margin-bottom: 10px;">Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn. Dưới đây là mật khẩu của bạn:<br><br></p>
            <p style="font-weight: bold; font-size: 18px; padding: 10px; background-color: #f5f5f5;">' . $mat_khau['mat_khau'] . '</p><br>
            <p>Trân trọng,<br></p>
            <p><span style="font-weight: bold;">Allia Shop</span></p>
          </div>';
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
    }
}
