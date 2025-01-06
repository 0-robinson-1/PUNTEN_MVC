<?php
// Presentation/view_persoon.php
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personen Lijst</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Lijst van Personen</h1>

    <?php if (!empty($personen)): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Email</th>
            </tr>
            <?php foreach ($personen as $persoon): ?>
                <tr>
                    <td><?= htmlspecialchars($persoon->getId()) ?></td>
                    <td><?= htmlspecialchars($persoon->getNaam()) ?></td>
                    <td><?= htmlspecialchars($persoon->getEmail()) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Geen personen gevonden.</p>
    <?php endif; ?>

    <!-- Navigatieknoppen -->
    <div class="navigation-buttons">
        <button onclick="window.location.href='index.php?action=voegPuntenToe';">Terug naar Punten Toevoegen</button>
    </div>

    <footer>
        &copy; 2025 Mijn MVC Applicatie
    </footer>
</body>

</html>