<?php
   session_start();
   $email = $_SESSION['user'];
   require_once('./class/Conexao.php');
   
   $filename = $_FILES['file']['name'];
   $location = "ProfilePhoto/".$filename;
   $uploadOk = 1;

   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   
   $valid_extensions = array("jpg","jpeg","png");
   
   if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
      $uploadOk = 0;
   }
   
   if($uploadOk == 0){
      echo 0;
   }
   else{  
      $newName = 'ProfilePhoto/'.md5(uniqid($filename)).".".$imageFileType;  
     
      if(move_uploaded_file($_FILES['file']['tmp_name'],$newName)){
         $insert = "UPDATE USERS SET PROFILE_PHOTO = ? WHERE EMAIL like ?";
         $stmt = Conexao::getConn()->prepare($insert);
         $stmt->bindValue(1, $newName);
         $stmt->bindValue(2, $email);
         $stmt->execute();
         echo 1;
      }else{
         echo 0;
      }
   }
?>