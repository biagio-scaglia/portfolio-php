<?php
include 'config.php'; // Include il file di configurazione per connettersi al database

// Controlla se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera i dati del modulo
    $titolo = $_POST['titolo'];
    $descrizione = $_POST['descrizione'];
    $immagine = $_FILES['immagine']['name'];

    // Carica l'immagine nel server
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($immagine);
    move_uploaded_file($_FILES['immagine']['tmp_name'], $target_file);

    // Inserisci il nuovo progetto nel database
    $sql = "INSERT INTO progetti (titolo, descrizione, immagine) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$titolo, $descrizione, $immagine]);

    // Messaggio di successo
    echo "<p>Progetto aggiunto con successo!</p>";
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Aggiungi Progetto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Panello di Amministrazione</h1>
        </div>
    </header>

    <section id="add-project">
        <div class="container">
            <h2>Aggiungi un Nuovo Progetto</h2>
            <form action="admin.php" method="POST" enctype="multipart/form-data">
                <label for="titolo">Titolo del Progetto:</label>
                <input type="text" id="titolo" name="titolo" required>

                <label for="descrizione">Descrizione:</label>
                <textarea id="descrizione" name="descrizione" required></textarea>

                <label for="immagine">Immagine del Progetto:</label>
                <input type="file" id="immagine" name="immagine" >

                <button type="submit" class="btn save">Aggiungi Progetto</button>
            </form>
        </div>
    </section>
</body>
</html>
