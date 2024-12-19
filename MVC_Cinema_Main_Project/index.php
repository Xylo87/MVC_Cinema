<?php

use Controller\PersonneController;
use Controller\FilmController;

spl_autoload_register(function($class_name) {
    include $class_name . ".php";
});

$ctrlPersonne = new PersonneController();
$ctrlFilm = new FilmController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case 'listFilms': $ctrlFilm->listFilms();
            break;
        case "listActeurices" : $ctrlPersonne->listActeurices();
            break;
        case "listRealis" : $ctrlPersonne->listRealis();
            break;
        case "listGenres" : $ctrlFilm->listGenres();
            break;
        case "detFilm" : $ctrlFilm->detFilm($id);
            break;
        case "detReali" : $ctrlPersonne->detReali($id);
            break;
    }
}