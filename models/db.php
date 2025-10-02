<?php
// Connexion simple à SQLite
try {
    $pdo = new PDO("sqlite:" . __DIR__ . "/../database.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
