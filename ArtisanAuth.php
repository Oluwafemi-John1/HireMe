<?php
    require('Config.php');
    class ArtisanAuth extends Config {
        public function createArtisan($first_name, $last_name, $email, $password) {
            $query = "INSERT INTO `artisan_tb`(`first_name`, `last_name`, `email`, `password`) VALUES('$first_name', '$last_name', '$email', '$password')";
            $saveArtisan = mysqli_query($this->connection, $query);
            if($saveArtisan) {
                echo json_encode(['status' => 200, 'message' => 'artisan sign up successful']);
            } else {
                echo json_encode(['status' => 500, 'message' => 'artisan sign up failed']);
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
    $auth->createArtisan($first_name, $last_name, $email, $password);
    // $auth->createArtisan('Femi', 'John', 'fm2@gmail.com', '123456')
?>