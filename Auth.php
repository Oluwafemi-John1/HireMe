<?php
require('Config.php');
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth extends Configuration
{
    public function createCustomer()
    {
        $input = file_get_contents('php://input');
        $customerDetails = json_decode($input);
        $first_name = $customerDetails->first_name;
        $last_name = $customerDetails->last_name;
        $email = $customerDetails->email;
        $password = $customerDetails->password;
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $confirmQuery = "SELECT * FROM customer_tb WHERE email='$email'";
        $result = mysqli_query($this->connection, $confirmQuery);
        // print_r($result);
        if (mysqli_num_rows($result) > 0) {
            echo json_encode(['status' => 400, 'message' => 'Account already exist']);
        } else {
            $query = "INSERT INTO `customer_tb`(`first_name`, `last_name`, `email`, `password`) VALUES('$first_name', '$last_name', '$email', '$hashedPassword')";
            $saveCustomer = mysqli_query($this->connection, $query);
            if ($saveCustomer) {
                echo json_encode(['status' => 200, 'message' => 'customer sign up successful']);
            } else {
                echo json_encode(['status' => 500, 'message' => 'customer creation failed']);
            }
        }
    }

    public function loginCustomer($email, $password)
    {
        $query = "SELECT * FROM customer_tb WHERE email='$email'";
        $result = mysqli_query($this->connection, $query);
        $foundUser = mysqli_fetch_assoc($result);
        // print_r($foundUser);

        if (mysqli_num_rows($result) > 0) {
            $verifiedUser = password_verify($password, $foundUser['password']);
            // echo $verifiedUser;
            if ($verifiedUser) {
                // Create JWT here
                $payload = [
                    'user_id' => $foundUser['customer_id'],
                    'email' => $foundUser['email'],
                    'first_name' => $foundUser['first_name'],
                    'role' => $foundUser['customer'],
                    'iat' => time(),
                    'role' => time() + 3600
                ];

                $token = JWT::encode($payload, $_ENV['SECRET_KEY'], 'HS256');
                // store token into the database
                $customer_id = $foundUser['customer_id'];
                $updateQuery = "UPDATE `customer_tb` SET `token`='$token' WHERE customer_id='$customer_id'";

                mysqli_query($this->connection, $updateQuery);
                echo json_encode(['status' => 200, 'message' => 'Login successful']);
            } else {
                echo json_encode(['status' => 400, 'message' => 'Email or password is incorrect']);
            }
        } else {
            echo json_encode(['status' => 400, 'message' => 'account does not exist. Kindly sign up first']);
        }
    }
}

// Receive from frontend
// $input = file_get_contents('php://input');
// $customerDetails = json_decode($input); // COnverts the details into what PHP understands
// $first_name = $customerDetails->first_name;
// $last_name = $customerDetails->last_name;
// $email = $customerDetails->email;
// $password = $customerDetails->password;

// $auth = new Auth;
// if ($first_name && $last_name) {
//     $auth->createCustomer($first_name, $last_name, $email, $password);
// } else {
//     $auth->loginCustomer($email, $password);
// }
// $auth->createCustomer('Femi', 'John', 'fm@gmail.com', '123456')
// $auth->loginCustomer('roma@mailinator.com', 'Femi1234$')

// $secretKey = bin2hex(random_bytes(32));
// echo $secretKey;