<?php
    class user{
        
        private $email;
        private $name;
        private $password;
        private $dateOfBirth;

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function getDateOfBirth(){
            return $this->dateOfBirth;
        }

        public function setDateOfBirth($dateOfBirth){
            $this->dateOfBirth = $dateOfBirth;
        }

        public function verifyLogin($emailLogin, $passwordLogin){
            $select = "SELECT EMAIL FROM USERS WHERE EMAIL LIKE ? AND PASS_WORD LIKE ?"; 
            $stmt = Conexao::getConn()->prepare($select);
            $stmt->bindValue(1, $emailLogin);
            $stmt->bindValue(2, $passwordLogin);
            $stmt->execute();

            if($stmt->rowCount() > 0):
                if (session_status() !== PHP_SESSION_ACTIVE):
                    session_start();
                    $_SESSION['user'] = $emailLogin;
                    $update = "UPDATE USERS SET ACTIVE = ? WHERE EMAIL LIKE ?";
                    $stmt = Conexao::getConn()->prepare($update);
                    $stmt->bindValue(1, 1);
                    $stmt->bindValue(2, $emailLogin);
                    $stmt->execute();
                endif;          
                return true;
            else:
                return false;
            endif;
        }

        public function registerUser($emailRegister, $nameRegister, $passwordRegister, $dateOfBirthRegister){
            $default = 'default';

            $select = "SELECT EMAIL FROM USERS WHERE EMAIL LIKE ?";
            $stmt = Conexao::getConn()->prepare($select);
            $stmt->bindValue(1, $emailRegister);
            $stmt->execute();

            if($stmt->rowCount() > 0):
                return false;
            else:
                session_start();
                $_SESSION['user'] = $emailRegister;
                $photo = './ProfilePhoto/default.png';
                
                $insert = "INSERT INTO USERS(FULL_NAME, PASS_WORD, DATEOFBIRTH, USERTYPE, ACTIVE, PROFILE_TYPE, PROFILE_PHOTO, EMAIL) 
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = Conexao::getConn()->prepare($insert);
                $stmt->bindValue(1, $nameRegister);
                $stmt->bindValue(2, $passwordRegister);
                $stmt->bindValue(3, $dateOfBirthRegister);
                $stmt->bindValue(4, $default);
                $stmt->bindValue(5, 1);
                $stmt->bindValue(6, 'public');
                $stmt->bindValue(7, $photo);
                $stmt->bindValue(8, $emailRegister);
                $stmt->execute();
                return true;
            endif;
        }

        public function searchUser($search){
            session_start();
            $email = $_SESSION['user'];

            $select = "SELECT PROFILE_PHOTO, FULL_NAME, EMAIL FROM USERS WHERE FULL_NAME LIKE ? AND EMAIL NOT LIKE ? LIMIT 6";
            $stmt = Conexao::getConn()->prepare($select);
            $stmt->bindValue(1, $search);
            $stmt->bindValue(2, $email);
            $stmt->execute();

            if($stmt->rowCount() > 0):
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            else:
                return 0;
            endif;
        }

        public function profileVisit($id){
            $select = "SELECT PROFILE_PHOTO, PROFILE_TYPE, FULL_NAME, DATEOFBIRTH, DESCRIPTION
            FROM USERS
            WHERE EMAIL LIKE ?";
            $stmt = Conexao::getConn()->prepare($select); 
            $stmt->bindValue(1, $id);  
            $stmt->execute();
            return $stmt->fetchObject();         
        }

        public function friendRequest($myEmail, $friendEmail){
            $select = "SELECT FRIEND_REQUEST
            FROM FRIENDS
            WHERE USER_EMAIL LIKE ? OR FRIEND_EMAIL LIKE ?
            AND USER_EMAIL LIKE ? OR FRIEND_EMAIL LIKE ?";
            $stmt = Conexao::getConn()->prepare($select);
            $stmt->bindValue(1, $myEmail);
            $stmt->bindValue(2, $myEmail);
            $stmt->bindValue(3, $friendEmail);
            $stmt->bindValue(4, $friendEmail);
            $stmt->execute();
           
            if($stmt->rowCount() == 0):
                $insert = "INSERT INTO FRIENDS(USER_EMAIL, FRIEND_EMAIL, FRIEND_REQUEST) VALUES(?, ?, ?)";
                $stmt = Conexao::getConn()->prepare($insert);
                $stmt->bindValue(1, $myEmail);
                $stmt->bindValue(2, $friendEmail);
                $stmt->bindValue(3, 1);
                $stmt->execute();

                return 2;
            else:
                $result = $stmt->fetchObject();
                if($result->FRIEND_REQUEST == 1):
                    return 1;
                else:
                    return 0;
                endif;
            endif;
        }
    }
?>