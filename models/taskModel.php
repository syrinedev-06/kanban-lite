<?php
// models/taskModel.php

// Récupérer toutes les tâches
function getTasks($pdo) {
    $stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Récupérer les tâches par statut
function getTasksByStatus($pdo, $status) {
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE status = ? ORDER BY id DESC");
    $stmt->execute([$status]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Ajouter une tâche
function addTask($pdo, $title, $description, $status) {
    $stmt = $pdo->prepare("INSERT INTO tasks (title, description, status) VALUES (?, ?, ?)");
    return $stmt->execute([$title, $description, $status]);
}

// Modifier une tâche
function updateTask($pdo, $id, $title, $description, $status) {
    $stmt = $pdo->prepare("UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?");
    return $stmt->execute([$title, $description, $status, $id]);
}

// Supprimer une tâche
function deleteTask($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
    return $stmt->execute([$id]);
}

// Récupérer une tâche par ID
function getTaskById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
