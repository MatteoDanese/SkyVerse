<?php
    require_once('../DataBase/DB.php');

    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $DB = new DB();

    $sql= "SELECT * FROM utenti WHERE username=? AND email=?";
    $params = [$user, $email];
    $types = "ss";
    $result = $DB->preparedQuery($sql, $params, $types);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($pass, $row['password'])) {
            setcookie('username', $row['username'], time() + 86400, '/');
            header("Location: ../index.php");
            exit();
        } else {
            echo "Login fallito, verifica la password";
        }
    } else {
        echo "Login fallito, l'utente non è stato trovato.";
    }
?>
