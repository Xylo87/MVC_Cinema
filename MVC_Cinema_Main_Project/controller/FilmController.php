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

    

    // Détail film
    public function detFilm($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT film.titre, DATE_FORMAT(film.annee, \"%d %M %Y\") AS annee, DATE_FORMAT(SEC_TO_TIME(duree * 60), \"%kh%i\") AS duree, film.synopsis, film.note, film.affiche, film.trailer, CONCAT(personne.prenom,' ',personne.nom) AS reali, reali.idReali
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
           SELECT CONCAT(personne.prenom,' ',personne.nom) AS cast, role.personnage, acteurice.idActeurice
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
            SELECT genre.libelle, genre.idGenre
            FROM genre
            INNER JOIN categorie ON categorie.idGenre = genre.idGenre
            INNER JOIN film ON film.idFilm = categorie.idFilm
            WHERE film.idFilm = :id
        ");
        $requete->execute(["id" => $id]);
    
        $genres = $requete->fetchAll();
    
       

        require "view/detFilm.php";
    }



    // AJOUT FILM
    public function addFilm() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT idGenre, libelle
            FROM genre
        ");
        $requete->execute();

        $genres = $requete->fetchAll();

        $requete2 = $pdo->prepare("
            SELECT idReali, CONCAT(personne.prenom,' ', personne.nom) AS name
            FROM reali
            INNER JOIN personne ON personne.idPersonne = reali.idPersonne
        ");
        $requete2->execute();

        $realis = $requete2->fetchAll();

        if (isset($_POST["submit"])) {
            
            $filmTitre = filter_input(INPUT_POST, "filmTitre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $filmDate = filter_input(INPUT_POST, "filmDate", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $filmDuree = filter_input(INPUT_POST, "filmDuree", FILTER_VALIDATE_INT);
            $filmSynopsis = filter_input(INPUT_POST, "filmSynopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $filmNote = filter_input(INPUT_POST, "filmNote", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $filmAffiche = filter_input(INPUT_POST, "filmAffiche", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $filmTrailer = filter_input(INPUT_POST, "filmTrailer", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $filmTrailer = filter_input(INPUT_POST, "filmTrailer", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $filmReali = filter_input(INPUT_POST, "filmReali", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $filmGenre = filter_input(INPUT_POST, "filmGenre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($filmTitre && $filmDate && $filmDuree && $filmSynopsis && $filmNote && $filmAffiche && $filmTrailer && $filmReali && $filmGenre) {

                $pdo = Connect::seConnecter();
                $requete = $pdo->prepare("
                    INSERT INTO film (titre, annee, duree, synopsis, note, affiche, trailer, idReali) VALUES (:filmTitre, :filmDate, :filmDuree, :filmSynopsis, :filmNote, :filmAffiche, :filmTrailer, :filmReali)
                ");
                $requete->execute([
                    "filmTitre" => $filmTitre,
                    "filmDate" => $filmDate,
                    "filmDuree" => $filmDuree,
                    "filmSynopsis" => $filmSynopsis,
                    "filmNote" => $filmNote,
                    "filmAffiche" => $filmAffiche,
                    "filmTrailer" => $filmTrailer,
                    "filmReali" => $filmReali]);

                $idFilm = $pdo->lastInsertId();
                
                $requete2 = $pdo->prepare("
                    INSERT INTO categorie (idFilm, idGenre) VALUES (:id, :filmGenre)
                ");
                $requete2->execute([
                    "id" => $idFilm,
                    "filmGenre" => $filmGenre]);

                header("Location: index.php?action=listFilms&success=true");die;
            } else {
                header("Location: index.php?action=listFilms&success=false");die;
            }
        }
        require "view/addFilm.php";
    }
}        