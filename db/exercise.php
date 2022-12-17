<?php
function get_task_grades($student_id, $values){
    foreach ($values as $value){
        if($student_id == $value['student_id']){
            return $value['task_grade'];
        }
    }
    return " ";
}
?>
<?php
include '/var/www/html/lk/kursach/db/admin.php';

$exercise_name = $_GET['q'];
$exercise_id = $_GET['ex_id'];

$link = db_connect();
$sql = "SELECT * FROM exercises WHERE name='$exercise_name'";
$result = mysqli_query($link,$sql);

if ($result == false) {

    echo "Произошла ошибка при выполнении запроса";

}  

$row = mysqli_fetch_array($result);

$sql = "SELECT * FROM subjects WHERE subject_id=".$row['subject_id'];
$result = mysqli_query($link,$sql);
$row2 = mysqli_fetch_array($result);

$sql = "SELECT * FROM grades WHERE grade_name='".$row2['grade_name']."'";
$result = mysqli_query($link,$sql);

$sql = "SELECT * FROM tasks_grades WHERE exercise_id=$exercise_id";
$result_values = mysqli_query($link,$sql);



echo '<div class="msg">
            <label>'.$exercise_name.'</label></br>
            <p>'.$row['text'].'</p>';
echo '<b><label>ФИО</label><label>оценка</label></b></br>';
foreach ($result as $row){
    echo "<label>".$row['student_name'].'</label><form><select onchange=settasksgrades("'.$row['student_id'].'&exercise='.$exercise_id.'&val=",this.value)>
    <option value="1">'.get_task_grades($row['student_id'], $result_values).'</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>    
</select></form></br>';
}
echo "</div>";
mysqli_close($link);

?>
