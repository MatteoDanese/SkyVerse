<?php
    require_once('../DataBase/DB.php');

    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $DB = new DB();

    $sql= "INSERT INTO utenti (username, email, password) VALUES (?, ?, ?)";
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

    #------------------------BACKUP SU FILE JSON-------------------------
    $utenti = json_decode(file_get_contents('utenti.json'), true);
    $utente = [
        'username' => $user,
        'email' => $email,
        'password' => $pass
    ];
    $utenti[] = $utente;
    file_put_contents('utenti.json', json_encode($utenti, JSON_PRETTY_PRINT));

    #------------------------/BACKUP SU FILE JSON/-------------------------
    header("Location: login.php");
?>