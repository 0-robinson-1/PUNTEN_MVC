<?php
// Controllers/OverzichtPerPersoonController.php

declare(strict_types=1);

require_once __DIR__ . '/../Business/PuntenService.php';


class OverzichtPerPersoonController
{
    private PuntenService $puntenService;

    public function __construct(PDO $pdo)
    {
        $this->puntenService = new PuntenService($pdo);
    }

    // Toont het overzicht van punten per persoon per module.
    public function toonOverzicht(): void
    {
        try {
            // Haal alle personen op
            $personen = $this->puntenService->haalAllePersonen();
            
            // Haal alle modules op
            $modules = $this->puntenService->haalAlleModules();

            // Controleer of modules niet leeg zijn
            if (empty($modules)) {
                throw new Exception("Geen modules gevonden.");
            }

            // Haal alle punten op
            $allePunten = $this->puntenService->haalAllePuntenMetDetails();

            // Organiseer punten per module per persoon
            $overzicht = [];
            foreach ($modules as $module) {
                $overzicht[$module->getId()] = [
                    'naam' => $module->getNaam(),
                    'punten' => []
                ];
                foreach ($personen as $persoon) {
                    $overzicht[$module->getId()]['punten'][$persoon->getId()] = 0;
                }
            }

            foreach ($allePunten as $punt) {
                $persoonId = $punt['persoon_id'];
                $moduleId = $punt['module_id'];
                if (isset($overzicht[$moduleId]['punten'][$persoonId])) {
                    $overzicht[$moduleId]['punten'][$persoonId] += $punt['punt'];
                }
            }

            // Pass data naar de view
            require __DIR__ . '/../Presentation/view_overzicht_per_persoon.php';
        } catch (PDOException $e) {
            echo "<p class='error'>Databasefout: " . htmlspecialchars($e->getMessage()) . "</p>";
            exit;
        } catch (Exception $e) {
            echo "<p class='error'>Fout: " . htmlspecialchars($e->getMessage()) . "</p>";
            exit;
        }
    }
}
?>
