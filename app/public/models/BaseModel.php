<?php

require_once(__DIR__ . "/../lib/env.php");

class BaseModel {
    protected $pdo;

    public function __construct() {
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        $charset = $_ENV['DB_CHARSET'];

        // Debugging statements
        error_log("DB_HOST: $host");
        error_log("DB_NAME: $dbname");
        error_log("DB_USER: $user");
        error_log("DB_PASSWORD: $password");
        error_log("DB_CHARSET: $charset");

        if (!$host || !$dbname || !$user || !$password || !$charset) {
            throw new Exception('Database configuration is not set properly.');
        }

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
