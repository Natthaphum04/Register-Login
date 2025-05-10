<?php 

include_once('function.php');
$userdata = new DB_conn(); //เก็บ DB_conn ไว้ในตัวแปรแล้วค่อยนำมาเข้าถึง

    //รับค่าจากform แล้วเอาไปบันทึกใน database
    if (isset($_POST['submit'])) {
        $fname = $_POST['fullname']; //เก็บค่าจาก name ของ input
        $uname = $_POST['username']; //เก็บค่าจาก name ของ input
        $uemail = $_POST['email']; //เก็บค่าจาก name ของ input
        $password = md5($_POST['password']); //เก็บค่าจาก name ของ input

        $sql = $userdata->registration($fname, $uname, $uemail, $password);//ส่งค่าไปให้ function ตัว registration

        if ($sql) {
            echo "<script>alert('Register successfull!');</script>";//ถ้าสำเร็จจะขึ้นว่า
            echo "<script>window.location.href='signin.php'</script>"; //ให้ไปยังหน้าsignin
        }else{
            echo "<script>alert('someting went wrong! plesae try again');</script>";//ถ้าไม่สำเร็จจะขึ้นว่า
            echo "<script>window.location.href='signin.php'</script>";//ให้ไปยังหน้าsignin
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> <!-- html bootstrap5 เครื่องมือที่ทำให้h tml สดวกสบายขึ้น-->
    <link rel="stylesheet" href="style.css">
    <link  rel="icon" type="image/png" href="img/icon1.png">

</head>
<body>
    
<div class="container">
    <h1 class="mt-2">Register</h1>
    <hr>
    <form method="post">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full name</label>
            <input type="text" class="form-control" id="username"  name="fullname" required>    
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">User name</label>
            <input type="text" class="form-control" id="username"  name="username" onblur="checkusername(this.value)" required> <!-- เวลาที่มีการพิมพ์จะให้ใช้ function checkusername -->
            <span id="usernameavailable" ></span>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email"  name="email" required>    
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password"  name="password" required>    
        </div>

        <button type="submit" name="submit" id="submit" class="btn btn-success">Register</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.js"></script> <!-- jQuery -->
<script>
    //ใช้งานเมื่อมีการพิมพ์ username แล้วส่งต่อไปที่ file checkusername_available.php ต่อ
    function checkusername(val){
            $.ajax({
            type: 'POST',
            url: 'checkusername_available.php',
            data: 'username=' + val,
            success: function(data){
                $('#usernameavailable').html(data);
            }
        });
    }
    
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> <!-- html bootstrap5  -->
</body>
</html>