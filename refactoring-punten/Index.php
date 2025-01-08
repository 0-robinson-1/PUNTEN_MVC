<?php
// index.php
declare(strict_types=1);

// Enable error reporting (voor ontwikkeling)
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Vereiste bestanden voor basis functionaliteit
require_once __DIR__ . '/DBConfig.php';

// Initialiseer de PDO-verbinding via DBConfig
$pdo = DBConfig::getInstance()->getConnection();

// Bepaal de actie op basis van de query parameter 'action'
$action = $_GET['action'] ?? 'startpagina';

// Routeer het verzoek naar de juiste controller en methode
switch ($action) {
    case 'startpagina':
        // Toon de startpagina view
        require_once __DIR__ . '/Presentation/view_startpagina.php';
        break;
    case 'voegPuntenToe':
        require_once __DIR__ . '/Controllers/PuntenController.php';
        $controller = new PuntenController($pdo);
        $controller->voegPuntenToe();
        break;
    case 'lijstPersonen':
        require_once __DIR__ . '/Controllers/PersoonController.php';
        $persoonController = new PersoonController($pdo);
        $persoonController->lijstPersonen();
        break;
    case 'lijstModules':
        require_once __DIR__ . '/Controllers/ModuleController.php';
        $moduleController = new ModuleController($pdo);
        $moduleController->lijstModules();
        break;
    case 'overzichtPunten':
        require_once __DIR__ . '/Controllers/OverzichtPuntenController.php';
        $overzichtController = new OverzichtPuntenController($pdo);
        $overzichtController->toonOverzicht();
        break;
    case 'overzichtPerPersoon':
        require_once __DIR__ . '/Controllers/OverzichtPerPersoonController.php';
        $overzichtPerPersoonController = new OverzichtPerPersoonController($pdo);
        $overzichtPerPersoonController->toonOverzicht();
        break;
    default:
        http_response_code(404);
        echo "Fout: Pagina niet herkend.";
        break;
}
