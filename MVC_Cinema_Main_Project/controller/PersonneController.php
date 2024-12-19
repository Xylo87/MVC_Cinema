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
            SELECT CONCAT(personne.prenom,' ',personne.nom) AS reali, DATE_FORMAT(personne.dateNais, '%D %b %Y') AS anneeNaissance
            FROM personne
            INNER JOIN reali ON reali.idPersonne = personne.idPersonne
            ORDER BY DATE_FORMAT(personne.dateNais, '%Y')
        ");
        $requete->execute();

        $realis = $requete->fetchAll();

        require "view/listRealis.php";
    }



    // Détail réalisateur
    // public function detReali($id) {
        
    //     $pdo = Connect::seConnecter();
    //     $requete = $pdo->prepare("
    //         SELECT *
    //         FROM personne
    //         INNER JOIN reali ON reali.idPersonne = personne.idPersonne
    //     ");
    //     $requete->execute();

    //     $detReali = $requete->fetch();

    //     require "view/detReali.php";
    // }
}