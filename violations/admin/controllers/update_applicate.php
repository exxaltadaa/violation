<?php

    include "../../function/connect.php";

    if(isset($_GET['action'])){
        switch ($_GET['action']) {
            case 'success':
                $sql = sprintf("UPDATE `statement` SET `status`='%s' WHERE `statement_id` = '%s'", 'Подтвержден', $_GET['id']);
                $connect -> query($sql);
                header("Location: ../../admin/");
                exit;

            case 'cancel':
                $sql = sprintf("UPDATE `statement` SET `status`='%s' WHERE `statement_id` = '%s'", 'Отменен', $_GET['id']);
                $connect -> query($sql);
                header("Location: ../../admin/");
                exit;
        }
    }
?>