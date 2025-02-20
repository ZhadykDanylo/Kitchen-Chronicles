<?php

// require the user controller so we can use it in this file
require_once(__DIR__ . "/../controllers/UserController.php");

// // any request for the /users route will be handled by this function
// Route::add('/users', function () {
//     $userController = new UserController(); // create a new user controller
//     $users = $userController->getAll(); // get data data for the view
//     require_once(__DIR__ . "/../views/pages/users.php"); // load the view
// });

// // any request for a specific user will be handled by this route, i.e. /user/2
// // the dynamic part of the url path gets passed in as the $userId variable
// Route::add('/user/([a-z-0-9-]*)', function ($userId) {
//     $userController = new UserController(); // create a new user controller
//     $user = $userController->get($userId); // get data for the view
//     require_once(__DIR__ . "/../views/pages/user.php"); // load the view
// });

Route::add("/api/users/login", function () {
    // Read raw input
    $rawData = json_decode(file_get_contents("php://input"), true);

    if (!$rawData) {
        file_put_contents("debug_log.txt", "JSON Decode Error: " . json_last_error_msg() . "\n", FILE_APPEND);
        http_response_code(400);
        echo json_encode(["error" => json_last_error()]);
        return;
    }

    // if (!isset($rawData['email']) || !isset($data['password'])) {
    //     file_put_contents("debug_log.txt", "Missing email/password\n", FILE_APPEND);
    //     http_response_code(400);
    //     echo json_encode(["error" => "Email and password are required"]);
    //     return;
    // } u need to write it in js

    $email = $rawData['email'];
    $password = $rawData['password'];

    $userController = new UserController();
    $user = $userController->getUser($email, $password);

    if ($user) {
        $_SESSION['user'] = [
            "userId" => $user->getId(),
            "username" => $user->getUsername(),
            "email" => $user->getEmail(),
            "role" => $user->getRole()
        ];
    } else {
        http_response_code(401);
        echo json_encode(["error" => "Invalid credentials"]);
    }
}, 'post');