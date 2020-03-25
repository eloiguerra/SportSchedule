<?php
    require_once('./class/Conexao.php');
    require_once('./class/User.php');

    $user = new User();
    echo $user->verifyLogin($_POST['emailLogin'], $_POST['passwordLogin']);
?>