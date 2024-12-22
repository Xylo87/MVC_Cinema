<?php

use Controller\PersonneController;
use Controller\FilmController;
use Controller\GenreController;

spl_autoload_register(function($class_name) {
    include $class_name . ".php";
});

$ctrlPersonne = new PersonneController();
$ctrlFilm = new FilmController();
$ctrlGenre = new GenreController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case 'listFilms': $ctrlFilm->listFilms();
            break;
        case "listActeurices" : $ctrlPersonne->listActeurices();
            break;
        case "listRealis" : $ctrlPersonne->listRealis();
            break;
        case "listGenres" : $ctrlGenre->listGenres();
            break;
        case "detFilm" : $ctrlFilm->detFilm($id);
            break;
        case "detReali" : $ctrlPersonne->detReali($id);
            break;
        case "detActeurice" : $ctrlPersonne->detActeurice($id);
            break;
        case "detGenre" : $ctrlGenre->detGenre($id); 
            break;
        case "addGenre" : $ctrlGenre->addGenre(); 
            break;
        case "addReali" : $ctrlPersonne->addReali();
            break;
        case "addFilm" : $ctrlFilm->addFilm();
            break;
    }
}