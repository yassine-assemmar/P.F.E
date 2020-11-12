<meta charset="utf-8"/>
<?php
 session_start();
 include("inc/functions.php");

$connexion = connexion_BDD();


if(isset($_POST['articleID'])) {
    $idArticle = $_POST['articleID'];
    $commentaire = htmlentities($_POST['commentaire'], ENT_QUOTES, "UTF-8");
    $idUser = $_SESSION['idUser'];
    $date = date("Y-m-d", time());
    $requetePostCommentaire = "INSERT INTO `commentaires` (`contenuCommentaire`, `dateCommentaire`, `idUser`, `idArticle`)
    VALUES ('".$commentaire."', '".$date."', '".$idUser."', '".$idArticle."')";
    $resultatCommentaire = $connexion->query($requetePostCommentaire);

    $count = "SELECT COUNT(`idCommentaire`) FROM `commentaires` WHERE `idArticle` =". $idArticle;
    $resultat = $connexion->query($count);
    $nbCom = mysqli_fetch_array($resultat);
    header('location: index.php#article-'.$idArticle);
}