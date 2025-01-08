<?php
// Presentation/view_personen.php
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personen Lijst</title>
    <link rel="stylesheet" href="presentation/css/style.css">
</head>

<body>
    <h1>Lijst van Personen</h1>
    <?php if (!empty($personen)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personen as $persoon): ?>
                    <tr>
                        <td><?= htmlspecialchars($persoon->getId()) ?></td>
                        <td><?= htmlspecialchars($persoon->getNaam()) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Geen personen gevonden.</p>
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