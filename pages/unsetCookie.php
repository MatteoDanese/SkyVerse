<?php
    $cookieName = 'username';
    setcookie($cookieName, '', time() - 3600, '/');
    header("Location: ../index.php");
    exit();
?>