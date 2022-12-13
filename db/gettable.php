<?php
include '/var/www/html/lk/kursach/db/admin.php';

switch ($_GET['q']){
    case "1"://subjects 
        $link = db_connect();
        $sql = "SELECT * FROM subjects";
        $result = mysqli_query($link,$sql);
        echo "<table>";
            echo "<tr>";
                echo "<td><b>ID предмета(subject_id)</b></td>";
                echo "<td><b>Название предмета(name)</b></td>";
                echo "<td><b>Класс(grade_name)</b></td>";
            echo "</tr>";
        foreach($result as $row){
            echo "<tr>";
                echo "<td>" . $row["subject_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["grade_name"] . "</td>";
            echo "</tr>";
        }
        echo "</table>"; 
        mysqli_close($link);
        $result->free();
        break;

    case "2"://teachers
        $link = db_connect();
        $sql = "SELECT * FROM employees";
        $result = mysqli_query($link,$sql);
        echo "<table>";
            echo "<tr>";
                    echo "<td><b>ID сотрудника(id)</b></td>";
                    echo "<td><b>Имя(name)</b></td>";
                    echo "<td><b>Предметы(subjects_id)</b></td>";
                    echo "<td><b>Классы(grades_id)</b></td>";
             echo "</tr>";
        foreach($result as $row){
            echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["subjects_id"] . "</td>";
                echo "<td>" . $row["grades_id"] . "</td>";
            echo "</tr>";
        }
        echo "</table>"; 
        mysqli_close($link);
        $result->free();
        break;

    case "3"://students
        $link = db_connect();
        $sql = "SELECT * FROM grades";
        $result = mysqli_query($link,$sql);
        echo "<table>";
        echo "<tr>";
                echo "<td><b>Класс(grade_name)</b></td>";
                echo "<td><b>ID студента(student_id)</b></td>";
                echo "<td><b>Имя(student_name)</b></td>";
        echo "</tr>";
        foreach($result as $row){
            echo "<tr>";
                echo "<td>" . $row["grade_name"] . "</td>";
                echo "<td>" . $row["student_id"] . "</td>";
                echo "<td>" . $row["student_name"] . "</td>";
            echo "</tr>";
        }
        echo "</table>"; 
        mysqli_close($link);
        $result->free();
        break;
    default:
        echo "badidabudai";
        break;
}
