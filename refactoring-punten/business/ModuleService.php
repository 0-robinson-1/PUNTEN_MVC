<?php
// Business/ModuleService.php

declare(strict_types=1);

require_once __DIR__ . '/../Data/ModuleDAO.php';
require_once __DIR__ . '/../Data/PuntenDAO.php';


class ModuleService
{
    private ModuleDAO $moduleDAO;
    private PuntenDAO $puntenDAO;

    public function __construct(PDO $pdo)
    {
        $this->moduleDAO = new ModuleDAO($pdo);
        $this->puntenDAO = new PuntenDAO($pdo);
    }

    
    // Haalt alle modules op.
    public function getAllModules(): array
    {
        return $this->moduleDAO->getAllModules();
    }

    // Haalt punten op voor een specifieke module.
    public function getGradesByModule(int $moduleId): array
    {
        return $this->puntenDAO->getAllPuntenMetDetails($moduleId);
    }

    // Andere business methoden kunnen hier worden toegevoegd
}
