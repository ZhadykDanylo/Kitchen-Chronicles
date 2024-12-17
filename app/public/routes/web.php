<?php
require_once '../controllers/UserController.php';

$controller = new UserController();

if (isset($_GET['route'])) {
    switch ($_GET['route']) {
        case 'register':
            $controller->register();
            break;
        default:
            echo "404 - Page Not Found";
            break;
    }
}
?>