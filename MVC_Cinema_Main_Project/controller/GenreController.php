<?php

namespace Controller;

use Model\Connect;

class GenreController {

    // Lister les genres
    public function listGenres() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT genre.libelle, genre.idGenre
            FROM genre
        ");
        $requete->execute();

        $genres = $requete->fetchAll();

        require "view/listGenres.php";
    }

    public function detGenre($id) {

        $pdo = Connect::seConnecter();

        $requeteGenre = $pdo->prepare("
            SELECT genre.libelle
            FROM genre
            WHERE genre.idGenre = :id
        ");
        $requeteGenre->execute(["id" => $id]);

        $genre = $requeteGenre->fetch();

        $requete = $pdo->prepare("
        SELECT film.titre, DATE_FORMAT(film.annee, \"%Y\") AS date, film.synopsis, film.affiche, film.idFilm
        FROM genre
        INNER JOIN categorie ON categorie.idGenre = genre.idGenre
        INNER JOIN film ON film.idFilm = categorie.idFilm
        WHERE genre.idGenre = :id
        ");
        $requete->execute(["id" => $id]);
        
        $films = $requete->fetchAll();
        
        require "view/detGenre.php";
    }

    public function addGenre() {
        
        // si on soumet le formulaire
        if(isset($_POST["submit"])) {
            
            /// filtrage des entrées
            $libelle = filter_input(INPUT_POST, "libelle", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            // si le filtre est valide
            if($libelle) {
                $pdo = Connect::seConnecter();
                $requete = $pdo->prepare("
                    INSERT INTO genre (libelle) VALUES (:libelle)
                ");
                
                $requete->execute(["libelle" => $libelle]);
                header("Location: index.php?action=listGenres");die;
            }
        }

        require "view/addGenre.php";
    }
}