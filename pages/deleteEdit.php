<?php

    $index = $_POST['index'];
    $headerFile = $_POST['nameFile'];

//    $docs = json_decode(file_get_contents('documentSpace.json'), true);

/* JSON

    if(isset($docs[$index])){
        if(isset($_POST['delete'])){
            unset($docs[$index]);
        }
        file_put_contents('documentSpace.json', json_encode($docs));
        header("Location: space.php");
        exit();
    }
*/
    require_once('../DataBase/DB.php');
    $DB = new DB();

    $sql = "DELETE FROM documents WHERE id = ?";
    $params = [$index];
    $types = "i";
    $result = $DB->preparedQuery($sql, $params, $types);
    header("Location: " . $headerFile);
?>