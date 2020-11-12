<?php

$titre_page = "Publier";
include("inc/header.php");

$connexion = connexion_BDD();
$auteur_de_article = "";
$titre_article = "";
$contenu_article = "";
$image_article = "";
if (isset($_GET["id"])) {
    $id_article = $_GET["id"];
    $titre_formulaire = "Edition d'un article";
    $script = "modification-article.php?id=" . $id_article;

    $requete = "SELECT * FROM `articles` WHERE id = " . $id_article;
    $resultat = $connexion->query($requete);

    if (mysqli_num_rows($resultat) == 0) {
        header("location:editeur-article.php");
    }
    while ($ligne = mysqli_fetch_array($resultat)) {
        $auteur_de_article = $ligne["auteur"];
        $titre_article = $ligne["titre"];
        $contenu_article = $ligne["contenu"];
      
    }
} else {
    $script = "admin/traitement-nouvel-article.php";
}

?>
<!-- <link rel="stylesheet" media="screen" type="text/css" title="style" href="css/option.css" /> -->
<section class="sectionpublication">
    <br /><br />
    <fieldset>
        <legend>Déposer un article </legend>
        <form action="<?php echo $script; ?>" method="post" enctype="multipart/form-data">
            <label class="publication-label">Auteur de l'article :</label>
            <input required type="text" name="champ_auteur" value="<?php echo $_SESSION['login']; ?>" readOnly="readOnly" />
            <br /><br />

            <label class="publication-label"> Titre de l'article :</label>
            <input required type="text" name="champ_titre" placeholder="votre titre..." />
            <br /><br />

            <label class="publication-label"> Contenu de l'article :</label>
            <textarea class="publication" required name="champ_contenu" placeholder="Votre texte"></textarea>
            <br /><br />

            <label class="publication-label"> Image de l'article :</label>
            <input class="image" type="file" name="champ_image" accept="image/png, image/jpeg, image/jpg" />
            <br /><br />

            <input type="submit" value="Valider" name="publier" />
    </fieldset>
</section>



<?php include "inc/footer.php"; ?>