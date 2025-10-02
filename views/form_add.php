<h2>Ajouter une tâche</h2>

<form action="index.php?route=add" method="post">
    <label for="title">Titre :</label><br>
    <input type="text" id="title" name="title" required><br><br>

    <label for="description">Description :</label><br>
    <textarea id="description" name="description"></textarea><br><br>

    <label for="status">Statut :</label><br>
    <select id="status" name="status">
        <option value="todo">À faire</option>
        <option value="doing">En cours</option>
        <option value="done">Terminé</option>
    </select><br><br>

    <button type="submit">Ajouter</button>
</form>
