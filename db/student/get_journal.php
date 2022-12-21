<?php
include '/var/www/html/lk/kursach/db/admin/admin.php';
$link =db_connect();
$grade_name = $_GET['q'];
$student_id = $_GET['id'];


$sql = "SELECT * FROM subjects WHERE grade_name='$grade_name'";
$result_subjects = mysqli_query($link,$sql);
echo "<table>";
echo "<tr>
    <td><label><b>Предмет</b></label></td>
    <td><label><b>Задание</b></label></td>
    <td><label><b>Описание</b></label></td>
    <td><label><b>Оценка</b></label></td>
    </tr>";
foreach($result_subjects as $subject){

$sql = "SELECT * FROM exercises WHERE subject_id=".$subject['subject_id'];
$result_exercises = mysqli_query($link,$sql);
foreach($result_exercises as $exercise){
    $sql = "SELECT task_grade FROM tasks_grades WHERE student_id='$student_id' AND exercise_id=".$exercise['exercise_id'];
    $result_task_grade = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result_task_grade);


    echo "<tr>
    <td>".$subject['name']."</td>
    <td>".$exercise['name']."</td>
    <td>".'<textarea class="show_text" rows="4" cols="35" type="text" disabled="disabled">'.$exercise['text']."</textarea></td>
    <td>".$row['task_grade']."</td>
    </tr>";
}


}
echo "</table>";
mysqli_close($link);
