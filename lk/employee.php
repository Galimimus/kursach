<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>signup</title>
        <style>
            
            .split {
            height: 100%;
            width: 50%;
            position: fixed;
            z-index: 1;
            top: 0;
            overflow-x: hidden;
            padding-top: 20px;
            }

            .left {
            left: 0;
            }

            .right {
            right: 0;
            background-color: #ccc;
            }


            .top{
            position: absolute;
            top: 3%;
            left: 5%;
            text-align: center;
            }

            label{
                color: blue;
                margin-top: 20px;
                margin-bottom: 20px;
                margin-right: 10px;
            }

            .block1{
                color: black;

            }
            .select_action{
                padding: 5px; 
                margin-top:10%;
                margin-left: 0;
                outline: none;
                width: 30%;
                font-size: 16px;
            }
            .select_db{
                padding: 5px; 
                margin-top:5%;
                margin-left: 5%;
                outline: none;
                border: 2px solid #ccc;
                border-radius: 4px;
                background-color: #f8f8f8;
                font-size: 16px;
            }

            .msg{
                color: black;
                font-size: 16px;
                margin-top:5%;
                margin-left: 5%;

            }
            .input1{
                outline: none;
                border: 2px solid #ccc;
                border-radius: 4px;
                background-color: #f8f8f8;
                font-size: 16px;
                resize: none

            }
        </style>
        <script>
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
    xmlhttp.open("GET", "/lk/kursach/db/changesubject.php?q=" + str, true);
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

    xmlhttp.open("GET", "/lk/kursach/db/teachers.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<?php
session_start();
/*function changeExerciseInfo($str){
$_SESSION['exercise_name'] = $str;
header("Location: http://localhost/lk/kursach/lk/exercise.php");
}

ДОДЕЛАТЬ ОБРАБОТКУ НАЖАТИЯ НА ЗАДАНИЕ
С CSS НАДО БУДЕТ ПОИГРАТЬСЯ

*/
?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
                    <div class="split left">
                        <div class="top">
                            <label class="block1">Вы вошли как <?php echo $_SESSION['name'];?></label>
                            <a href="/lk/kursach/index.php">Выйти</a>
                        </div>
                        <div class="select_action btn-group-vertical">
                        <form>
                            <input type="button" value="Предметы" class="btn btn-primary" onclick=showSubjects(<?php echo '"'.$_SESSION["subjects_id"].'"';?>)>
                        </form>
                        <form>
                        <div id="txtForm"></div>
                        </form>
                        </div>
                    </div>
                    <div class="split right">
                        <div id="tableForm"></div>
                        <div id="exercise"></div>
                    </div>   
  </body>
</html>