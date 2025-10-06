
<?php
// On inclut le contrôleur des tâches
require_once __DIR__ . '/../controllers/taskController.php';

// Vérifie si une "route" est demandée dans l’URL (ex: index.php?route=add)
$route = $_GET['route'] ?? 'list';

// On dirige selon la route
switch ($route) {
    case 'list':
        listTasks();
        break;

    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            addTaskAction();
        } else {
            showAddForm();
        }
        break;
        case 'edit':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        editTaskAction();
    } else {
        showEditForm();
    }
    break;


    case 'delete':
        if (isset($_GET['id'])) {
            deleteTaskAction($_GET['id']);
        }
        break;

    default:
        echo "<h2>Page non trouvée</h2>";
}
