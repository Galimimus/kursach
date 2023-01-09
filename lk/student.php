<?php
session_start();
if ($_SESSION["session"]!="2"){
    $_SESSION["msg"] = "У вас нет прав доступа";
    header("Location: http://localhost/lk/kursach/index.php", true, 303);
}
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <link rel="stylesheet" href="/lk/kursach/style.css" type="text/css"/>
        <meta charset="UTF-8">
        <title>signup</title>
        
<script>

function showExercises(str) {
  if (str.length == 0) {
    document.getElementById("journal").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("journal").innerHTML = this.responseText;
      }
    };

    xmlhttp.open("GET", "/lk/kursach/db/student/get_journal.php?q=" + str, true);
    xmlhttp.send();
  }
}

</script>
    </head>
    <body>
                    <div class="split_student left">
                        <div class="top">
                            <label class="info"><?php echo $_SESSION['student_name'];?></label></br>
                            <label class="info"><?php echo $_SESSION['grade_name'];?></label></br>
                            <a href="/lk/kursach/db/logout.php">Выйти</a>
                        </div>
                        <form>
                            <input type="button" value="Задания" class="btn_student_exercises" onclick=showExercises(<?php echo '"'.$_SESSION["grade_name"].'&id='.$_SESSION["student_id"].'"';?>)>
                        </form>
                    </div>
                    <div class="split_student right">
                    <div id="journal" class="top"></div>
                    </div>   
  </body>
</html>