<?php
// Controllers/PersoonController.php

declare(strict_types=1);

require_once __DIR__ . '/../Business/PersoonService.php';


class PersoonController
{
    private PersoonService $persoonService;

    public function __construct(PDO $pdo)
    {
        $this->persoonService = new PersoonService($pdo);
    }

    // Lijst alle personen.
    public function lijstPersonen(): void
    {
        try {
            $personen = $this->persoonService->getAllPersonen();

            // Pass data naar de view
            require __DIR__ . '/../Presentation/view_personen.php';
        } catch (PDOException $e) {
            echo "Databasefout: " . htmlspecialchars($e->getMessage());
            exit;
        } catch (Exception $e) {
            echo "Fout: " . htmlspecialchars($e->getMessage());
            exit;
        }
    }
}
