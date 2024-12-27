<?php
require_once '../models/UserModel.php';
require_once '../config/database.php';

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

            // Check for empty fields
            if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
                $_SESSION['error'] = "All fields are required.";
                return;
            }

            // Validate email format
            if (!$email) {
                $_SESSION['error'] = "Invalid email format.";
                return;
            }

            // Password confirmation
            if ($password !== $passwordRepeat) {
                $_SESSION['error'] = "Passwords do not match.";
                return;
            }

            // Check password strength
            if (!$this->isPasswordStrong($password)) {
                $_SESSION['error'] = "Password must have at least 8 characters, including uppercase, lowercase, numbers, and special characters.";
                return;
            }

            // Check if user already exists
            if ($this->userModel->userExists($email)) {
                $_SESSION['error'] = "User already exists.";
                return;
            }

            // Create the user
            if ($this->userModel->createUser($username, $email, $password)) {
                $_SESSION['success'] = "Registration successful!";
            } else {
                $_SESSION['error'] = "Registration failed. Please try again.";
            }
        }
    }

    public function login()
    {
        session_start();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $password = trim($_POST['password']);
    
            if (empty($email) || empty($password)) {
                $_SESSION['error'] = "Email and password are required.";
                header("Location: ../../views/pages/login.php?form=login");
                exit();
            }
    
            $user = $this->userModel->userExists($email);
    
            if (!$user || !password_verify($password, $user['password'])) {
                $_SESSION['error'] = "Invalid email or password.";
                header("Location: ../../views/pages/login.php?form=login");
                exit();
            }
    
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email']
            ];
    
            header("Location: ../../views/pages/index.php"); // Redirect to a dashboard or home page
            exit();
        } else {
            echo "Invalid request method.";
            exit();
        }
    }

    private function isPasswordStrong($password)
    {
        $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/';
        return preg_match($pattern, $password);
    }
}
?>