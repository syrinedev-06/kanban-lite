<h2>Tableau Kanban</h2>

<div class="board">
    <!-- Colonne TODO -->
    <div class="column">
        <h3>À faire</h3>
        <?php foreach ($todo as $task): ?>
            <div class="card">
                <h4><?= htmlspecialchars($task['title']) ?></h4>
               <div class="description">
                    <?= $Parsedown->text($task['description']) ?>
                </div>
               
                <div class="card-actions">
                      <a href="index.php?route=edit&id=<?= $task['id'] ?>" class="edit-btn">🖊️ Modifier</a>
                  <a href="index.php?route=delete&id=<?= $task['id'] ?>" class="delete-btn"> 🗑️ Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Colonne DOING -->
    <div class="column">
        <h3>En cours</h3>
        <?php foreach ($doing as $task): ?>
            <div class="card">
                <h4><?= htmlspecialchars($task['title']) ?></h4>
                <div class="description">
                    <?= $Parsedown->text($task['description']) ?>
                </div>
                
                <div class="card-actions">
                    <a href="index.php?route=edit&id=<?= $task['id'] ?>" class="edit-btn">🖊️ Modifier</a>
                <a href="index.php?route=delete&id=<?= $task['id'] ?>" class="delete-btn">🗑️ Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Colonne DONE -->
    <div class="column">
        <h3>Terminé</h3>
        <?php foreach ($done as $task): ?>
            <div class="card">
                <h4><?= htmlspecialchars($task['title']) ?></h4>
               <div class="description">
                    <?= $Parsedown->text($task['description']) ?>
                </div>
                <div class="card-actions">
             <a href="index.php?route=edit&id=<?= $task['id'] ?>" class="edit-btn">🖊️ Modifier</a>
                <a href="index.php?route=delete&id=<?= $task['id'] ?>" class="delete-btn">🗑️ Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
