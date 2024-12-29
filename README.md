# ⚡🎥 Application type "Base de données en ligne" autour du Cinéma (PHP/SQL)

## 1. Description 
Ce projet est un exercice pratique de programmation web utilisant l'architecture **Modèle/Vue/Contrôleur** et **PHP**.
Il permet l'affichage d'une sélection de films (titre, date de sortie, durée, synopsis affiche, trailer etc.) ainsi que de fiches détaillés concernant son casting et sa réalisation. 
Le projet s'inspire d'applications en ligne comme [IMDB](https://www.imdb.com/fr/).
Les informations affichées sont appelées depuis une base de données **MySQL** grâce à l'architecure **MVC**.

---

## 2. Fonctionnalités
- Navigation entre les différentes **Vues** (films, acteurs/actrices, réalisateurs, genres) à l'aide d'une **Navbar** sommaire.
- Listage des films, acteurs/actrices et réalisateurs.
- Les **Vues** sont interconnectées via des liens hypertextes, pour ce qui concerne les fiches détaillées ou les élements qui seraient communs à plusieurs films.
- Fonctions d'ajout de *Genres*, de *Réalisateurs*, de *Films* et fonction de suppression de *Films*. 
Ces fonctionnalités sont disponibles pour l'utilisateur au moyen de simples **Formulaires**
Les ajouts et suppressions se font au sein des **Vues** mais également en base de données grâce aux **Contrôleurs** dédiés.
- Respect des bonnes pratiques de codage :
  - **Temporisation de sortie**
  - **Templating**

  ---

## 3. Installation 

1. Clonez ce projet depuis GitHub :
   ```bash
   git clone https://github.com/Xylo87/MVC_Cinema.git
   cd MVC_Cinema
   ```
2. Assurez-vous que PHP est installé sur votre machine en exécutant la commande suivante :
   ```bash
   php --version
   ```

3. Installer un logiciel type "Laragon" pour disposer d'un environnement qui permet d'exécuter un script PHP :

- Télécharger Laragon [ici](https://laragon.org/download/)
- Démarrer Laragon
- Enregistrer le "Repo" dans le dossier laragon\www\
- Exécuter la fonction "Web" de Laragon

4. Pour commencer la navigation, veuillez exécuter la requête suivante dans la barre d'URL :
   ```bash
   php http://localhost/MVC_Cinema/MVC_Cinema_Main_Project/index.php?action=listFilms
   ```

   ---

## 4. Améliorations possibles

Ajout de style avec CSS, pour faire correspondre l'application à la maquette suivante :
- [Home Page](https://www.figma.com/design/zM6koRKTMNnZ7x2gem2mpd/CCPM-(Cinema)---Home-Page?node-id=0-1&t=YVKZmvCw1O8UdSRQ-1)
- [Nav Page](https://www.figma.com/design/F8cC3t7FIN4dPH1bkqPS3a/CCPM-(Cinema)---Film-Page?t=YVKZmvCw1O8UdSRQ-1)

---

## 5. Auteur
Ce projet a été réalisé par Théo Arbogast (aka Xylo87).  
N'hésitez pas à ouvrir une issue ou à me contacter pour toute suggestion ou question.
