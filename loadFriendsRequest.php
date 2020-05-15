<?php
    require_once('./class/Conexao.php');
    require_once('./class/User.php');
    $user = new User();
    
    session_start();
    $email = $_SESSION['user'];

    echo json_encode($user->pushFriendNotification($email));
?>