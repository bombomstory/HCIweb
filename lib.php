<?php

function sendOTP($email){
// ส่งรหัส OTP ไปทางอีเมลล์

    // สร้างรหัส OTP
    $otp = rand(100000, 999999);

    // ส่งอีเมล
    $name = "เว็บไซต์ HCI";
    $from = "no-reply@hciweb.com";
    $subject = "ยืนยันรหัส OTP ของเว็บไซต์ HCIweb";
    $message = "Your OTP is: $otp";

    // ตั้งค่าหัวเรื่องและเนื้อหาอีเมล

    $headers = "MIME-Version: 1.0";
    $headers .= "Content-type: text/plain; charset=UTF-8";
    $headers .= "From: {$name} <{$from}>";
    $headers .= "Reply-To: <{$from}>";
    $headers .= "Subject: {$subject}";
    $headers .= "X-Mailer: PHP/".phpversion();

    echo $subject."<br>".$message."<br>".$headers;
    
    // ส่งอีเมล
    
    $mailto = $email;
    $mailSub = $subject;
    $mailMsg = $message;
     
    require 'vendor/autoload.php';

    $mail = new PHPMailer();
    $mail->IsSmtp();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; // or 587
    $mail->IsHTML(true);
    $mail->CharSet="utf-8";
    $mail->ContentType="text/html";
    $mail->Username = "ksumooc2022@gmail.com"; //username gmail accound
    $mail->Password = "ksumoocP@ssw0rd"; //password gmail accound
    $mail->SetFrom("no-reply@hciweb.com", "เว็บไซต์ HCI");
    // $mail->AddReplyTo("no-reply@hciweb.com", "เว็บไซต์ HCI");
    $mail->Subject = $mailSub;
    $mail ->Body = $mailMsg;
    $mail ->AddAddress($mailto);k
     
    if(!$mail->Send()){
      echo "ไม่สามารถส่งอีเมลล์ได้";
    }
    else{
      echo "ส่งอีเมลล์ได้สำเร็จ";
    }
}



?>