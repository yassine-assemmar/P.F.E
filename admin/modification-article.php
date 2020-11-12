<?php


session_start();
include("../inc/functions.php");
if (check_role($_SESSION['role']) != "administrateur") {
    header("location:../index.php");
}

if (!isset($_POST["champ_titre"]) || !isset($_GET["id"])) {
    header("location:editeur-article.php");
}

$id_article = $_GET["id"];
$auteur_a_traiter = addslashes($_POST["champ_auteur"]);
$titre_a_traiter = addslashes($_POST["champ_titre"]);
$contenu_a_traiter = addslashes($_POST["champ_contenu"]);
$image_a_traiter = addslashes($_POST["champ_image"]);

$connexion = connexion_BDD();
$requete = "UPDATE `articles` SET pseudo = '$auteur_a_traiter', `titre` = '$titre_a_traiter', `contenu` = '$contenu_a_traiter', image = '$image_a_traiter' WHERE `id` = " . $id_article;

$connexion->query($requete);
mysqli_close($connexion);

header("location:editeur-article.php");
