<?php
require_once '../controllers/UserController.php';

// Instantiate UserController
$userController = new UserController();

// Route handling
if (isset($_GET['route'])) {
    switch ($_GET['route']) {
        case 'register':
            $userController->register();
            break;
        case 'login':
            // Add login handling here later
            break;
        default:
            echo "404 - Page Not Found";
            break;
    }
} else {
    echo "No route specified.";
}
?>