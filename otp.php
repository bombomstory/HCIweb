<?php
session_start();

// สร้างรหัส OTP
$otp = rand(100000, 999999);
$phone_number = "0986018396";

// ส่งรหัส OTP ไปยังเบอร์โทรศัพท์มือถือของผู้ใช้
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.line.me/v2/bot/message/push");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(["to": $phone_number,"messages": [["type": "text","text": "รหัส OTP ของคุณคือ $otp"]]]));
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: zFX0YrWX3dXwoFc2NldZJpfA48IqV4i8jaHIookdArOVR3vaS95BwqfumBUAx21+01Yv3olgqsWLamqyZGudFYMpPDl5VdBPyrUomZTkP1q8Q0/9HOZheHQ1mPNz+TeWPytGlFUfZOiope/ysCtZPQdB04t89/1O/w1cDnyilFU="]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

// เก็บรหัส OTP ไว้ใช้ยืนยันตัวตน
$_SESSION["otp"] = $otp;

// แสดงลิงค์ reset password ให้กับผู้ใช้
echo "<a href='reset_password.php?otp=$otp'>คลิกที่นี่เพื่อรีเซ็ตรหัสผ่าน</a>";

print_r($_SESSION);

?>