<?php ob_start(); ?>

<p>There is <?= $requete->rowCount() ?> genres</p>

<a href="index.php?action=addGenre">Add genre</a>

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
                    <td><a href="index.php?action=detGenre&id=<?= $genre["idGenre"] ?>"><?= $genre["libelle"] ?></a></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php 

$titre = "List of genres";
$titre_secondaire ="List of genres";

$contenu = ob_get_clean();

require "view/template.php";