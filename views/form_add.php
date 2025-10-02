<div class="form-container">
    <h2>➕ Ajouter une tâche</h2>

    <form action="index.php?route=add" method="post">
        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Description (Markdown possible) :</label>
            <textarea id="description" name="description" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="status">Statut :</label>
            <select id="status" name="status">
                <option value="todo">À faire</option>
                <option value="doing">En cours</option>
                <option value="done">Terminé</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">✅ Ajouter</button>
            <a href="index.php?route=list" class="btn-secondary">↩ Retour</a>
        </div>
    </form>
</div>
