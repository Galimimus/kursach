<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <style>
            table {
             width: 300px;
             margin: auto; 
             margin-top:20%;
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
        
        <form method="POST" action="db/students.php" class="form-inline">
            <table>
            <tr>
                    <td colspan="2">
                        <label>Вход в личный кабинет учащихся</label>
                    </td>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                            <label>Класс</label>
                        </td>
                        <td>
                            <input type="text" placeholder="1a" name="grade" class="form-control" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                            <label>ФИО</label>
                        </td>
                        <td>
                            <input type="text" name="fio" placeholder="Иванов Иван Иванович" class="form-control" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                            <label for="pwd">Пароль</label>
                        </td>
                        <td>
                            <input type="password" name="pass" class="form-control" maxlength="30" 
                             title="Пароль должен быть введен на английском языке, содержать не менее 8 символов и не более 30, буквы верхнего и нижнего регистра, как минимум одну цифру."
                              required/><!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"-->
                        </td>
                    </div>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type="submit" value="Войти" class="btn btn-primary"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href = "recovery.php" class="block1">Forgot your password?</href>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
