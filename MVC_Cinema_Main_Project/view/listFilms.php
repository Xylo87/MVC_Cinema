<?php ob_start(); ?>

<p>There is <?= $requete->rowCount() ?> movies</p>

<a href="index.php?action=addFilm">Add movie</a>

<table>
    <thead>
        <tr>
            <th>TITLE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($films as $film) { ?> 
                <tr>
                    <td><a href="index.php?action=detFilm&id=<?= $film["idFilm"] ?>"><?= $film["titre"] ?></a></td>
                </tr>
            <?php } ?>
    </tbody>
</table>
<br>
<br>

<?php 

if (isset($_GET["success"])) {
    if ($_GET["success"] === "true") {
        echo "Add successful !";
    } else {
        echo "Something went wrong...";
    }
}

$titre = "List of movies";
$titre_secondaire ="List of movies";

$contenu = ob_get_clean();

require "view/template.php";