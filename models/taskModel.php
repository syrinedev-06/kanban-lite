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
// Récupérer une tâche par ID
function getTaskById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Mettre à jour une tâche
function updateTask($pdo, $id, $title, $description, $status) {
    $stmt = $pdo->prepare("UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?");
    $stmt->execute([$title, $description, $status, $id]);
}
