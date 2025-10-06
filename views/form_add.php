<div class="form-container">
    <h2>Ajouter une tâche</h2>

    <form action="index.php?route=add" method="post">
        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description"></textarea>
        </div>

        <div class="form-group status-group">
            <label>Statut :</label><br>
            <input type="radio" id="todo" name="status" value="todo">
            <label for="todo">À faire</label>

            <input type="radio" id="doing" name="status" value="doing">
            <label for="doing">En cours</label>

            <input type="radio" id="done" name="status" value="done">
            <label for="done">Terminé</label>
        </div>

        <div class="form-actions">
            <a href="index.php" class="btn-secondary">Retour</a>
            <button type="submit" class="btn-primary">Valider</button>
        </div>
    </form>
</div>
