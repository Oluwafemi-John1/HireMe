<?php
    require('Config.php');
    class Auth extends Config {
        public function createCustomer($first_name, $last_name, $email, $password) {
            $query = "INSERT INTO `customer_tb`(`first_name`, `last_name`, `email`, `password`) VALUES('$first_name', '$last_name', '$email', '$password')";
            $saveCustomer = mysqli_query($this->connection, $query);
            if($saveCustomer) {
                echo 'customer sign up successful';
                // return ;
            } else {
                echo 'customer creation failed';
            }
        }
    }

    $auth = new Auth;
    $auth->createCustomer('Femi', 'John', 'fm@gmail.com', '123456')
?>