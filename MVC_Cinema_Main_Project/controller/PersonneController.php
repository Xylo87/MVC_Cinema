<?php

namespace Controller;

use Model\Connect;

class PersonneController {

    // Lister les acteurices
    public function listActeurices() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT CONCAT(personne.prenom,' ',personne.nom) AS acteurice, DATE_FORMAT(personne.dateNais, '%D %b %Y') AS anneeNaissance, acteurice.idActeurice
            FROM personne
            INNER JOIN acteurice ON acteurice.idPersonne = personne.idPersonne
            ORDER BY DATE_FORMAT(personne.dateNais, '%Y')
        ");
        $requete->execute();

        $acteurices = $requete->fetchAll();

        require "view/listActeurices.php";
    }

    // Lister les réalisateurs
    public function listRealis() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT CONCAT(personne.prenom,' ',personne.nom) AS reali, DATE_FORMAT(personne.dateNais, '%D %b %Y') AS anneeNaissance, reali.idReali
            FROM personne
            INNER JOIN reali ON reali.idPersonne = personne.idPersonne
            ORDER BY DATE_FORMAT(personne.dateNais, '%Y')
        ");
        $requete->execute();

        $realis = $requete->fetchAll();

        require "view/listRealis.php";
    }



    // Détail réalisateur
    public function detReali($id) {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT CONCAT(personne.prenom,' ',personne.nom) AS name, DATE_FORMAT(personne.dateNais, \"%d %M %Y\") AS dateNais, personne.bio, personne.photo
            FROM personne
            INNER JOIN reali ON reali.idPersonne = personne.idPersonne
            WHERE reali.idReali = :id
        ");
        $requete->execute(["id" => $id]);

        $detReali = $requete->fetch();


        // FILMS REALI
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT film.titre AS title, DATE_FORMAT(film.annee, \"%Y\") AS date, film.idFilm
            FROM film
            INNER JOIN reali ON reali.idReali = film.idReali
            WHERE reali.idReali = :id
        ");
        $requete->execute(["id" => $id]);

        $filmsReali = $requete->fetchAll();

        require "view/detReali.php";
    }



    // Détail acteurice
    public function detActeurice($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT CONCAT(personne.prenom,' ',personne.nom) AS name, DATE_FORMAT(personne.dateNais, \"%d %M %Y\") AS dateNais, personne.bio, personne.photo
            FROM personne
            INNER JOIN acteurice ON acteurice.idPersonne = personne.idPersonne
            WHERE acteurice.idActeurice = :id
        ");
        $requete->execute(["id" => $id]);

        $detActeurice = $requete->fetch();


        // FILMS ACTEURICE
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT film.titre AS title, role.personnage AS perso, DATE_FORMAT(film.annee, \"%Y\") AS date, film.idFilm
            FROM film
            INNER JOIN interpretation ON interpretation.idFilm = film.idFilm
            INNER JOIN role ON role.idRole = interpretation.idRole
            INNER JOIN acteurice ON acteurice.idActeurice = interpretation.idActeurice
            WHERE acteurice.idActeurice = :id
        ");
        $requete->execute(["id" => $id]);

        $filmsAct = $requete->fetchAll();

        require "view/detActeurice.php";
    }



    public function addReali() {

        if (isset($_POST["submit"])) {
            
            $realiNom = filter_input(INPUT_POST, "realiNom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $realiPrenom = filter_input(INPUT_POST, "realiPrenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $realiDate = filter_input(INPUT_POST, "realiPrenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $realiSexe = filter_input(INPUT_POST, "realiSexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $realiBio = filter_input(INPUT_POST, "realiBio", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $realiPhoto = filter_input(INPUT_POST, "realiPhoto", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($realiNom && $realiPrenom && $realiDate && $realiSexe && $realiBio && $realiPhoto) {
                var_dump($realiNom, $realiPrenom, $realiDate, $realiSexe, $realiBio, $realiPhoto);
            }
        }
    }
}