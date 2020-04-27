<?php
    require_once('./class/Conexao.php');
    require_once('./class/User.php');

    $user = new User();
    echo $user->registerUser($_POST['emailRegister'], $_POST['nameRegister'], $_POST['passwordRegister'], $_POST['dateOfBirthRegister']);
?>