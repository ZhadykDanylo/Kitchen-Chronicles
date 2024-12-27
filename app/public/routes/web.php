<?php
    require_once '../controllers/UserController.php';

    $userController = new UserController();

    // Route handling
    if (isset($_GET['route'])) {
        switch ($_GET['route']) {
            case 'signup':
                $userController->register();
                break;
            case 'login':
                $userController->login();
                break;
            default:
                echo "404 - Page Not Found";
                break;
        }
    } else {
        echo "No route specified.";
    }
?>