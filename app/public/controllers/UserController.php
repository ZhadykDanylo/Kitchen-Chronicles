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
                header("Location: ../../views/pages/login.php?form=signup&error=empty_fields");
                exit();
            }

            // 2. Validate email format
            if (!$email) {
                header("Location: ../../views/pages/login.php?form=signup&error=invalid_email");
                exit();
            }

            // 3. Password confirmation
            if ($password !== $passwordRepeat) {
                header("Location: ../../views/pages/login.php?form=signup&error=password_mismatch");
                exit();
            }

            // 4. Check password strength
            if (!$this->isPasswordStrong($password)) {
                die("Password must have at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.");
            }

            // 5. Check if user already exists
            if ($this->userModel->userExists($email)) {
                header("Location: ../../views/pages/login.php?form=signup&error=user_exists");
                exit();
            }

            // 6. Create the user
            if ($this->userModel->createUser($username, $email, $password)) {
                header("Location: ../../views/pages/login.php?form=signup&success=registered");
                exit();
            } else {
                header("Location: ../../views/pages/login.php?form=signup&error=registration_failed");
                exit();
            }
        }
    }

    private function isPasswordStrong($password)
    {
        $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/';
        return preg_match($pattern, $password);
    }
}
?>