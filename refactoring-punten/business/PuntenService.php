<?php
// Business/PuntenService.php

declare(strict_types=1);

require_once __DIR__ . '/../Data/PuntenDAO.php';
require_once __DIR__ . '/../Data/PersoonDAO.php';
require_once __DIR__ . '/../Data/ModuleDAO.php';


class PuntenService
{
    private PuntenDAO $puntenDAO;
    private PersoonDAO $persoonDAO;
    private ModuleDAO $moduleDAO;

    public function __construct(PDO $pdo)
    {
        $this->puntenDAO = new PuntenDAO($pdo);
        $this->persoonDAO = new PersoonDAO($pdo);
        $this->moduleDAO = new ModuleDAO($pdo);
    }

    //Voegt punten toe voor een persoon en module.
    public function voegPuntenToe(int $persoon_id, int $module_id, int $punt): bool
    {
        return $this->puntenDAO->voegPuntenToe($persoon_id, $module_id, $punt);
    }

    // Haalt alle personen op.
    public function haalAllePersonen(): array
    {
        return $this->persoonDAO->getAllPersonen();
    }

    // Haalt alle modules op.
    public function haalAlleModules(): array
    {
        return $this->moduleDAO->getAllModules();
    }

    // Haalt alle punten met details op.
    public function haalAllePuntenMetDetails(): array
    {
        return $this->puntenDAO->getAllPuntenMetDetails();
    }
    // Andere business methoden kunnen hier worden toegevoegd
}
