<?php

namespace Controller;

use Model\Connect;

class FilmController {



    // Lister les films
    public function listFilms() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT *
            FROM film
            ORDER BY film.annee
        ");
        $requete->execute();
        
        $films = $requete->fetchAll();

        require "view/listFilms.php";
    }



    // Lister les genres
    public function listGenres() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT *
            FROM genre
        ");
        $requete->execute();

        $genres = $requete->fetchAll();

        require "view/listGenres.php";
    }



    // Détail film
    public function detFilm($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT * 
            FROM film
            WHERE film.idFilm = :id
        ");
        $requete->execute(["id" => $id]);

        $detFilm = $requete->fetch();



        // CASTING
        $pdo = Connect::seConnecter();
        $requeteCasting = $pdo->prepare("
            SELECT CONCAT(personne.prenom,' ',personne.nom) AS cast
            FROM film
            INNER JOIN interpretation ON interpretation.idFilm = film.idFilm
            INNER JOIN acteurice ON acteurice.idActeurice = interpretation.idActeurice
            INNER JOIN personne ON personne.idPersonne = acteurice.idPersonne
            WHERE film.idFilm = :id
        ");
        $requeteCasting->execute(["id" => $id]);

        $casting = $requeteCasting->fetchAll();



        require "view/detFilm.php";
    }
}