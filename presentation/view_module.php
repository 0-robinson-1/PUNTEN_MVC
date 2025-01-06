<?php
// Presentation/view_module.php
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Modules Lijst</title>
</head>

<body>
    <h1>Lijst van Modules</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Beschrijving</th>
        </tr>
        <?php foreach ($modules as $module): ?>
            <tr>
                <td><?= htmlspecialchars($module->getId()) ?></td>
                <td><?= htmlspecialchars($module->getNaam()) ?></td>
                <td><?= htmlspecialchars($module->getBeschrijving()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Navigatieknoppen -->
    <div style="margin-top: 20px;">
        <button onclick="window.location.href='index.php?action=voegPuntenToe';">Terug naar Punten Toevoegen</button>
    </div>
</body>

</html>