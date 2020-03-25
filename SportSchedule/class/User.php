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
                $insert = "INSERT INTO USERS(FULL_NAME, PASS_WORD, DATEOFBIRTH, USERTYPE, EMAIL) 
                VALUES(?, ?, ?, ?, ?)";
                $stmt = Conexao::getConn()->prepare($insert);
                $stmt->bindValue(1, $nameRegister);
                $stmt->bindValue(2, $passwordRegister);
                $stmt->bindValue(3, $dateOfBirthRegister);
                $stmt->bindValue(4, $default);
                $stmt->bindValue(5, $emailRegister);
                $stmt->execute();
                return true;
            endif;
        }
    }
?>