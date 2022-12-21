<?php
include '/var/www/html/lk/kursach/db/admin/admin.php';

    $subjects_id = $_GET['q'];
    $link =db_connect();
    $subjects = explode("x", $subjects_id);

    $sql = "SELECT * FROM subjects";
    $result = mysqli_query($link,$sql);
    for($i=0;$i<count($subjects);$i++){
        foreach($result as $row){
            if($row['subject_id']==$subjects[$i]){                
                echo '<input type="button" value="'.$row['name'].' '.$row['grade_name'].'" class="btn_subject" onclick=changesubject("'.$subjects[$i].'")><br/>';
            }
        }
    }
    $result->free();
    mysqli_close($link);
