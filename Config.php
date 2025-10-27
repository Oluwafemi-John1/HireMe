<?php 
    class Config {
        //  DB name, host, username, paswword;
        protected $host = 'localhost';
        protected $username = 'root';
        protected $password = '';
        protected $database = 'hire_me';

        protected function connectToDB() {
            mysqli_connect($this->host, $this->username, $this->password, $this->database);
        }
    }
?>