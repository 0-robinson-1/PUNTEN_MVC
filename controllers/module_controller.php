<?php
//module_controller.php

declare(strict_types=1);

require_once ("module_service.php");

    // Initialiseer handlers
    $moduleLijst = new ModuleHandler($pdo);
    $modules = $moduleLijst->getAllModules();

    $selectedModuleId = isset($_POST['module']) ? (int)$_POST['module'] : null;
    $grades = [];

    if ($selectedModuleId) {
        $puntenLijst = new PuntenHandler($pdo);
        $grades = $puntenLijst->haalPuntenOpPerModule($selectedModuleId);
    }
} catch (PDOException $e) {
    echo "Databasefout: " . $e->getMessage();
    exit;
} catch (Exception $e) {
    echo "Fout: " . $e->getMessage();
    exit;
}

?>