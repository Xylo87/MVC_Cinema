<?php ob_start(); ?>

<p>There is <?= $requete->rowCount() ?> directors</p>

<a href="index.php?action=addReali">Add director</a>

<table>
    <thead>
        <tr>
            <th>DIRECTOR</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($realis as $reali) { ?> 
                <tr>
                    <td><a href="index.php?action=detReali&id=<?= $reali["idReali"] ?>"><?= $reali["reali"] ?></a></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php 

$titre = "List of directors";
$titre_secondaire ="List of directors";

$contenu = ob_get_clean();

require "view/template.php";