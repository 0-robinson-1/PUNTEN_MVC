<?php

declare(strict_types=1);

require_once 'Data/PersoonHandler.php';

class PersoonService
{
    private PersoonHandler $persoonHandler;

    public function __construct(PDO $pdo)
    {
        $this->persoonHandler = new PersoonHandler($pdo);
    }

    public function getAllPersonen(): array
    {
        return $this->persoonHandler->getAllPersonen();
    }

    // Andere business methoden kunnen hier worden toegevoegd
}
?>