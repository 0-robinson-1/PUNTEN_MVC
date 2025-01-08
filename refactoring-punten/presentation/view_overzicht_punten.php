<?php
// Presentation/view_overzicht_punten.php
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Punten</title>
    <link rel="stylesheet" href="presentation/css/style.css">
</head>

<body>
    <h1>Overzicht Punten</h1>
    <?php if (!empty($allePunten)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Persoon</th>
                    <th>Module</th>
                    <th>Punten</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allePunten as $punt): ?>
                    <tr>
                        <td><?= htmlspecialchars($punt['punt_id']) ?></td>
                        <td><?= htmlspecialchars($punt['voornaam'] . ' ' . $punt['familienaam']) ?></td>
                        <td><?= htmlspecialchars($punt['module_naam']) ?></td>
                        <td><?= htmlspecialchars($punt['punt']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Geen punten gevonden.</p>
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