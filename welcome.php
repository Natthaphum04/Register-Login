<?php 

    session_start();

    if ($_SESSION['id'] == "") {
        header("location: signin.php"); //ถ้าidไม่มีค่าให้ไปยังหน้าsignin
    }else{ //ถ้ามีค่าให้แสดงหน้าweb
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> <!-- html bootstrap5 เครื่องมือที่ทำให้ html css สดวกสบายขึ้น-->
     <link rel="stylesheet" href="style.css">
     <link rel="icon" type="image/png" href="img/icon3.png">

</head>
<body class="welcome-page">

    <div class="containers">
        <h1 class="mt-5">Welcome, <?php echo $_SESSION['fname'];//ดึงเอาfull name มาแสดง ?></h1>
        <hr>
        <p>
        ระบบ Login (เข้าสู่ระบบ) และ Register (สมัครสมาชิก) เป็นองค์ประกอบสำคัญในเว็บไซต์หรือแอปพลิเคชันที่ต้องการให้ผู้ใช้งานมีบัญชีส่วนตัว เพื่อให้ระบบสามารถจดจำตัวตนของผู้ใช้ได้อย่างถูกต้องและปลอดภัย

        เมื่อผู้ใช้สมัครสมาชิก (Register) ข้อมูลที่จำเป็น เช่น อีเมล รหัสผ่าน หรือชื่อผู้ใช้งาน จะถูกบันทึกลงในฐานข้อมูล หลังจากนั้นผู้ใช้สามารถเข้าสู่ระบบ (Login) โดยใช้ข้อมูลที่ได้ลงทะเบียนไว้ เพื่อเข้าถึงฟีเจอร์หรือข้อมูลที่จำกัดเฉพาะบุคคล
        </p>
        <hr>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> <!-- html bootstrap5  -->
</body>
</html>






<?php } ?>