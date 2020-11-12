<?php

if (!isset($_GET["id"])) {
    header("location:editeur-article.php");
}

$id_article = $_GET["id"];

include("../inc/functions.php");

$connexion = connexion_BDD();

$requete = "DELETE FROM `articles` WHERE `idArticle` = " . $id_article;

$connexion->query($requete);

mysqli_close($connexion);

header("location:editeur-article.php");
