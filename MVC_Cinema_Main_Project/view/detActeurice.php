<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>PHOTO</th>
            <th>DATE OF BIRTH</th>
            <th>BIO</th>
        </tr> 
    </thead>
    <tbody>
        <tr>
            <td><img src="<?= $detActeurice["photo"] ?>"></td>
            <td><?= $detActeurice["dateNais"] ?></td>
            <td><?= $detActeurice["bio"] ?></td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <th>MOVIES</th>
            <th colspan="2">YEAR OF RELEASE</th>
        </tr>  
    </thead>
    <tbody>
        <?php
            foreach ($filmsAct as $movie) { ?> 
                <tr>
                    <td><a href="index.php?action=detFilm&id=<?= $movie["idFilm"] ?>"><?= $movie["title"] ?></a> as <?= $movie["perso"] ?></td>
                    <td colspan="2"><?= $movie["date"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php 

$titre = $detActeurice["name"];
$titre_secondaire = $detActeurice["name"];

$contenu = ob_get_clean();

require "view/template.php";