<?php ob_start(); ?>

<?php if(count($films) == 0) {
    echo "<p>No movie for this genre.</p>";
} else { ?>

<table>
    <thead>
        <tr>
            <th>MOVIE</th>
            <th>ANNEE</th>
            <th>SYNOPSIS</th>
            <th>POSTER</th>
        </tr> 
    </thead>
    <tbody>
        <?php
            foreach ($films as $film) { ?> 
                <tr>
                    <td><a href="index.php?action=detFilm&id=<?= $film["idFilm"] ?>"><?= $film["titre"] ?></a></td>
                    <td><?= $film["date"] ?></td>
                    <td><?= $film["synopsis"] ?></td>
                    <td><a href="index.php?action=detFilm&id=<?= $film["idFilm"] ?>"><img src="<?= $film["affiche"] ?>"></a></td>
                    </tr>    
            <?php } ?>
    </tbody>
</table>

<?php } ?>

<?php 

$titre = $genre["libelle"];
$titre_secondaire = $genre["libelle"];

$contenu = ob_get_clean();

require "view/template.php";