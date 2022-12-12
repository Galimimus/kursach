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
                margin-left: 5%;
                outline: none;
                border: 2px solid #ccc;
                border-radius: 4px;
                background-color: #f8f8f8;
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
        </style>
        <script>
function showForm(str) {
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
    xmlhttp.open("GET", "getform.php?q=" + str, true);
    xmlhttp.send();
  }
}

function changedb(str) {
  if (str.length == 0) {
    document.getElementById("msg").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("msg").innerHTML = this.responseText;
      }
    };
    if(document.getElementById("fio")){
        str+= "&fio=" + document.getElementById("fio").value;
    }
    if(document.getElementById("grade")){
        str+= "&grade=" + document.getElementById("grade").value;
    }
    if(document.getElementById("subject")){
        str += "&subject=" + document.getElementById("subject").value;
    }
    xmlhttp.open("GET", "/lk/kursach/db/changedb.php?q=" + str, true);
    xmlhttp.send();
  }
}

function showInfo(str) {
  if (str.length == 0) {
    document.getElementById("tableForm").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tableForm").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "/lk/kursach/db/gettable.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
                    <div class="split left">
                        <div class="top">
                            <label class="block1">Вы вошли как admin</label>
                            <a href="/lk/kursach/index.php">Выйти</a>
                        </div>
                        <form>
                            <select name="select1" class="select_action" onchange="showForm(this.value)">
                                <option value="">Выберите действие</option>
                                <option value="1">Добавить ученика</option>
                                <option value="2">Добавить учителя</option>
                                <option value="3">Добавить предмет</option>
                                <option value="4">Добавить предметы учителю</option>
                            </select>
                        </form>
                        <div id="txtForm"></div>
                        <p id="msg"></p>
                    </div>
                    <div class="split right">
                        <div class="top">
                        <form>
                        <input type="button" value="Предметы" class="btn btn-primary" onclick=showInfo(<?php echo '"1"';?>)>
                        <input type="button" value="Учителя" class="btn btn-primary" onclick=showInfo(<?php echo '"2"';?>)>
                        <input type="button" value="Ученики" class="btn btn-primary" onclick=showInfo(<?php echo '"3"';?>)>
                        </form>
                        </div>
                        <div id="tableForm"></div>
                    </div>   
  </body>
</html>
<!--
    ДОДЕЛАТЬ ВЫВОД СООБЩЕНИЙ, СЕССИИ СОЗДАТЬ -->