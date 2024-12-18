<?php ob_start(); ?>

<p>Il y a <?= $requete->rowCount() ?> films</p>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE DE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($films as $film) { ?> 
                <tr>
                    <td><?= $film["titre"] ?></td>
                    <td><?= $film["annee"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php 

$titre = "Liste des films";
$titre_secondaire ="Liste des films";

$contenu = ob_get_clean();

require "view/template.php";