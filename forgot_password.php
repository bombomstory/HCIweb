<?php

if(!empty($_POST)){
  
  print_r($_POST);

  $email = $_POST["email"];

  // เชื่อมต่อฐานข้อมูล MySQL
  require_once("config.php");

  // เรียกใช้ฟังก์ช้่นที่เขียนขึ้นมาเอง
  require_once("lib.php");

  // ตรวจสอบอีเมลล์ในฐานข้อมูลว่าตรงกันกับที่กรอกหรือไม่

    // เตรียมคำสั่ง SQL
    $sql = "SELECT * FROM hci_user WHERE email = '$email'";
    
    //echo $sql;

    // เรียกใช้คำสั่ง SQL
    $result = mysqli_query($conn, $sql);

    // ตรวจสอบจำนวนแถวของผลลัพธ์
    $num_rows = mysqli_num_rows($result);

    // ปิดการเชื่อมต่อ
    mysqli_close($conn);

    // ตรวจสอบว่าพบอีเมลในฐานข้อมูลหรือไม่
    if ($num_rows > 0) {
        // พบอีเมลในฐานข้อมูล
        echo "พบอีเมลล์ในฐานข้อมูล";
      
        // ส่งรหัส OTP ทางอีเมมล์
        sendOTP($email); 
      
    } else {
        // ไม่พบอีเมลในฐานข้อมูล
        echo "ไม่พบอีเมลล์ในฐานข้อมูล";
    }


  

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <!-- Navbar -->
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                BS5
            </a>
          </div>
    
          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2">Features</a></li>
            <li><a href="#" class="nav-link px-2">Pricing</a></li>
            <li><a href="#" class="nav-link px-2">FAQs</a></li>
            <li><a href="#" class="nav-link px-2">About</a></li>
          </ul>
    
          <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">Login</button>
            <button type="button" class="btn btn-primary">Sign-up</button>
          </div>
        </header>
        <!-- Navbar -->

      </div>

      <main class="form-signin w-100 m-auto">
        <form class="text-center" method="POST">
          <h1 class="h3 mb-3 fw-normal">กู้รหัสผ่าน</h1>
      
          <div class="form-check text-start my-3">
            <label class="form-check-label" for="flexCheckDefault">
              กรอกอีเมลล์ของสมาชิก
            </label>
          </div>

          <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>

          <p>
            <button class="btn btn-primary w-100 py-2" type="submit">รับรหัส OTP</button>
          </p>
        </form>

      </main>


      <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
              <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
            </ul>
            <p class="text-center text-body-secondary">© 2023 Company, Inc</p>
          </footer>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>