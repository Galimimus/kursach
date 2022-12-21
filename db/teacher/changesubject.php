<?php
include '/var/www/html/lk/kursach/db/admin/admin.php';
$subject = $_GET['q'];
$link = db_connect();
$sql = "SELECT * FROM exercises WHERE subject_id='$subject'";
$result = mysqli_query($link,$sql);

    echo '<div class="top">
    <form class = "form-horizontal" id="add_exersize">
    <input type="text" id="name" class="input_small_text" placeholder="Тема задания" required/>
    <input type="hidden" id="subject_id" value="'.$subject.'"/>
    </form>
    <div class="form-group">
        <textarea class="input_text" rows="4" cols="35" type="text" placeholder="Текст задания" id="text" form="add_exersize"></textarea>
    </div>
    <div>
        <input type="button" value="Добавить задание" class="btn_submit" form="add_exersize" onclick=teacherchangedb("add_exersize")>
    </div>';
    foreach($result as $row){
            echo '<input type="button" value="'.$row['name'].'" class="btn_teacher_exercises" onclick=changeExerciseInfo("'.$row['name'].'&ex_id='.$row['exercise_id'].'")></br>';
    }
    echo "</div>";
mysqli_close($link);