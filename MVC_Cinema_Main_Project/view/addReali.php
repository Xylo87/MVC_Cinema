<?php ob_start(); ?>

<form action="index.php?action=addReali" method="POST">
    <input type="text" name="realiNom" id="realiNom" placeholder="Lastname" required>
    <input type="text" name="realiPrenom" id="realiPrenom" placeholder="Firstname" required>
    <input type="date" name="realiDate" id="realiDate" placeholder="Date of birth" required>
    <fieldset>
        <legend>Sex</legend>
            <input type="radio" name="realiSexe" id="homme">
                <label for="homme">Male</label>
            <input type="radio" name="realiSexe" id="femme">
                <label for="femme">Female</label>
    </fieldset>
    <input type="text" name="realiBio" id="realiBio" placeholder="Bio">
    <input type="text" name="realiPhoto" id="realiPhoto" placeholder="Photo Link">
    <input type="submit" name="submit" value="Add">
</form>

<?php 

$titre = "Add reali";
$titre_secondaire = "Add reali";

$contenu = ob_get_clean();

require "view/template.php";