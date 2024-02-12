<?php
    require_once('../DataBase/DB.php');

    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $present = false;

    $DB = new DB();

    $sql= "SELECT * FROM utenti WHERE username=? AND email=? AND password=?";
    $params = [$user, $email, $pass];
    $types = "sss";
    $result = $DB->preparedQuery($sql, $params, $types);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    setcookie('username', $row['username'], time() + 86400, '/');
    header("Location: ../index.php");
    } else {
        echo "Login fallito. Verifica le credenziali.";
    }
?>
