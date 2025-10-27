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

    // Receive from frontend
    $input = file_get_contents('php://input');
    $customerDetails = json_decode($input); // COnverts the details into what PHP understands

    $auth = new Auth;
    $auth->createCustomer('Femi', 'John', 'fm2@gmail.com', '123456')
?>