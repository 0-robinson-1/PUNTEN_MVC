<?php
// index.php

declare(strict_types=1);

// Vereiste bestanden voor basis functionaliteit
require_once 'DBConfig.php';

// Bepaal de actie op basis van de query parameter 'action'
$action = $_GET['action'] ?? 'voegPuntenToe';

// Routeer het verzoek naar de juiste controller en methode
switch ($action) {
    case 'voegPuntenToe':
        require_once 'Controllers/PuntenController.php';
        $controller = new PuntenController($pdo);
        $controller->voegPuntenToe();
        break;

    case 'lijstPersonen':
        require_once 'Controllers/PersoonController.php';
        $persoonController = new PersoonController($pdo);
        $persoonController->lijstPersonen();
        break;

    case 'lijstModules':
        require_once 'Controllers/ModuleController.php';
        $moduleController = new ModuleController($pdo);
        $moduleController->lijstModules();
        break;

    default:
        echo "fout: pagina niet herkend.";
        break;
}
