<?php
    session_start();
    $email = $_SESSION['user'];
    $description = $_POST['description'];
    require_once('./class/Conexao.php');

    $update = "UPDATE USERS SET DESCRIPTION = ? WHERE EMAIL LIKE ?";
    $stmt = Conexao::getConn()->prepare($update);
    $stmt->bindValue(1, $description);
    $stmt->bindValue(2, $email);
    $stmt->execute();

    echo 1;
?>