<?php
// Business/PersoonService.php

declare(strict_types=1);

require_once __DIR__ . '/../Data/PersoonDAO.php';


class PersoonService
{
    private PersoonDAO $persoonDAO;

    public function __construct(PDO $pdo)
    {
        $this->persoonDAO = new PersoonDAO($pdo);
    }

    // Haalt alle personen op.
    public function getAllPersonen(): array
    {
        return $this->persoonDAO->getAllPersonen();
    }

    // Andere business methoden kunnen hier worden toegevoegd
}
