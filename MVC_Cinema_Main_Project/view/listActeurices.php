<?php ob_start(); ?>

<p>There is <?= $requete->rowCount() ?> actors</p>

<table>
    <thead>
        <tr>
            <th>ACTORS</th>
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

$titre = "List of actors";
$titre_secondaire ="List of actors";

$contenu = ob_get_clean();

require "view/template.php";