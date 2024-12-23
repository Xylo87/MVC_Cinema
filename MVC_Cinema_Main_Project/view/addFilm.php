<?php ob_start(); ?>

<form action="index.php?action=addFilm" method="POST">
    <input type="text" name="filmTitre" id="filmTitre" placeholder="Title" required><br><br>
    <fieldset>
        <legend>Date of release</legend>    
            <input type="date" name="filmDate" id="filmDate">
    </fieldset><br><br>
    <input type="number" name="filmDuree" id="filmDuree" placeholder="Length (min)"><br><br>
    <textarea name="filmSynopsis" id="filmSynopsis" placeholder="Synopsis" cols="40" rows="5"></textarea><br><br>
    <input type="text" name="filmNote" id="filmNote" placeholder="Score (/10)"><br><br>
    <input type="text" name="filmAffiche" id="filmAffiche" placeholder="Movie Poster Link" size="40"><br><br>
    <input type="text" name="filmTrailer" id="filmTrailer" placeholder="Movie Trailer Link" size="40"><br><br>
    <select name="filmReali" id="filmReali" required>
        <option value="">--Select a director--</option>
        <?php foreach ($realis as $reali) {
            echo "<option value=".$reali["idReali"].">".$reali["name"]."</option>";
        } ?>
    </select><br><br>
    <fieldset>
        <legend>Choose one or more genre</legend>
            <?php foreach ($genres as $genre) {
                echo "<input type=\"checkbox\" name=\"filmGenre[]\" value=".$genre["idGenre"].">".$genre["libelle"]."<br>";
            } ?>
    </fieldset><br><br>
    <input type="submit" name="submit" value="Add">
</form>
<br>
<br>

<?php 

$titre = "Add movie";
$titre_secondaire = "Add movie";

$contenu = ob_get_clean();

require "view/template.php";