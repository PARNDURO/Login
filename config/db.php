<?php
    class Database 
    {
        private $host = "localhost";
        private $db_name = "login";
        private $username = "root";
        private $password = "";
        public $conn;

        public function getConnection(){
            $this->conn = null;
            try {
                $this->conn = new PDO ("mysql:host=$this->host;port=3307;dbname=$this->db_name", 
$this->username, $this->password );
                $this->conn->exec("set names utf8");
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $exception) {
                error_log("Error de conexion a base de datos: " . $exception->getMessage());
                return null;
            }
            return $this->conn;
        }
    }
?>