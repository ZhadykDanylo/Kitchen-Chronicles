<?php

class UserDTO
{
    public int $userId;
    public string $username;
    public string $email;
    public string $role;
    public string $password;

    public function __construct(int $userId, string $username, string $email, string $password, string $role)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
    }

    public function getId(): int {
        return $this->userId;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getRole(): string {
        return $this->role;
    }
}

?>