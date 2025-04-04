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