<?php
    require_once('./class/Conexao.php');
    require_once('./class/User.php');

    $user = new User();
    $accept = $_POST['accept'];
    $id_friendship = $_POST['id'];
   
    if($accept == 1):
        $user->acceptFriend($id_friendship);
    else:
        $user->negFriend($id_friendship);
    endif;
?>