<?php
class Database
{
    private $host = 'localhost';
    private $dbName = 'developmentdb';
    private $username = 'developer';
    private $password = 'secret123';
    private $pdo;

    public function connect()
    {
        if ($this->pdo == null) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->dbName}";
                $this->pdo = new PDO($dsn, $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}
?>