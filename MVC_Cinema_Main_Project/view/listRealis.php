<?php ob_start(); ?>

<p>Il y a <?= $requete->rowCount() ?> réalisateurs</p>

<table>
    <thead>
        <tr>
            <th>REALISATEUR</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($realis as $reali) { ?> 
                <tr>
                    <td><?= $reali["reali"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php 

$titre = "Liste des realisateurs";
$titre_secondaire ="Liste des realisateurs";

$contenu = ob_get_clean();

require "view/template.php";