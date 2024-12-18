<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM progetti WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    $progetto = $stmt->fetch();
    if (!$progetto) {
        die("Progetto non trovato.");
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titolo = $_POST['titolo'];
    $descrizione = $_POST['descrizione'];
    $url_immagine = $_POST['url_immagine'];
    $link_progetto = $_POST['link_progetto'];

    $sql = "UPDATE progetti SET titolo = :titolo, descrizione = :descrizione, url_immagine = :url_immagine, link_progetto = :link_progetto WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':titolo' => $titolo,
        ':descrizione' => $descrizione,
        ':url_immagine' => $url_immagine,
        ':link_progetto' => $link_progetto,
        ':id' => $id
    ]);
    header("Location: dettagli_progetto.php?id=$id");
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Progetto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Modifica Progetto</h1>
    </header>
    <main>
        <form action="modifica_progetto.php" method="POST">
            <input type="hidden" name="id" value="<?= $progetto['id'] ?>">
            <input type="text" name="titolo" value="<?= htmlspecialchars($progetto['titolo']) ?>" required>
            <textarea name="descrizione" required><?= htmlspecialchars($progetto['descrizione']) ?></textarea>
            <input type="text" name="url_immagine" value="<?= htmlspecialchars($progetto['url_immagine']) ?>">
            <input type="text" name="link_progetto" value="<?= htmlspecialchars($progetto['link_progetto']) ?>">
            <button type="submit" class="btn save">Salva</button>
        </form>
        <p><a href="index.php">Torna alla home</a></p>
    </main>
</body>
</html>
