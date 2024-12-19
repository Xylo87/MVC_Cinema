<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title><?= $titre ?></title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php?action=listFilms">Movies</a></li>
            <li><a href="index.php?action=listActeurices">Actors</a></li>
            <li><a href="index.php?action=listRealis">Directors</a></li>
            <li><a href="index.php?action=listGenres">Genres</a></li>
        </ul>
    </nav>

    <h2><?= $titre_secondaire ?></h2>

    <?= $contenu ?>


    <script src="app.js"></script>
</body>
</html>