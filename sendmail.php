<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'ssl://smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'thungkuladurian@gmail.com';
        $mail->Password = 'thungkulaP@ssw0rd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;  
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('ne-reply@HCIweb.com', 'เว็บไซต์ HCI');                     // ส่งโดย
        $mail->addAddress('bombomstory@gmail.com', 'นายไพฑูรย์ ทิพย์สันเทียะ');                  // ผู้รับ

        //Content
        $otp = rand(100000, 999999);

        $mail->isHTML(true);
        $mail->Subject = 'ทดสอบการส่งรหัส OTP';
        $mail->Body    = 'รหัส OTP ของคุณคือ'.$otp;
    
        $mail->send();
        echo 'อีเมลส่งสำเร็จ';
    } catch (Exception $e) {
        echo "อีเมลส่งไม่ได้เนื่องจาก: {$mail->ErrorInfo}";
    }
?>