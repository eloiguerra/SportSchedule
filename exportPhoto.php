<?php
    session_start();
    $email = $_SESSION['user'];
    require_once('./class/Conexao.php');

    $select = "SELECT PROFILE_PHOTO FROM USERS WHERE EMAIL LIKE ?";
    $stmt = Conexao::getConn()->prepare($select);
    $stmt->bindValue(1, $email);
    $stmt->execute();

    $result = $stmt->fetchAll();

    foreach($result as $photo):
        echo $photo['PROFILE_PHOTO'];
    endforeach;
?>