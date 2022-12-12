<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>signup</title>
        <style>
            table {
             width: 300px;
             margin: auto; 
             margin-top:10%;
             border-spacing: 10px 20px;
            }
            td {
             text-align: center; 
             padding: 5px; 
            }
            label{
                color: blue;
            }
            .block1{
                color: red;

            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
    <?php
    include '/var/www/html/lk/kursach/db/admin.php';
//переделать под аякс?? 
//добавить подсказки, сообщения об ошибках и тд
    if(isset($_POST['add_student']))
    {
        $fio = $_POST['fio'];
        $grade = $_POST['grade'];
        $pass = add_student($grade, $fio);
        echo $pass;

    }else if(isset($_POST['add_teacher'])){
        $fio = $_POST['fio'];
        $pass = add_teacher($fio);
        echo $pass;

    } else if (isset($_POST['add_student'])) {
        $fio = $_POST['fio'];
        $grade = $_POST['grade'];
        remove_student($grade, $fio);
    }else if(isset($_POST['delete_teacher'])){
        $fio = $_POST['fio'];
        remove_teacher($fio);
    }
    ?>
        <form method="POST" action="">
            <table>
                <tr>
                    <div class="form-group">
                        <td colspan = "2">
                            <label>Добавить ученика</label>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                        <label>название класса</label>
                        </td>
                        <td>
                            <input type="text" name="grade" class="form-control" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                        <label>имя студента</label>
                        </td>
                        <td>
                            <input type="text" name="fio" class="form-control" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type="submit" value="Добавить" class="btn btn-primary" name="add_student"/>
                    </td>
                </tr>
            </table>
        </form>



        <form method="POST" action="">
            <table>
                <tr>
                    <div class="form-group">
                        <td colspan = "2">
                            <label>Добавить учителя</label>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                        <label>имя учителя</label>
                        </td>
                        <td>
                            <input type="text" name="fio" class="form-control" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type="submit" value="Добавить" class="btn btn-primary" name="add_teacher"/>
                    </td>
                </tr>
            </table>
        </form>


        <form method="POST" action="">
            <table>
                <tr>
                    <div class="form-group">
                        <td colspan = "2">
                            <label>Удалить ученика</label>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                        <label>название класса</label>
                        </td>
                        <td>
                            <input type="text" name="grade" class="form-control" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                        <label>имя студента</label>
                        </td>
                        <td>
                            <input type="text" name="fio" class="form-control" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type="submit" value="Удалить" class="btn btn-primary" name="delete_student"/>
                    </td>
                </tr>
            </table>
        </form>


        <form method="POST" action="">
            <table>
                <tr>
                    <div class="form-group">
                        <td colspan = "2">
                            <label>Удалить учителя</label>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                        <label>имя учителя</label>
                        </td>
                        <td>
                            <input type="text" name="fio" class="form-control" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type="submit" value="Удалить" class="btn btn-primary" name="delete_teacher"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
