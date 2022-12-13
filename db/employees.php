
<!--реализовать вход в лк
добавить передачу сообщений об ошибках и тд
ДОБАВИТЬ СЕССИИ-->

<?php
include '/var/www/html/lk/kursach/db/admin.php';
$pass = $_POST['pass'];
$fio = $_POST['fio'];
$pass = md5($pass);
$link = db_connect();
$sql = "SELECT * FROM employees WHERE name='$fio'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

session_start();

if ($row === "") {

    mysqli_close($link);
        header("Location: http://localhost/lk/kursach/index.php");


}else{

    if(!strcmp($pass, $row['password'])){
        mysqli_close($link);
        if(!strcmp($fio, "admin")){
            $_SESSION["session"] = "0";

            header("Location: http://localhost/lk/kursach/lk/admin.php");
        }
        else{
            $_SESSION["id"] = $row['id'];
            $_SESSION["name"] = $row['name'];       
            $_SESSION["subjects_id"] = $row['subjects_id'];
            $_SESSION["grades_id"] = $row['grades_id'];
            $_SESSION["session"] = "1";
            header("Location: http://localhost/lk/kursach/lk/employee.php");
        }
    }else{
        mysqli_close($link);
        header("Location: http://localhost/lk/kursach/index.php");

    }
}
