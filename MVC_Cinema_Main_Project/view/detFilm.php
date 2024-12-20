<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>DATE OF RELEASE</th>
            <th>RUNNING TIME</th>
            <th>SYNOPSIS</th>
            <th>SCORE</th>
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
            <th>POSTER</th>
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
            <th>DIRECTOR</th>
            <th colspan="2">GENRE</th>
        </tr>  
    </thead>
    <tbody>
        <?php
            foreach ($casting as $cast) { ?> 
                <tr>
                    <td colspan="2"><a href="index.php?action=detActeurice&id=<?= $cast["idActeurice"] ?>"><?= $cast["cast"] ?></a> as <?= $cast["personnage"] ?></td>
            <?php } ?>
            <td><a href="index.php?action=detReali&id=<?= $detFilm["idReali"] ?>"><?= $detFilm["reali"] ?></a></td>
            <td>
            <?php
            foreach ($genres as $genre) { ?>
                    <a href="index.php?action=detGenre&id=<?= $genre["idGenre"] ?>"><?= $genre["libelle"] ?></a><br>
            <?php } ?>
            </td>
        </tr>
    </tbody>
</table>

<?php 

$titre = $detFilm["titre"];
$titre_secondaire = $detFilm["titre"];

$contenu = ob_get_clean();

require "view/template.php";