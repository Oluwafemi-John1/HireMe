<?php
    require('Config.php');
    class Auth extends Config {
        public function createCustomer() {
            "INSERT INTO `customer_tb`(`first_name`, `last_name`, `email`, `password`)";
        }
    }
?>