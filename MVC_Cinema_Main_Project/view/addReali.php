<?php ob_start(); ?>

<form action="index.php?action=addReali" method="POST">
    <input type="text" name="realiNom" id="realiNom" placeholder="Lastname" required><br><br>
    <input type="text" name="realiPrenom" id="realiPrenom" placeholder="Firstname" required><br><br>
    <fieldset>
        <legend>Sex</legend>
            <input type="radio" name="realiSexe" id="homme" value="H">
                <label for="homme">Male</label>
            <input type="radio" name="realiSexe" id="femme" value="F">
                <label for="femme">Female</label>
    </fieldset><br><br>
    <fieldset>
        <legend>Date of birth</legend>    
            <input type="date" name="realiDate" id="realiDate">
    </fieldset><br><br>
    <textarea name="realiBio" id="realiBio" placeholder="Bio" cols="40" rows="5"></textarea><br><br>
    <input type="text" name="realiPhoto" id="realiPhoto" placeholder="Photo Link" size="40"><br><br>
    <input type="submit" name="submit" value="Add">
</form>

<?php 

$titre = "Add director";
$titre_secondaire = "Add director";

$contenu = ob_get_clean();

require "view/template.php";