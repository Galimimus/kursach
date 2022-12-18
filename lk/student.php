<?php
session_start();
/*

С CSS НАДО БУДЕТ ПОИГРАТЬСЯ

*/
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>signup</title>
        <style>
             table {
             width: 500px;
             margin-left: 5%; 
             margin-top:10%;
             border-spacing: 10px 20px;
            }
            td {
             padding: 5px; 
             text-align: center;
            }

            .split {
            height: 100%;
            width: 70%;
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
                color: red;
                font-size: 16px;
                margin-top:3%;
                margin-left: 50%;
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

    xmlhttp.open("GET", "/lk/kursach/db/get_journal.php?q=" + str, true);
    xmlhttp.send();
  }
}







</script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
                    <div class="split left">
                        <div class="top">
                            <label class="block1"><?php echo $_SESSION['student_name'];?></label></br>
                            <label><?php echo $_SESSION['grade_name'];?></label></br>
                            <a href="/lk/kursach/index.php">Выйти</a>
                        </div>
                        <div class="select_action btn-group-vertical">
                        <form>
                            <input type="button" value="Задания" class="btn btn-primary" onclick=showExercises(<?php echo '"'.$_SESSION["grade_name"].'&id='.$_SESSION["student_id"].'"';?>)>
                        </form>
                        </div>
                    </div>
                    <div class="split right">
                    <div id="journal"></div>
                    </div>   
  </body>
</html>