<?php
    class Db{
        private $host = "localhost";
        private $dbName = "sistema-votacion";
        private $user = "root";
        private $password = "";

        public function conection(){
            try {
                $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbName,$this->user,$this->password);
                return $PDO;
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }
    $obj = new Db();
    //print_r($obj->conection());
?>
