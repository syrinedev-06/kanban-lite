<?php
// controllers/taskController.php

require_once __DIR__ . '/../models/db.php';
require_once __DIR__ . '/../models/taskModel.php';
require_once __DIR__ . '/../models/Parsedown.php';

// instancier Parsedown UNE SEULE FOIS
$Parsedown = new Parsedown();

// === Fonction : afficher la liste des tâches ===
function listTasks() {
    global $pdo, $Parsedown;

    $todo  = getTasksByStatus($pdo, 'todo');
    $doing = getTasksByStatus($pdo, 'doing');
    $done  = getTasksByStatus($pdo, 'done');

    include __DIR__ . '/../views/header.php';
    include __DIR__ . '/../views/list.php'; // c’est là qu’on utilisera Parsedown
    include __DIR__ . '/../views/footer.php';
}

// === Formulaire d’ajout ===
function showAddForm() {
    include __DIR__ . '/../views/header.php';
    include __DIR__ . '/../views/form_add.php';
    include __DIR__ . '/../views/footer.php';
}

// === Ajouter une tâche ===
function addTaskAction() {
    global $pdo;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $status = $_POST['status'] ?? 'todo';

        if ($title !== '') {
            addTask($pdo, $title, $description, $status);
        }
        header('Location: index.php?route=list');
        exit;
    }
}

// === Supprimer une tâche ===
function deleteTaskAction($id) {
    global $pdo;

    if (!empty($id)) {
        deleteTask($pdo, $id);
    }
    header('Location: index.php?route=list');
    exit;
}

// === Formulaire d’édition ===
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

// === Mise à jour ===
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
