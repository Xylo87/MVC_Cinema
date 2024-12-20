<?php ob_start(); ?>

<form action="index.php?action=addGenre" method="POST">
    <input type="text" name="libelle" id="libelle" required>
    <input type="submit" name="submit" value="Add">
</form>

<?php 

$titre = "Add genre";
$titre_secondaire = "Add genre";

$contenu = ob_get_clean();

require "view/template.php";