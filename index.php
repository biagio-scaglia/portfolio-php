<?php
include 'config.php';

// Recupera i dati dei progetti
$sql = "SELECT * FROM progetti ORDER BY data_creazione DESC";
$stmt = $conn->query($sql);
$progetti = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio di Biagio Scaglia</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <h1>Biagio Scaglia - Web Developer</h1>
            <p>Costruisco esperienze digitali innovative e soluzioni web su misura</p>
        </div>
    </header>

    <!-- Sezione Introduzione -->
    <section id="intro">
        <div class="container">
            <h2>Benvenuto nel mio Portfolio</h2>
            <p>Mi chiamo Biagio Scaglia e sono un Web Developer. In questo spazio puoi trovare alcuni dei miei progetti più recenti. Se hai bisogno di una soluzione web personalizzata o vuoi sapere di più su di me, non esitare a contattarmi.</p>
        </div>
    </section>

    <!-- Sezione Competenze -->
    <section id="skills">
        <div class="container">
            <h2>Le mie Competenze</h2>
            <ul>
                <li>HTML & CSS</li>
                <li>JavaScript & jQuery</li>
                <li>PHP & MySQL</li>
                <li>Responsive Design</li>
                <li>WordPress & CMS</li>
                <li>Version Control (Git)</li>
            </ul>
        </div>
    </section>

    <!-- Sezione Progetti -->
    <section id="projects">
        <div class="container">
            <h2>I miei Progetti</h2>
            <div class="project-list">
                <?php foreach ($progetti as $progetto): ?>
                    <div class="project-card">
                        <h3><?= htmlspecialchars($progetto['titolo']) ?></h3>
                        <p><?= htmlspecialchars($progetto['descrizione']) ?></p>
                        <a href="dettagli-progetto.php?id=<?= $progetto['id'] ?>" class="btn">Visita il Progetto</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Sezione Testimonianze -->
    <section id="testimonials">
        <div class="container">
            <h2>Cosa dicono di me</h2>
            <div class="testimonial">
                <blockquote>
                    "Biagio ha creato il nostro sito web aziendale in tempo record, con un design pulito e funzionale!"
                </blockquote>
                <p>- Cliente soddisfatto</p>
            </div>
            <div class="testimonial">
                <blockquote>
                    "Un professionista che capisce le esigenze del cliente. Consigliato a chiunque voglia un sito web di qualità!"
                </blockquote>
                <p>- Un altro cliente soddisfatto</p>
            </div>
        </div>
    </section>

    

    <footer>
        <div class="container">
            <p>&copy; 2024 Biagio Scaglia | Tutti i diritti riservati</p>
        </div>
    </footer>
</body>
</html>
