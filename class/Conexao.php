<?php
    class Conexao{
        private static $instance;

        public static function getConn(){
            if(!isset(self::$instance)):
                try {
                    self::$instance = new PDO('mysql:host=localhost;dbname=SPORTSCHEDULE;charset=utf8','root','');
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            endif;

            return self::$instance;
        }
    }
?>