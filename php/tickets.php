<?php
require 'db.php';
session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $platform = $_POST['platform'];
        $region = $_POST['region'];
        $subject = $_POST['subject'];
        $description = $_POST['description'];
        $state = 'Otevřeno';
        $date = date('Y-m-d');
        $_SESSION['user_email'] = $email;
        $stmt = $pdo->prepare("INSERT INTO support (email, platform, region, subject, description, state, date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$email, $platform, $region, $subject, $description, $state, $date]);
    header("Location: ../index.php");
   exit;
}