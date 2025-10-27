<?php
    require('Config.php');
    class Auth extends Config {
        public function createCustomer($first_name, $last_name, $email, $password) {
            "INSERT INTO `customer_tb`(`first_name`, `last_name`, `email`, `password`) VALUES($first_name, $last_name, $email, $password)";
        }
    }
?>