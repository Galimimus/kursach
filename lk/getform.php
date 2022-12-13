<?php 
switch ($_GET['q']){
    case "1":
        echo '<form>
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
                            <label>класс</label>
                            </td>
                            <td>
                                <input type="text" id="grade" class="form-control" placeholder="1a" required/>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td>
                            <label>имя ученика</label>
                            </td>
                            <td>
                                <input type="text" id="fio" class="form-control" placeholder="Иванов Иван Иванович" required/>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <input type="button" value="Добавить" class="btn btn-primary" name="add_student" onclick=changedb("add_student")></input>
                        </td>
                    </tr>
                </table>
            </form>';
            break;
    case "2":
        echo '<form>
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
                                <input type="text" id="fio" class="form-control" placeholder="Иванов Иван Иванович" required/>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <input type="button" value="Добавить" class="btn btn-primary" name="add_teacher" onclick=changedb("add_teacher")></input>
                        </td>
                    </tr>
                </table>
            </form>';
            break;

    case "3":
        echo '<form>
            <table>
                <tr>
                    <div class="form-group">
                        <td colspan = "2">
                            <label>Добавить предмет</label>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                        <label>предмет</label>
                        </td>
                        <td>
                            <input type="text" id="subject" class="form-control" placeholder="Физика" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                        <label>класс</label>
                        </td>
                        <td>
                            <input type="text" id="grade" class="form-control" placeholder="8a" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type="button" value="Добавить" class="btn btn-primary" name="add_subject" onclick=changedb("add_subject")></input>
                    </td>
                </tr>
            </table>
        </form>';
        break;

        case "4":
            echo '<form method="POST" action="">
            <table>
                <tr>
                    <div class="form-group">
                        <td colspan = "2">
                            <label>Добавить предметы учителю</label>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                        <label>имя учителя</label>
                        </td>
                        <td>
                            <input type="text" id="fio" class="form-control" placeholder="Иванов Иван Иванович" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                        <label>предмет</label>
                        </td>
                        <td>
                            <input type="text" id="subject" class="form-control" placeholder="Физика" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>
                        <label>класс</label>
                        </td>
                        <td>
                            <input type="text" id="grade" class="form-control" placeholder="8a" required/>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type="button" value="Добавить" class="btn btn-primary" name="add_subject_to_teacher" onclick=changedb("add_subject_to_teacher")></input>
                    </td>
                </tr>
            </table>
        </form>';
        break;
}
?>



 
<!-- 
    
ДОБАВЛЕНИЕ ФОРМ!!!!
ДОБАВЛЕНИЕ ДЕФОЛТА!!!



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
                <label>класс</label>
                </td>
                <td>
                    <input type="text" name="grade" class="form-control" placeholder="1а" required/>
                </td>
            </div>
        </tr>
        <tr>
            <div class="form-group">
                <td>
                <label>имя студента</label>
                </td>
                <td>
                    <input type="text" name="fio" class="form-control" placeholder="Иванов Иван Иванович" required/>
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
                    <input type="text" name="fio" class="form-control" placeholder="Иванов Иван Иванович" required/>
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
-->     