<h2>Modifier Une Tâche</h2>

<form action="index.php?route=edit" method="post">
    <input type="hidden" name="id" value="<?= $task['id'] ?>">

    <label for="title">Titre :</label><br>
    <input type="text" id="title" name="title" value="<?= htmlspecialchars($task['title']) ?>" required><br><br>

    <label for="description">Description :</label><br>
    <textarea id="description" name="description"><?= htmlspecialchars($task['description']) ?></textarea><br><br>

    <label for="status">Statut :</label><br>
    <select id="status" name="status">
        <option value="todo" <?= $task['status'] === 'todo' ? 'selected' : '' ?>>À faire</option>
        <option value="doing" <?= $task['status'] === 'doing' ? 'selected' : '' ?>>En Cours</option>
        <option value="done" <?= $task['status'] === 'done' ? 'selected' : '' ?>>Terminé</option>
    </select><br><br>

    <button type="submit">Enregistrer</button>
</form>
