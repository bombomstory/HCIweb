<?php

function sendOTP($email){
// ส่งรหัส OTP ไปทางอีเมลล์

    // สร้างรหัส OTP
    $otp = rand(100000, 999999);

    // ส่งอีเมล
    $subject = "ยืนยันรหัส OTP ของเว็บไซต์ HCIweb";
    $message = "Your OTP is: $otp";

    // ตั้งค่าหัวเรื่องและเนื้อหาอีเมล
    $headers = array(
        "From: no-reply@example.com",
        "Reply-To: no-reply@example.com",
        "Subject: $subject",
        "MIME-Version: 1.0",
        "Content-Type: text/html; charset=UTF-8"
    );

    echo $subject."<br>".$message."<br>";
    print_r($headers);
    
    // ส่งอีเมล
    //mail($email, $subject, $message, $headers);  
}



?>