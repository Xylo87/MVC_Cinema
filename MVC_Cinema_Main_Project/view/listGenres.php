<?php ob_start(); ?>

<p>Il y a <?= $requete->rowCount() ?> genres de films</p>

<table>
    <thead>
        <tr>
            <th>GENRE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($genres as $genre) { ?> 
                <tr>
                    <td><?= $genre["libelle"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php 

$titre = "Liste des genres";
$titre_secondaire ="Liste des genres";

$contenu = ob_get_clean();

require "view/template.php";