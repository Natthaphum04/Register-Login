<?php 

define('DB_SERVER','localhost'); //your host name
define('DB_USER','root');// database username
define('DB_PASS','');// database password
define('DB_NAME','register_oop');//database name



class DB_conn{

    //เชื่อมฐานข้อมูล
    function __construct() {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbconn = $conn;

        if (mysqli_connect_errno()) {
            echo "failed to connect to MySQL:" . mysqli_connect_error();
        }
    }

    //เพิ่มข้อมูลเวลาสมัครสมาชิกเรียบร้อย 
    public function registration($fname, $uname, $uemail, $password)/*รับข้อมูล */ {
        $reg = mysqli_query($this->dbconn, "INSERT INTO tblusers(fullname, username, useremail, password) VALUE('$fname', '$uname', '$uemail', '$password')");
        return $reg;
    }

    //เช็คว่าข้อมูลไม่ซ้ำกัน
    public function usernameavailable($uname){
        $checkuser = mysqli_query($this->dbconn, "SELECT username FROM tblusers WHERE username = '$uname'");
        return $checkuser;
    }

    //ระบบlogin
    public function signin($uname, $password){
        $signinquery = mysqli_query($this->dbconn, "SELECT id, fullname FROM tblusers WHERE username = '$uname' AND password = '$password'");
        return $signinquery;
    }
}

?>