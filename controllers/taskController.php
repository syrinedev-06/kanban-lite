<?php
// controllers/taskController.php

// charge la connexion et le modèle
require_once __DIR__ . '/../models/db.php';
require_once __DIR__ . '/../models/taskModel.php';

// === Fonction : afficher la liste des tâches ===
function listTasks() {
    // utilise la variable $pdo créée dans models/db.php
    global $pdo;

    // récupère les tâches par statut en passant $pdo en 1er argument
    $todo  = getTasksByStatus($pdo, 'todo');
    $doing = getTasksByStatus($pdo, 'doing');
    $done  = getTasksByStatus($pdo, 'done');

    include __DIR__ . '/../views/header.php';
    include __DIR__ . '/../views/list.php';
    include __DIR__ . '/../views/footer.php';
}

// === Fonction : afficher le formulaire d’ajout ===
function showAddForm() {
    include __DIR__ . '/../views/header.php';
    include __DIR__ . '/../views/form_add.php';
    include __DIR__ . '/../views/footer.php';
}

// === Fonction : ajouter une tâche ===
function addTaskAction() {
    global $pdo;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $status = $_POST['status'] ?? 'todo';

        // simple validation : titre non vide
        if ($title !== '') {
            // appelle le modèle en lui passant $pdo
            addTask($pdo, $title, $description, $status);
        }

        // redirection vers la liste
        header('Location: index.php?route=list');
        exit;
    }
}

// === Fonction : supprimer une tâche ===
function deleteTaskAction($id) {
    global $pdo;

    if (!empty($id)) {
        deleteTask($pdo, $id);
    }

    header('Location: index.php?route=list');
    exit;
}
