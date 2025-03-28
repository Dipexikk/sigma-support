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
    <link rel="stylesheet" href="/styles/ticket.css">
</head>
    <body>
        <header>
        <h1>Fix IT</h1>
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
            <section class="tickets-section">
                <h2>Vaše tickety</h2>
                    <div id="tickets">
                        <?php
                                $user_email = $_SESSION['user_email'];
                                $stmt = $pdo->prepare("SELECT * FROM support WHERE email = ?");
                                $stmt->execute([$user_email]);
                                $tickets = $stmt->fetchAll();
                                foreach ($tickets as $ticket) {
                                    echo "<div>
                                <h3>{$ticket['subject']} ({$ticket['platform']}, {$ticket['region']})</h3>
                                <p>{$ticket['description']}</p>
                                <p>Status: {$ticket['state']}</p>
                                <p>Datum: {$ticket['date']}</p>
                                    </div>";
                                                    }
                        ?>
                    </div>
            </section>
        </div>
    </main>
        <footer>
        <p>&copy; 2025 Fix IT Ticketovací Systém</p>
        </footer>
</body>
</html>