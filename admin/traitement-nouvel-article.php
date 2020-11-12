<?php
session_start();
if (!isset($_POST["champ_titre"])) { 
    header("location:editeur-article.php");
}

$iduser = $_SESSION["idUser"];
$titre_a_traiter = addslashes($_POST["champ_titre"]);
$contenu_a_traiter = addslashes($_POST["champ_contenu"]);

$extension = pathinfo($_FILES['champ_image']['name'], PATHINFO_EXTENSION);
define('FOLDER', '../imgarticle/');
if (isset($_POST['publier'])) {
    if(empty($_FILES['champ_image']['name'])) {
        $condition = false;
        $erreur = "L'image est manquante";
    }
    if (in_array(strtolower($extension), ['jpg','jpeg','png'])) {
        $fileUniq = sha1(uniqid()) .'.'. $extension;

        if (!move_uploaded_file($_FILES['champ_image']['tmp_name'], FOLDER.$fileUniq)) {
            $condition = false;
            $erreur = "Problème lors de l'upload";
        }
    }
}
$image_a_traiter = addslashes($fileUniq);

include("../inc/functions.php");


$connexion = connexion_BDD();

$requete = "INSERT INTO `articles` (`titre`, `contenuArticle`, `cheminImage`, `dateArticle`, `idUser`) VALUES ('" . $titre_a_traiter . "', '" . $contenu_a_traiter . "', '" . $image_a_traiter . "', now(),'".$iduser."')";

$connexion->query($requete);
mysqli_close($connexion);

header("location:editeur-article.php");
