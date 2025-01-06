<?php
// Presentation/view_punten.php
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Punten ingeven</title>
</head>

<body>
    <h1>Punten ingeven</h1>

    <?php if (isset($message)): ?>
        <p style="color: green;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
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
        <br>

        <label for="module">Module:</label>
        <select name="module" id="module" required>
            <?php foreach ($modules as $module): ?>
                <option value="<?= htmlspecialchars($module->getId()) ?>">
                    <?= htmlspecialchars($module->getNaam()) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="grade">Grade:</label>
        <input type="number" name="grade" id="grade" min="0" max="10" step="1" required>
        <br>

        <button type="submit">Voeg punten toe</button>
    </form>

    <!-- Navigatieknoppen -->
    <div style="margin-top: 20px;">
        <button onclick="window.location.href='index.php?action=lijstModules';">Toon per module</button>
    </div>
    <div style="margin-top: 20px;">
        <button onclick="window.location.href='index.php?action=lijstPersonen';">Toon per persoon</button>
    </div>
</body>

</html>