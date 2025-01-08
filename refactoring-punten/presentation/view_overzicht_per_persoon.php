<?php
// Presentation/view_overzicht_per_persoon.php
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Punten per Persoon</title>
    <link rel="stylesheet" href="presentation/css/style.css">
</head>

<body>
    <h1>Overzicht Punten per Persoon</h1>
    <?php if (!empty($overzicht) && !empty($modules) && !empty($personen)): ?>
        <table>
            <thead>
                <tr>
                    <th>Module</th>
                    <?php foreach ($personen as $persoon): ?>
                        <th><?= htmlspecialchars($persoon->getNaam()) ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($overzicht as $module): ?>
                    <tr>
                        <td><?= htmlspecialchars($module['naam']) ?></td>
                        <?php foreach ($personen as $persoon): ?>
                            <td><?= htmlspecialchars($module['punten'][$persoon->getId()]) ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Geen gegevens gevonden.</p>
    <?php endif; ?>
    <!-- Navigatieknoppen -->
    <div class="navigation-buttons">
        <button onclick="window.location.href='index.php?action=voegPuntenToe';">Voeg Punten Toe</button>
        <button onclick="window.location.href='index.php?action=startpagina';">Terug naar Startpagina</button>
    </div>
    <footer>
        <p>&copy; 2025 Mijn MVC Applicatie</p>
    </footer>
</body>

</html>