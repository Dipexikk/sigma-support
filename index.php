<?php
include "php/db.php";
session_start();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fix IT | Ticketovací Systém</title>
    <link rel="stylesheet" href="/styles/style.css">
</head>
    <body>
        <header>
        <h1>SUPPORTÍK</h1>
            <div class="header-left">
                <nav>
                    <ul>
                        <li><a href="index.php">Vytvořit Ticket</a></li>
                        <li><a href="tickets.php">Tickety</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    <main>
        <div class="container">
            <section class="form-section">
            <h2>Vytvořit nový ticket</h2>
                <form action="php/tickets.php" method="post">
                    <input type="email" name="email" placeholder="Váš e-mail" required>
                    <input type="text" name="platform" placeholder="Platforma" required>
                    <input type="text" name="region" placeholder="Region" required>
                    <input type="text" name="subject" placeholder="Předmět" required>
                    <textarea name="description" placeholder="Popis problému" required></textarea>
                    <button type="submit">Vytvořit ticket</button>
                </form>
            </section>
        </div>
    </main>
        <footer>
        <p>&copy; 2025 Fix IT Ticketovací Systém</p>
        </footer>
</body>
</html>