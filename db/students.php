реализовать вход в лк
<?php
session_start();

include '/var/www/html/lk/kursach/db/admin/admin.php';
$pass = $_POST['pass'];
$fio = $_POST['fio'];
$grade_name = $_POST['grade'];

$pass = md5($pass);
$link = db_connect();
$sql = "SELECT * FROM grades WHERE student_name='$fio' AND grade_name='$grade_name'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);


if ($row === "") {

    mysqli_close($link);
    header("Location: http://localhost/lk/kursach/index.php");

}else{

    if(!strcmp($pass, $row['password'])){
        mysqli_close($link);
        
            $_SESSION["student_id"] = $row['student_id'];
            $_SESSION["student_name"] = $row['student_name'];       
            $_SESSION["grade_name"] = $row['grade_name'];
            $_SESSION["session"] = "2";
            header("Location: http://localhost/lk/kursach/lk/student.php");
        
    }else{
        mysqli_close($link);
        header("Location: http://localhost/lk/kursach/index.php");

    }
}
?>