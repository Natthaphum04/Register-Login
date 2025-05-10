<?php 

session_start();
include_once('function.php');
$userdata = new DB_conn(); //เก็บ DB_conn ไว้ในตัวแปรแล้วค่อยนำมาเข้าถึง

//check ว่ามีข้อมูลตรงกันก็ให้ login เข้าไปได้
if (isset($_POST['login'])) {
   $uname = $_POST['username'];
   $password = md5($_POST['password']);//md5 คือการไม่ให้เห็น รหัสใน data base
   
   $result = $userdata->signin($uname, $password); //ส่งค่าไปยังตัว funtion signin
   $num = mysqli_fetch_array($result);//ดึงเอาค่ามาเก็บเป็น section เวลา login ต้อง check section ว่าถ้าไม่มีการ login เข้ามาก็ห้ามให้เข้าถึงหน้าwelcome

   if ($num > 0) {
        $_SESSION['id'] = $num['id'];
        $_SESSION['fname'] = $num['fullname'];
        echo "<script>alert('Login successfull!');</script>";//ถ้าสำเร็จจะขึ้นว่า
        echo "<script>window.location.href='welcome.php'</script>"; //ให้ไปยังหน้าwelcome
   }else{
        echo "<script>alert('Something went wrong! Please try again.');</script>";//ถ้าไม่สำเร็จจะขึ้นว่า
        echo "<script>window.location.href='signin.php'</script>"; //ให้ไปยังหน้าsignin
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> <!-- html bootstrap5 -->
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="img/icon2.png">

</head>
<body>
    
<div class="container">
    <h1 class="mt-2">Login</h1>
    <hr>
    <form method="post">

        <div class="mb-3">
            <label for="username" class="form-label">User name</label>
            <input type="text" class="form-control" id="username"  name="username" required>
             <span id="usernameavailable" ></span>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password"  name="password" required>    
        </div>

        <button type="submit" name="login" class="btn btn-success">Login</button>
        <a href="index.php" class="btn btn-primary">Go to register</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> <!-- html bootstrap5  -->
</body>
</html>