<?php
// Controllers/PuntenController.php

declare(strict_types=1);

require_once __DIR__ . '/../Business/PuntenService.php';


class PuntenController
{
    private PuntenService $puntenService;


    // PuntenController constructor.
    public function __construct(PDO $pdo)
    {
        $this->puntenService = new PuntenService($pdo);
    }

    // Voegt punten toe en toont het punten invoer formulier.
    public function voegPuntenToe(): void
    {
        $message = '';
        $error = '';

        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $persoon_id = isset($_POST['persoon']) ? (int)$_POST['persoon'] : null;
                $module_id = isset($_POST['module']) ? (int)$_POST['module'] : null;
                $punt = isset($_POST['grade']) ? (int)$_POST['grade'] : null;

                // Extra validatie
                if ($persoon_id <= 0 || $module_id <= 0 || $punt === null) {
                    $error = "Ongeldige invoer.";
                } elseif ($punt < 0 || $punt > 10) {
                    $error = "De score moet tussen 0 en 10 liggen.";
                } else {
                    // Controleer of de persoon en module bestaan
                    $personen = $this->puntenService->haalAllePersonen();
                    $modules = $this->puntenService->haalAlleModules();

                    $persoonIds = array_map(fn($p) => $p->getId(), $personen);
                    $moduleIds = array_map(fn($m) => $m->getId(), $modules);

                    if (!in_array($persoon_id, $persoonIds, true) || !in_array($module_id, $moduleIds, true)) {
                        $error = "Geselecteerde persoon of module bestaat niet.";
                    } else {
                        $success = $this->puntenService->voegPuntenToe($persoon_id, $module_id, $punt);
                        if ($success) {
                            $message = "Punten succesvol toegevoegd.";
                        } else {
                            $error = "Fout bij het toevoegen van punten.";
                        }
                    }
                }
            }

            // Haal benodigde data op voor de form
            $personen = $this->puntenService->haalAllePersonen();
            $modules = $this->puntenService->haalAlleModules();

            // Pass data naar de view
            require __DIR__ . '/../Presentation/view_punten.php';
        } catch (PDOException $e) {
            // Gedetailleerde foutmelding voor debugging
            echo "<p class='error'>Databasefout: " . htmlspecialchars($e->getMessage()) . "</p>";
            exit;
        } catch (Exception $e) {
            // Algemene foutmelding
            echo "<p class='error'>Fout: " . htmlspecialchars($e->getMessage()) . "</p>";
            exit;
        }
    }
}
