<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>ANNEE DE SORTIE</th>
            <th>DUREE (MIN)</th>
            <th>SYNOPSIS</th>
            <th>NOTE</th>
        </tr> 
    </thead>
    <tbody>
        <tr>
            <td><?= $detFilm["annee"] ?></td>
            <td><?= $detFilm["duree"] ?></td>
            <td><?= $detFilm["synopsis"] ?></td>
            <td><?= $detFilm["note"] ?></td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <th>AFFICHE</th>
            <th colspan="3">TRAILER</th>
        </tr>  
    </thead>
    <tbody>
        <tr> 
            <td><img src="<?= $detFilm["affiche"] ?>"></td>
            <td colspan="3"><iframe width="560" height="315" src="<?= $detFilm["trailer"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; 
            clipboard-write; encrypted-media; gyroscope; picture-in-picture; 
            web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <th colspan="2">CASTING</th>
            <th>RÉALISATEUR</th>
            <th>GENRE</th>
        </tr>  
    </thead>
    <tbody>
        <?php
            foreach ($casting as $cast) { ?> 
                <tr>
                    <td colspan="2"><?= $cast["cast"] ?></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php 

$titre = $detFilm["titre"];
$titre_secondaire = $detFilm["titre"];

$contenu = ob_get_clean();

require "view/template.php";