<?php

namespace Controller;

use Model\Connect;

class FilmController {



    // Lister les films
    public function listFilms() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT film.titre, film.idFilm
            FROM film
        ");
        $requete->execute();
        
        $films = $requete->fetchAll();

        require "view/listFilms.php";
    }



    // Lister les genres
    public function listGenres() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT genre.libelle
            FROM genre
        ");
        $requete->execute();

        $genres = $requete->fetchAll();

        require "view/listGenres.php";
    }



    // Détail film
    public function detFilm($id) {

        // SET lc_time_names = 'fr_FR';

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT film.titre, DATE_FORMAT(film.annee, \"%d %M %Y\") AS annee, DATE_FORMAT(SEC_TO_TIME(duree * 60), \"%kh%i\") AS duree, film.synopsis, film.note, film.affiche, film.trailer, CONCAT(personne.prenom,' ',personne.nom) AS reali
            FROM film
            INNER JOIN reali ON reali.idReali = film.idReali
            INNER JOIN personne ON personne.idPersonne = reali.idPersonne
            WHERE film.idFilm = :id
        ");
        $requete->execute(["id" => $id]);

        $detFilm = $requete->fetch();



        // CASTING
        $pdo = Connect::seConnecter();
        $requeteCasting = $pdo->prepare("
            SELECT CONCAT(personne.prenom,' ',personne.nom) AS cast, role.personnage
            FROM film
            INNER JOIN interpretation ON interpretation.idFilm = film.idFilm
            INNER JOIN role ON role.idRole = interpretation.idRole
            INNER JOIN acteurice ON acteurice.idActeurice = interpretation.idActeurice
            INNER JOIN personne ON personne.idPersonne = acteurice.idPersonne
            WHERE film.idFilm = :id
        ");
        $requeteCasting->execute(["id" => $id]);

        $casting = $requeteCasting->fetchAll();


        // GENRE
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT genre.libelle
            FROM genre
            INNER JOIN categorie ON categorie.idGenre = genre.idGenre
            INNER JOIN film ON film.idFilm = categorie.idFilm
            WHERE film.idFilm = :id
        ");
        $requete->execute(["id" => $id]);
    
        $genres = $requete->fetchAll();
    
       

        require "view/detFilm.php";
    }
}