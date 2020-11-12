<?php

$hote = "localhost";
$utilisateur = "root";
$motdepasse = "";
$base = "yourtouch";

$connexion = mysqli_connect($hote, $utilisateur, $motdepasse, $base);

$requete = "INSERT INTO 'les_articles'  (`auteur`,`date_article`, `titre`, `contenu` , `image`) VALUES ('" . $nouvelle_auteur . "','" . $nouvelle_date . "', '" . $nouveau_titre . "', '" . $nouveau_contenu . "', '" . $nouvelle_image . "');";

$requete2 = "SELECT * FROM `les_articles` ORDER BY `date_article` DESC";

$resultat = $connexion->query($requete2);

while ($ligne = mysqli_fetch_array($resultat)) {
    $id_article = $ligne["id"];
    $auteur_de_article = $ligne["auteur"];
    $date_article = $ligne["date_article"];
    $titre_article = $ligne["titre"];
    $contenu_article = $ligne["contenu"];
    $image_article = $fileUniq["image"];
    echo "Article " . $id_article . " : " . $auteur_de_article . " : " . $titre_article . " (" . $date_article . ")<br/>";
}
