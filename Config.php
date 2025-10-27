<?php 
    class Config {
        //  DB name, host, username, paswword;
        protected $host = 'localhost';
        protected $username = 'root';
        protected $password = '';
        protected $database = 'hire_me';
        protected $connection;

        protected function __construct() {
            $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        }
    }
?>