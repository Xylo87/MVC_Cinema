<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>ANNEE DE SORTIE</th>
            <th>DUREE (MIN)</th>
            <th>SYNOPSIS</th>
            <th>NOTE</th>
            <th>AFFICHE</th>
            <th>TRAILER</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $detFilm["annee"] ?></td>
            <td><?= $detFilm["duree"] ?></td>
            <td><?= $detFilm["synopsis"] ?></td>
            <td><?= $detFilm["note"] ?></td>
            <td><img src="<?= $detFilm["affiche"] ?>"></td>
            <td><iframe width="560" height="315" src="<?= $detFilm["trailer"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; 
                clipboard-write; encrypted-media; gyroscope; picture-in-picture; 
                web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></td>
        </tr>
    </tbody>
</table>

<?php 

$titre = $detFilm["titre"];
$titre_secondaire = $detFilm["titre"];

$contenu = ob_get_clean();

require "view/template.php";