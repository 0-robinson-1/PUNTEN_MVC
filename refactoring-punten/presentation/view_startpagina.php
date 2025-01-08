<?php
// Presentation/view_startpagina.php
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startpagina</title>
    <link rel="stylesheet" href="presentation/css/style.css">
</head>

<body>
    <div class="view-startpagina">
        <h1>Welkom bij mijn MVC Applicatie</h1>
        <!-- Navigatieknoppen -->
        <div class="navigation-buttons">
            <button onclick="window.location.href='index.php?action=voegPuntenToe';">Punten Ingeven</button>
            <button onclick="window.location.href='index.php?action=overzichtPunten';">Punten Overzicht</button>
            <button onclick="window.location.href='index.php?action=overzichtPerPersoon';">Overzicht per Persoon</button>
            <button onclick="window.location.href='index.php?action=lijstModules';">Lijst van Modules</button>
            <button onclick="window.location.href='index.php?action=lijstPersonen';">Lijst van Personen</button>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Mijn MVC Applicatie</p>
    </footer>
</body>

</html>