<?php ob_start(); ?>

<p>There is <?= $requete->rowCount() ?> genres</p>

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

$titre = "List of genres";
$titre_secondaire ="List of genres";

$contenu = ob_get_clean();

require "view/template.php";