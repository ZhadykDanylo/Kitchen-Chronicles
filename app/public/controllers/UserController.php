<?php
require_once '../models/UserModel.php';
require_once '../lib/Database.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $database = new Database();
        $this->userModel = new UserModel($database->connect());
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars(trim($_POST['username']));
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $password = trim($_POST['password']);
            $passwordRepeat = trim($_POST['password_repeat']);

            // 1. Check for empty fields
            if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
                exit();
            }

            // 2. Validate email format
            if (!$email) {
                exit();
            }

            // 3. Password confirmation
            if ($password !== $passwordRepeat) {
                exit();
            }

            // 4. Check password strength
            if (!$this->isPasswordStrong($password)) {
                exit();
            }

            // 5. Check if user already exists
            if ($this->userModel->userExists($email)) {
                exit();
            }

            // 6. Create the user
            $this->userModel->createUser($username, $email, $password);
        }
    }

    // Helper function to validate password strength
    private function isPasswordStrong($password)
    {
        // Password must be at least 8 characters, include 1 uppercase, 1 number, and 1 special character
        $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/';
        return preg_match($pattern, $password);
    }
}
?>