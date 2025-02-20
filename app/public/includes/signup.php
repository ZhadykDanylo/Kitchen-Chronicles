<?php

require_once(__DIR__ . '/../controllers/UserController.php');

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["password_repeat"];

    $signup = new UserController($username, $password, $email, $repeatPassword, null);
    $signup->signUpUser();
    header("location: /?error=none");
}