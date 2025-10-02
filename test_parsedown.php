<?php
require_once __DIR__ . '/models/Parsedown.php';
$Parsedown = new Parsedown();

$md = "# Titre de test\n\n**gras** _italique_\n\n- item1\n- item2\n";
echo $Parsedown->text($md);
