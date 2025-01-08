<?php
// Controllers/OverzichtPuntenController.php

declare(strict_types=1);

require_once __DIR__ . '/../Business/PuntenService.php';


class OverzichtPuntenController
{
    private PuntenService $puntenService;

    public function __construct(PDO $pdo)
    {
        $this->puntenService = new PuntenService($pdo);
    }

    // Toont het totaaloverzicht van punten.
    public function toonOverzicht(): void
    {
        try {
            // Haal alle punten op
            $allePunten = $this->puntenService->haalAllePuntenMetDetails();

            // Pass data naar de view
            require __DIR__ . '/../Presentation/view_overzicht_punten.php';
        } catch (PDOException $e) {
            echo "<p class='error'>Databasefout: " . htmlspecialchars($e->getMessage()) . "</p>";
            exit;
        } catch (Exception $e) {
            echo "<p class='error'>Fout: " . htmlspecialchars($e->getMessage()) . "</p>";
            exit;
        }
    }
}
