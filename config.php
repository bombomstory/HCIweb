<?php

// กำหนดตัวแปรสำหรับการเชื่อมต่อฐานข้อมูล
$hostname = "localhost";
$username = "root";
$password = "";
$database = "hci_db";

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect($hostname, $username, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// แสดงข้อความว่าเชื่อมต่อสำเร็จ
echo "Connection successful!";

?>