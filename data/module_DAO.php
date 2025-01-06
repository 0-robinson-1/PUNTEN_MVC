<?php

declare(strict_types=1);

require_once 'Entities/Module.php';
require_once 'DBConfig.php';

class ModuleDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllModules(): array
    {
        $modules = [];
        $query = "SELECT id, naam, prijs FROM modules";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $modules[] = new Module(
                    (int)$row['id'],
                    $row['naam'],
                    (float)$row['prijs']
                );
            }
        } catch (PDOException $e) {
            error_log("Failed to fetch modules: " . $e->getMessage());
        }
        return $modules;
    }
}
