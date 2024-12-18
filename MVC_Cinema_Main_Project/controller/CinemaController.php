<?php

namespace Controller;

use Model\Connect;

class CinemaController {

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

    // Lister les acteurices
    public function listActeurices() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT CONCAT(personne.prenom,' ',personne.nom) AS acteurice, DATE_FORMAT(personne.dateNais, '%D %b %Y') AS anneeNaissance
            FROM personne
            INNER JOIN acteurice ON acteurice.idPersonne = personne.idPersonne
            ORDER BY DATE_FORMAT(personne.dateNais, '%Y')
        ");
        $requete->execute();

        $acteurices = $requete->fetchAll();

        require "view/listActeurices.php";
    }

    // Lister les réalisateurs
    public function listReali() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT CONCAT(personne.prenom,' ',personne.nom) AS reali, DATE_FORMAT(personne.dateNais, '%D %b %Y') AS anneeNaissance
            FROM personne
            INNER JOIN reali ON reali.idPersonne = personne.idPersonne
            ORDER BY DATE_FORMAT(personne.dateNais, '%Y')
        ");
        $requete->execute();

        $realis = $requete->fetchAll();

        require "view/listReali.php";
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

        require "view/detFilm.php";
    }
}