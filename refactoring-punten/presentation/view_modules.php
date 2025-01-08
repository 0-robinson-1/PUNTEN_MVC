<?php
// Presentation/view_modules.php
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modules Lijst</title>
    <link rel="stylesheet" href="presentation/css/style.css">
</head>

<body>
    <h1>Lijst van Modules</h1>
    <?php if (!empty($modules)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modules as $module): ?>
                    <tr>
                        <td><?= htmlspecialchars($module->getId()) ?></td>
                        <td><?= htmlspecialchars($module->getNaam()) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Geen modules gevonden.</p>
    <?php endif; ?>
    <!-- Navigatieknoppen -->
    <div class="navigation-buttons">
        <button onclick="window.location.href='index.php?action=overzichtPunten';">Punten Overzicht</button>
        <button onclick="window.location.href='index.php?action=overzichtPerPersoon';">Overzicht per Persoon</button>
        <button onclick="window.location.href='index.php?action=voegPuntenToe';">Terug naar Punten Toevoegen</button>
    </div>
    <footer>
        &copy; 2025 Mijn MVC Applicatie
    </footer>
</body>

</html>