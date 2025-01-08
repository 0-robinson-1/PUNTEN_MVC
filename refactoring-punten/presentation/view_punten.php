<?php
// Presentation/view_punten.php
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punten Ingeven</title>
    <link rel="stylesheet" href="presentation/css/style.css">
</head>

<body>
    <h1>Punten Ingeven</h1>
    <?php if (!empty($message)): ?>
        <p class="success"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post" action="index.php?action=voegPuntenToe">
        <label for="persoon">Persoon:</label>
        <select name="persoon" id="persoon" required>
            <?php foreach ($personen as $persoon): ?>
                <option value="<?= htmlspecialchars($persoon->getId()) ?>">
                    <?= htmlspecialchars($persoon->getNaam()) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="module">Module:</label>
        <select name="module" id="module" required>
            <?php foreach ($modules as $module): ?>
                <option value="<?= htmlspecialchars($module->getId()) ?>">
                    <?= htmlspecialchars($module->getNaam()) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="grade">Punten:</label>
        <input type="number" name="grade" id="grade" min="0" max="10" step="1" required>

        <button type="submit" class="voeg-punt-toe-button">Voeg Punten Toe</button>
    </form>
    <!-- Navigatieknoppen -->
    <div class="navigation-buttons">
        <button onclick="window.location.href='index.php?action=lijstModules';">Toon Modules</button>
        <button onclick="window.location.href='index.php?action=lijstPersonen';">Toon Personen</button>
        <button onclick="window.location.href='index.php?action=startpagina';">Terug naar Startpagina</button>
    </div>
    <footer>
        <p>&copy; 2025 Mijn MVC Applicatie</p>
    </footer>
</body>

</html>