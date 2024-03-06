<?php
require 'connection.php';

$response = array();

if(isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checkUser = "SELECT * FROM user WHERE email='$email'";
    $checkQuery = mysqli_query($con, $checkUser);

    if(mysqli_num_rows($checkQuery) > 0) {
        $response['status'] = "403";
        $response['message'] = "User exists";
    } else {
        $insertQuery = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($con, $insertQuery);

        if($result) {
            $response['status'] = "200";
            $response['message'] = "Registration successful!";
        } else {
            $response['status'] = "400";
            $response['message'] = "Registration failed!";
        }
    }
} else {
    $response['status'] = "400";
    $response['message'] = "Incomplete data";
}

echo json_encode($response);
?>
