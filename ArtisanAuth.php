<?php
require('Config.php');
class ArtisanAuth extends Config
{
    public function createArtisan($first_name, $last_name, $email, $password)
    {
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $confirmQuery = "SELECT * FROM customer_tb WHERE email='$email'";
        $result = mysqli_query($this->connection, $confirmQuery);

        if (mysqli_num_rows($result) > 0) {
            echo json_encode(['status' => 400, 'message' => 'Account already exist']);
        } else {
            $query = "INSERT INTO `artisan_tb`(`first_name`, `last_name`, `email`, `password`) VALUES('$first_name', '$last_name', '$email', '$hashedPassword')";
            $saveArtisan = mysqli_query($this->connection, $query);
            if ($saveArtisan) {
                echo json_encode(['status' => 200, 'message' => 'artisan sign up successful']);
            } else {
                echo json_encode(['status' => 500, 'message' => 'artisan sign up failed']);
            }
        }
    }

    public function loginArtisan($email, $password)
    {
        $query = "SELECT * FROM artisan_tb WHERE email='$email'";
        $result = mysqli_query($this->connection, $query);
        $foundUser = mysqli_fetch_assoc($result);
        // print_r($foundUser);

        if(mysqli_num_rows($result) > 0) {
                $verifiedUser = password_verify($password, $foundUser['password']);
                // echo $verifiedUser;
                if ($verifiedUser) {
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
$input = file_get_contents('php://input');
$artisanDetails = json_decode($input); // Converts the details into what PHP understands
$first_name = $artisanDetails->first_name;
$last_name = $artisanDetails->last_name;
$email = $artisanDetails->email;
$password = $artisanDetails->password;

$auth = new ArtisanAuth;
// if ($first_name && $last_name) {
//     $auth->createArtisan($first_name, $last_name, $email, $password);
// } else {
//     $auth->loginArtisan($email, $password);
// }
// $auth->createArtisan('Femi', 'John', 'fm222@gmail.com', '123456');
$auth->loginArtisan('roma2@mailinator.com', 'Femi1234$');
