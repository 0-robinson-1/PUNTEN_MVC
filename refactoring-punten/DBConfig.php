<?php
// Data/DBConfig.php


class DBConfig
{
    private static ?DBConfig $instance = null;
    private PDO $connection;

    private string $host = 'localhost';
    private string $db_name = 'cursusphp';
    private string $username = 'root';
    private string $password = '';

    private function __construct()
    {
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
            // Zet PDO foutmodus op Exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database verbinding mislukt: " . $e->getMessage());
        }
    }

    // Methode om de PDO-verbinding te krijgen.
    public function getConnection(): PDO
    {
        return $this->connection;
    }

    // Methode om de singleton instantie te krijgen.
    public static function getInstance(): DBConfig
    {
        if (self::$instance === null) {
            self::$instance = new DBConfig();
        }
        return self::$instance;
    }
}
