<?php ob_start(); ?>

<p>Il y a <?= $requete->rowCount() ?> films</p>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
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

$titre = "Liste des films";
$titre_secondaire ="Liste des films";

$contenu = ob_get_clean();

require "view/template.php";