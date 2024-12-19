<?php ob_start(); ?>

<p>Il y a <?= $requete->rowCount() ?> acteurices</p>

<table>
    <thead>
        <tr>
            <th>ACTEURICE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($acteurices as $acteurice) { ?> 
                <tr>
                    <td><?= $acteurice["acteurice"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php 

$titre = "Liste des acteurices";
$titre_secondaire ="Liste des acteurices";

$contenu = ob_get_clean();

require "view/template.php";