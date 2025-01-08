<?php
// Controllers/ModuleController.php

declare(strict_types=1);

require_once __DIR__ . '/../Business/ModuleService.php';


class ModuleController
{
    private ModuleService $moduleService;

    public function __construct(PDO $pdo)
    {
        $this->moduleService = new ModuleService($pdo);
    }

    // Lijst alle modules en de bijbehorende punten indien een module is geselecteerd.
    public function lijstModules(): void
    {
        try {
            // Fetch all modules
            $modules = $this->moduleService->getAllModules();

            // Handle selected module and fetch grades
            $selectedModuleId = isset($_POST['module']) ? (int)$_POST['module'] : null;
            $grades = [];
            if ($selectedModuleId) {
                $grades = $this->moduleService->getGradesByModule($selectedModuleId);
            }

            // Pass data to the view
            require __DIR__ . '/../Presentation/view_modules.php';
        } catch (PDOException $e) {
            echo "Databasefout: " . htmlspecialchars($e->getMessage());
            exit;
        } catch (Exception $e) {
            echo "Fout: " . htmlspecialchars($e->getMessage());
            exit;
        }
    }
}
