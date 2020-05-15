<?php
    require_once('./class/Conexao.php');
    require_once('./class/User.php');

    session_start();
    $myEmail = $_SESSION['user'];
    $friendEmail = $_POST['id'];
    $user = new user();

    $array = $user->importIdFriendship($myEmail, $friendEmail);
    echo $array['ID_FRIENDSHIP'];
?>