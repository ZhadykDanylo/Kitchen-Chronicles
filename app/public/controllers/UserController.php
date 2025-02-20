<?php

require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../dto/UserDTO.php';

class UserController
{
    private $email;
    private $username;
    private $password;
    private $repeatPassword;
    private $userModel;


    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getUser($email, $password) {
        if (empty($email) || empty($password)) {
            header("location: /login?error=emptyinput");
            exit();
        }

        return $this->userModel->getUser($email, $password);
    }

    

    public function signUpUser() {
        if ($this->emptySignUpValidation() == false) {
            header("location: /login?error=emptyinput");
            exit();
        }

        if ($this->usernameValidation() == false) {
            header("location: /login?error=invalidusername");
            exit();
        }

        if ($this->emailValidation() == false) {
            header("location: /login?error=invalidemail");
            exit();
        }

        if ($this->passwordMatch() == false) {
            header("location: /login?error=nopasswordmatch");
            exit();
        }

        if ($this->checkUser() == true) {
            header("location: /login?error=userexists");
            exit();
        }

        $this->userModel->setUser($this->email, $this->username, $this->password);
    }

    private function emptySignUpValidation(): bool
    {
        if (empty($this->email) || empty($this->username) || empty($this->password) || empty($this->repeatPassword)) {
            return false;
        }

        return true;
    }

    private function usernameValidation(): bool {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            return false;
        }

        return true;
    }

    private function emailValidation(): bool {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    private function passwordMatch(): bool
    {
        if ($this->password !== $this->repeatPassword) {
            return false;
        }

        return true;
    }

    public function checkUser(): bool {
        return !$this->userModel->checkUser($this->email, $this->username);
    }
}