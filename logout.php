<?php
    require_once('./class/Conexao.php');

    if(session_status() == PHP_SESSION_ACTIVE):
        session_start();
        /*echo $email = $_SESSION['user'];
        $update = "UPDATE USERS SET ACTIVE = ? WHERE EMAIL LIKE ?";
        $stmt = Conexao::getConn()->prepare($update);
        $stmt->bindValue(1, 0);
        $stmt->bindValue(2, $email);
        $stmt->execute();
        */
        session_unset();
        session_destroy();
    endif;

    header('Location: index.php');
?>