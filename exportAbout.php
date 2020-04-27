<?php
    session_start();
    $email = $_SESSION['user'];
    require_once('./class/Conexao.php');

    $select = "SELECT FULL_NAME, DATEOFBIRTH, DESCRIPTION FROM USERS WHERE EMAIL LIKE ?";
    $stmt = Conexao::getConn()->prepare($select);
    $stmt->bindValue(1, $email);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach($result as $user):
        echo json_encode($user);
    endforeach;
?>