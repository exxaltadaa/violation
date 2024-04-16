<?php
    include "connect.php";

    function fnGetProfile($login){

        global $connect;

        $sql = sprintf("SELECT `surname`, `name`, `patronymic`, `phone` FROM `user` WHERE `login` = '%s'", $login);

        if(!$result = $connect->query($sql)){
            echo "Ошибка получения данных";
        }

        $row = $result->fetch_assoc();

        $data = sprintf('<p><b>Фамилия:</b> %s<br>
                <b>Имя:</b> %s<br>
                <b>Отчество:</b> %s<br>
                <b>Телефон:</b> %s</p>', 
                $row["surname"], $row["name"], $row["patronymic"], $row["phone"]);
        
        return $data;
    }

    function fnGetTablProfile($login){
        global $connect;

        $select = "SELECT `user_id` FROM `user` WHERE `login` = '" . $login . "'";
        $select_result = $connect->query($select);
        $select_row = $select_result->fetch_assoc();
        $id = $select_row['user_id'];

        $data = '<table border="1px"><tr><th>Нарушение</th><th>Статус</th><th>Гос номер автомабиля</th><th>Описание</th></tr>';
    
        $sql = sprintf("SELECT `number`, `number_car`, `message`, `status` FROM `statement` INNER JOIN `user` ON `statement`.`user_id` =  `user`.`user_id` WHERE `statement`.`user_id` = '%s' ORDER BY `statement_id` DESC", $id);

        if(!$result = $connect->query($sql)){
            echo "Ошибка получения данных";
        }

        while($row = $result->fetch_assoc()){
            if($row['status'] == 'Отменен'){
                $data .= sprintf('<tr>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                </tr>', $row['number'], $row['status'], $row['number_car'], $row['message']);
            }elseif($row['status'] == 'Подтвержден'){
                $data .= sprintf('<tr>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                </tr>
                            ', $row['number'], $row['status'], $row['number_car'], $row['message']);
            }else{
                $data .= sprintf('
                                <tr>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                </tr>
                            ', $row['number'], $row['status'], $row['number_car'], $row['message']);
            }
            
        }
        $data .= "<table>";
        return $data;
    }

    function fnGetTablAdmin(){

        global $connect;

        $data = '<table border="1px"><tr><th>Нарушение</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Статус</th><th>Гос номер автомобиля</th><th>Описание</th></tr>';

        $sql = "SELECT `statement_id`,`surname`, `name`, `patronymic`, `number`, `number_car`, `message`, `status` FROM `statement` INNER JOIN `user` ON `statement`.`user_id` =  `user`.`user_id` ORDER BY `statement_id` DESC";

        if(!$result = $connect->query($sql)){
            echo "Ошибка получения данных";
        }

        while($row = $result->fetch_assoc()){
            if($row['status'] == 'Отменен'){
                $data .= sprintf('<tr>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                </tr>', $row['number'], $row['surname'], $row['name'], $row['patronymic'], $row['status'], $row['number_car'], $row['message']);
            }elseif($row['status'] == 'Подтвержден'){
                $data .= sprintf('<tr>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                </tr>', $row['number'], $row['surname'], $row['name'], $row['patronymic'], $row['status'], $row['number_car'], $row['message']);
            }else{
                $data .= sprintf('<tr>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>
                                        <a href="controllers/update_applicate.php?id=%s&action=success">Подтвердить</a>
                                        <a href="controllers/update_applicate.php?id=%s&action=cancel">Отменить</a>
                                    </td>
                                </tr>', $row['number'], $row['surname'], $row['name'], $row['patronymic'], $row['status'], $row['number_car'], $row['message'], $row['statement_id'], $row['statement_id']);
            }
            
        }
        $data .= "</table>";

        return $data;
    }

?>