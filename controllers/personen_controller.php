<?php

declare(strict_types=1);

require_once 'Business/PersoonService.php';

class PersoonController
{
    private PersoonService $persoonService;

    public function __construct(PDO $pdo)
    {
        $this->persoonService = new PersoonService($pdo);
    }

    public function lijstPersonen(): void
    {
        $personen = $this->persoonService->getAllPersonen();
        require 'Presentation/view_persoon.php';
    }
}
?>
