<?php
session_start();
if ($_SESSION["session"]!="0"){
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
      if (this.readyState==4 && this.status == 200) {
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
    xmlhttp.open("GET", "/lk/kursach/db/admin/gettable.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
    </head>
  <body>
    <div class="split_admin left">
        <div class="top">
            <label class="info">Вы вошли как admin</label>
            <a href="/lk/kursach/index.php" onclick="<?php session_destroy();?>">Выйти</a>
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
        <div id="msg" class="msg"></div>
    </div>
    <div class="split_admin right">
        <div class="top">
        <form>
        <input type="button" value="Предметы" class="btn_dbs" onclick=showInfo(<?php echo '"1"';?>)>
        <input type="button" value="Учителя" class="btn_dbs" onclick=showInfo(<?php echo '"2"';?>)>
        <input type="button" value="Ученики" class="btn_dbs" onclick=showInfo(<?php echo '"3"';?>)>
        </form>
        </div>
        <div id="tableForm"></div>
    </div>   
  </body>
</html>