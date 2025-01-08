<?php
// Data/ModuleDAO.php

declare(strict_types=1);

require_once __DIR__ . '/../Entities/Module.php';

class ModuleDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Haalt alle modules op.
    public function getAllModules(): array
    {
        $query = "SELECT id, naam FROM modules";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $modules = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $modules[] = new Module((int)$row['id'], $row['naam']);
            }
            return $modules;
        } catch (PDOException $e) {
            error_log("Failed to getAllModules: " . $e->getMessage());
            return [];
        }
    }

    // Andere CRUD-methoden kunnen hier worden toegevoegd
}
