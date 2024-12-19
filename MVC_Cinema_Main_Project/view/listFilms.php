<?php ob_start(); ?>

<p>There is <?= $requete->rowCount() ?> movies</p>

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

<?php 

$titre = "List of movies";
$titre_secondaire ="List of movies";

$contenu = ob_get_clean();

require "view/template.php";