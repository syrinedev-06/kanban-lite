📌 Kanban Lite
🧾 Description du projet

Kanban Lite est une application web simple et intuitive permettant de gérer des tâches selon la méthode Kanban.
Elle se compose de trois colonnes représentant les statuts :
🟥 À faire (todo)

🟧 En cours (doing)

🟩 Terminé (done)
L’utilisateur peut ajouter, modifier et supprimer des tâches.
Chaque tâche contient un titre, une description, et un statut qui détermine sa position dans le tableau.

⚙️ Fonctionnalités principales

➕ Ajouter une tâche avec un titre, une description et un statut

📝 Modifier une tâche existante

🗑️ Supprimer une tâche

🧩 Afficher les tâches sous forme de tableau Kanban (3 colonnes : À faire, En cours, Terminé)

✨ Rendu Markdown dans les descriptions (##, **gras**, etc.)

💾 Stockage local via une base de données SQLite
📱 Design responsive, sans framework externe

🗃️ Architecture du projet
kanban-lite/
│
├── index.php                # Point d’entrée du site (routeur)
│
├── controllers/
│   └── taskController.php   # Gère la logique et les actions utilisateur
│
├── models/
│   ├── db.php               # Connexion à la base de données SQLite
│   ├── taskModel.php        # Fonctions CRUD liées aux tâches
│   └── Parsedown.php        # Librairie pour le rendu Markdown
│
├── views/
│   ├── header.php           # En-tête du site
│   ├── footer.php           # Pied de page
│   ├── list.php             # Page principale (affichage des tâches)
│   ├── form_add.php         # Formulaire d’ajout
│   └── form_edit.php        # Formulaire d’édition
│
└── style.css                # Feuille de style globale
🧠 Gestion du Markdown (Parsedown)

Le projet utilise Parsedown pour permettre la mise en forme du texte dans les descriptions des tâches (par exemple :
## titre, **gras**, - liste, etc.).

➡️ Le titre des tâches n’utilise pas Parsedown, car il doit rester simple et lisible.
Cela évite les erreurs d’affichage et garantit la cohérence du tableau Kanban.
Ainsi :

La description accepte la syntaxe Markdown.
Le titre reste en texte brut pour plus de stabilité et de sécurité.
💾 Base de données
Le projet utilise SQLite, un système de base de données léger et intégré.
Une seule table tasks est utilisée

🎨 Interface utilisateur

L’interface a été pensée pour être simple, claire et responsive :

* Un header avec un logo et une barre de navigation.

* Trois colonnes représentant les statuts.

* Des boutons colorés (modifier, supprimer).

* Un formulaire moderne avec effets de focus et validation.

🚀 Utilisation

Lancer le serveur local PHP

php -S localhost:8000 -t public


Ouvrir le navigateur sur :

http://localhost:8000

Ajouter, modifier ou supprimer vos tâches depuis l’interface.

Lancement :
Démarrez Apache et ouvrez votre navigateur à l’adresse suivante :

http://localhost/kanban-lite/public/index.php


La base SQLite sera automatiquement créée à la première exécution.

📚 Technologies utilisées

*🐘 PHP 8+

*🧩 SQLite

*🎨 HTML5 / CSS3

*✨ Parsedown (Markdown Renderer)


