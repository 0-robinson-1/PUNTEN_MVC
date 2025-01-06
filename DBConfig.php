<?php
// DBConfig.php

class DBConfig
{
    private static $instance = null;
    private $connection;

    private $host = 'localhost';
    private $db_name = 'cursusphp';
    private $username = 'root';
    private $password = '';

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

    // Methode om de PDO-verbinding te krijgen
    public function getConnection()
    {
        return $this->connection;
    }

    // Methode om de instantie te krijgen
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DBConfig();
        }
        return self::$instance;
    }
}
