<?php
    require_once('./class/Conexao.php');
    require_once('./class/User.php');
    $search = '%'.$_POST['search'].'%';

    $array = array();
    $user = new User();
    
    echo json_encode($user->searchUser($search));
?>