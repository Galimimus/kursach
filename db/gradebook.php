<!--функции для загрузки заданий и оценок в лк студента--> 

<?php
include '/var/www/html/lk/kursach/db/admin.php';


$val = $_GET['val'];
$student_id = $_GET['q'];
$exercise_id = $_GET['exercise'];

$link = db_connect();
$sql="SELECT task_grade FROM tasks_grades WHERE exercise_id=".$exercise_id." AND student_id=".$student_id;
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);

if($row == ""){

    $sql="INSERT INTO tasks_grades (student_id, exercise_id, task_grade) VALUES ($student_id, $exercise_id, $val)";
    $result = mysqli_query($link, $sql);
    
}else{

    $sql="UPDATE tasks_grades SET task_grade=$val WHERE exercise_id=$exercise_id AND student_id=$student_id";
    $result = mysqli_query($link, $sql);

}

if($result == true){
    echo "uwu";
}else{
    echo "uxu";
}

mysqli_close($link);