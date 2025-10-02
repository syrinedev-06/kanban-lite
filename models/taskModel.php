<?php

// Récupérer toutes les tâches d’un statut
function getTasksByStatus($pdo, $status) {
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE status = ?");
    $stmt->execute([$status]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Ajouter une tâche
function addTask($pdo, $title, $description, $status = "todo") {
    $stmt = $pdo->prepare("INSERT INTO tasks (title, description, status) VALUES (?, ?, ?)");
    $stmt->execute([$title, $description, $status]);
}

// Supprimer une tâche
function deleteTask($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
}
