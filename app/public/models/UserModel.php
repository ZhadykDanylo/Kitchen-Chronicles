<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{

    public function getUser($email, $password) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ? OR username = ?;');
     
        if (!$stmt->execute([$email, $email])) {
            http_response_code(500);
            echo json_encode(["error" => "Database error"]);
            exit();
        }
     
        if ($stmt->rowCount() == 0) {
            http_response_code(401);
            echo json_encode(["error" => "User not found"]);
            exit();
        }
     
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!password_verify($password, $user["password"])) {
            http_response_code(401);
            echo json_encode(["error" => "Incorrect password"]);
            exit();
        }
     
        // Return user data as JSON
        return new UserDTO($user["userId"], $user["username"], $user["email"], $user["password"], $user["role"]);
    }

    public function resetPassword($email, $password)
    {
        $stmt = $this->pdo->prepare('UPDATE users SET password = ? WHERE email = ?');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->execute(array($hashedPassword, $email));
    }

    public function setUser($email, $username, $password)
    {
        $stmt = $this->pdo->prepare('INSERT INTO users (email, username, password) VALUES (?, ?, ?);');
        
        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        if (!$stmt->execute([$email, $username, $hashedPassword])) {
            error_log("Database error: " . implode(", ", $stmt->errorInfo()));
            $stmt = null;
            header("location: /?error=stmtfailed");
            exit();
        }
    
        $stmt = null;
    }

    public function checkUser($email, $username): bool {
        if (empty($email) || empty($username)) {
            header("location: /?error=emptyfields");
            exit();
        }
    
        $stmt = $this->pdo->prepare('SELECT username FROM users WHERE email = ? OR username = ?;');
    
        if (!$stmt->execute([$email, $username])) {
            error_log("Database error: " . implode(", ", $stmt->errorInfo()));
            $stmt = null;
            header("location: /?error=stmtfailed");
            exit();
        }
    
        $userExists = $stmt->rowCount() > 0;
        $stmt = null;
    
        return !$userExists; // Returns true if no user is found
    }
}
?>