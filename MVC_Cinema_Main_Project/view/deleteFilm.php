<?php ob_start(); ?>

<form action="index.php?action=deleteFilm" method="POST">
    <select name="film" id="film" required>
        <option value="">--Select a movie--</option>
        <?php foreach ($films as $film) {
            echo "<option value=".$film["idFilm"].">".$film["titre"]."</option>";
        } ?>
    </select><br><br>
    <input type="submit" name="submit" value="Delete">
</form>
<br>
<br>

<?php 

$titre = "Delete movie";
$titre_secondaire = "Delete movie";

$contenu = ob_get_clean();

require "view/template.php";