<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

class Config
{
    //  DB name, host, username, paswword;
    protected $host = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $database = 'hire_me';
    protected $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        // print_r($this->connection);
    }
}

$newConfig = new Config;
