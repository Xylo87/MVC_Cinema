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
            <td><img src="<?= $detReali["photo"] ?>"></td>
            <td><?= $detReali["dateNais"] ?></td>
            <td><?= $detReali["bio"] ?></td>
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
            foreach ($filmsReali as $movie) { ?> 
                <tr>
                    <td><?= $movie["title"] ?></td>
                    <td colspan="2"><?= $movie["date"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php 

$titre = $detReali["name"];
$titre_secondaire = $detReali["name"];

$contenu = ob_get_clean();

require "view/template.php";