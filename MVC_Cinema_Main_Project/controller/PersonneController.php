<?php

namespace Controller;

use Model\Connect;

class PersonneController {

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
            SELECT film.titre AS title, DATE_FORMAT(film.annee, \"%Y\") AS date
            FROM film
            INNER JOIN reali ON reali.idReali = film.idReali
            WHERE reali.idReali = :id
        ");
        $requete->execute(["id" => $id]);

        $filmsReali = $requete->fetchAll();

        require "view/detReali.php";
    }
}