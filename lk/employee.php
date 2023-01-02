<?php
session_start();
if ($_SESSION["session"]!="1"){
    $_SESSION["msg"] = "У вас нет прав доступа";
    header("Location: http://localhost/lk/kursach/index.php", true, 303);
}
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>signup</title>
        <link rel="stylesheet" href="/lk/kursach/style.css" type="text/css"/>

<script>



function settasksgrades(str, val) {
  if (str.length == 0) {
    document.getElementById("msgt").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState==4 && this.status == 200) {
        document.getElementById("msgt").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "/lk/kursach/db/teacher/gradebook.php?q=" + str + val, true);
    xmlhttp.send();
  }
}



function teacherchangedb(str){
if (str.length == 0) {
    document.getElementById("exercise").innerHTML = "";
    return;
} else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState==4 && this.status == 200) {
        document.getElementById("exercise").innerHTML = this.responseText;
      }
    };
    if(document.getElementById("name")){
        str+= "&name=" + document.getElementById("name").value;
    }
    if(document.getElementById("text")){
        str+= "&text=" + document.getElementById("text").value;
    }
    if(document.getElementById("subject_id")){
        str+= "&subject_id=" + document.getElementById("subject_id").value;
    }
    
    xmlhttp.open("GET", "/lk/kursach/db/changedb.php?q=" + str, true);
    xmlhttp.send();
  }
}

 

function changesubject(str) {
  if (str.length == 0) {
    document.getElementById("tableForm").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState==4 && this.status == 200) {
        document.getElementById("tableForm").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "/lk/kursach/db/teacher/changesubject.php?q=" + str, true);
    xmlhttp.send();
  }
}



function showSubjects(str) {
  if (str.length == 0) {
    document.getElementById("txtForm").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtForm").innerHTML = this.responseText;
      }
    };

    xmlhttp.open("GET", "/lk/kursach/db/teacher/show_subjects.php?q=" + str, true);
    xmlhttp.send();
  }
}



function changeExerciseInfo(str){
if (str.length == 0) {
    document.getElementById("exerciseInfo").innerHTML = "";
    return;
} else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState==4 && this.status == 200) {
        document.getElementById("exerciseInfo").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "/lk/kursach/db/teacher/exercise.php?q=" + str, true);
    xmlhttp.send();
  }
}



</script>
    </head>
    <body>
                    <div class="split_employee left">
                        <div class="top">
                            <label class="info">Вы вошли как <?php echo $_SESSION['name'];?></label>
                            <a href="/lk/kursach/index.php" class="exit" onclick="<?php session_destroy();?>">Выйти</a>
                        </div>
                        <div class="list_of_subjects">
                        <form>
                            <input type="button" value="Предметы" class="btn_show_subjects" onclick=showSubjects(<?php echo '"'.$_SESSION["subjects_id"].'"';?>)>
                        </form>
                        <div id="txtForm"></div>
                        </div>
                    </div>
                    <div class="split_employee right">
                        <form>
                        <div id="tableForm"></div>
                        </form>
                        
                                <form>
                                <div id="exercise"></div>
                                </form>
                                
                                <div id="exerciseInfo"></div>
                                <div id="msgt"></div>

                                
                    </div>   
  </body>
</html>