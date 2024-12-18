<?php
include 'config.php';

$sql = "SELECT * FROM progetti ORDER BY data_creazione DESC";
$stmt = $conn->query($sql);
$progetti = $stmt->fetchAll();
?>

<ul>
    <?php foreach ($progetti as $progetto): ?>
        <li>
            <h2><?= htmlspecialchars($progetto['titolo']) ?></h2>
            <p><?= htmlspecialchars($progetto['descrizione']) ?></p>
            <img src="<?= htmlspecialchars($progetto['url_immagine']) ?>" alt="Immagine Progetto" width="200">
            <a href="<?= htmlspecialchars($progetto['link_progetto']) ?>">Visita il Progetto</a>
        </li>
    <?php endforeach; ?>
</ul>
