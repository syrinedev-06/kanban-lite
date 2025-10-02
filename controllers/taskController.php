<?php
// controllers/taskController.php

// charge la connexion et le modèle
require_once __DIR__ . '/../models/db.php';
require_once __DIR__ . '/../models/taskModel.php';
// Charger Parsedown pour afficher le markdown
    require_once __DIR__ . '/../models/Parsedown.php';
    $Parsedown = new Parsedown();


// === Fonction : afficher la liste des tâches ===
function listTasks() {
    // utilise la variable $pdo créée dans models/db.php
    global $pdo;

    // récupère les tâches par statut en passant $pdo en 1er argument
    $todo  = getTasksByStatus($pdo, 'todo');
    $doing = getTasksByStatus($pdo, 'doing');
    $done  = getTasksByStatus($pdo, 'done');
    // Charger Parsedown pour afficher le markdown
    require_once __DIR__ . '/../models/Parsedown.php';
    $Parsedown = new Parsedown();

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
// Afficher le formulaire d’édition
function showEditForm() {
    global $pdo;
    $id = $_GET['id'] ?? null;

    if (!$id) {
        header("Location: index.php?route=list");
        exit;
    }

    $task = getTaskById($pdo, $id);
    if (!$task) {
        header("Location: index.php?route=list");
        exit;
    }

    include __DIR__ . '/../views/header.php';
    include __DIR__ . '/../views/form_edit.php';
    include __DIR__ . '/../views/footer.php';
}

// Action de mise à jour
function editTaskAction() {
    global $pdo;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $status = $_POST['status'] ?? 'todo';

        if ($id && $title !== '') {
            updateTask($pdo, $id, $title, $description, $status);
        }
        header("Location: index.php?route=list");
        exit;
    }
}
