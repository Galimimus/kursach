
<!--реализовать вход в лк
добавить передачу сообщений об ошибках и тд-->

<?php
include '/var/www/html/lk/kursach/db/admin.php';
$pass = $_POST['pass'];
$fio = $_POST['fio'];
$pass = md5($pass);
$link = db_connect();
$sql = "SELECT password FROM employees WHERE name='$fio'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);


if ($row === "") {

    mysqli_close($link);
        header("Location: http://localhost/lk/kursach/index.php");


}else{

    if(!strcmp($pass, $row['password'])){
        mysqli_close($link);
        if(!strcmp($fio, "admin"))
            header("Location: http://localhost/lk/kursach/lk/admin.php");
        else
        header("Location: http://localhost/lk/kursach/lk/employee.php");
    }else{
        mysqli_close($link);
        header("Location: http://localhost/lk/kursach/index.php");

    }
}
