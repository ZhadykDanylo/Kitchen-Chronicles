<?php
    class UserModel
    {
        private $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function userExists($email)
        {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt -> execute([':email' => $email]);
            return $stmt -> fetch();
        }

        public function createUser($username, $email, $password)
        {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare(
                "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)"
            );
            return $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $hashedPassword
            ]);
        }
    }
?>