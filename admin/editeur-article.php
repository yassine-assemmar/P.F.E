<?php
session_start();
include("../inc/functions.php");

if (check_role($_SESSION['role']) != "administrateur") {
    header("location:../index.php");
}

$connexion = connexion_BDD();
$auteur_de_article = "";
$titre_article = "";
$contenu_article = "";
$image_article = "";
$url = "../imgarticle";
if (isset($_GET["id"])) {
    $id_article = $_GET["id"];
    $titre_formulaire = "Edition d'un article";
    $script = "modification-article.php?id=" . $id_article;
    $requete = "SELECT * FROM articles INNER JOIN users ON articles.idUser=users.idUser WHERE idArticle = " . $id_article;
    $resultat = $connexion->query($requete);

    if (mysqli_num_rows($resultat) == 0) {
        header("location:editeur-article.php");
    }

    while ($ligne = mysqli_fetch_array($resultat)) {
        $auteur_de_article = $ligne["pseudo"];
        $titre_article = $ligne["titre"];
        $contenu_article = $ligne["contenuArticle"];
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
         
        }
} else {
    $titre_formulaire = "Ajouter un article";
    $script = "traitement-nouvel-article.php";
}

?>

<head>
    <meta charset="utf-8" />
    <title>Editeur d'articles</title>
    <link rel="stylesheet" type="text/css" href="../css/style-editeur.css" />
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
</head>

<body>
    <header style="display:flex; justify-content:space-evenly; background:white; align-items:center; height:60px; border-bottom:1px solid; width:100%; position:fixed;">
        <a href="../index.php" class="logo">
            <div><svg height="40" viewBox="1 1 511.99998 511.99998" width="40" xmlns="http://www.w3.org/2000/svg"><path d="m496.054688 390.429688c-8.179688.382812-14.476563 7.433593-14.476563 15.621093v60.316407c0 8.402343-6.808594 15.210937-15.210937 15.210937h-60.316407c-8.191406 0-15.238281 6.296875-15.621093 14.476563-.414063 8.734374 6.546874 15.945312 15.191406 15.945312h91.167968c8.398438 0 15.210938-6.808594 15.210938-15.210938v-91.167968c0-8.644532-7.210938-15.601563-15.945312-15.191406zm0 0"/><path d="m105.949219 481.578125h-60.316407c-8.402343 0-15.210937-6.808594-15.210937-15.210937v-60.316407c0-8.1875-6.296875-15.238281-14.476563-15.621093-8.734374-.410157-15.945312 6.546874-15.945312 15.191406v91.167968c0 8.402344 6.808594 15.210938 15.210938 15.210938h91.167968c8.644532 0 15.605469-7.210938 15.191406-15.945312-.382812-8.179688-7.433593-14.476563-15.621093-14.476563zm0 0"/><path d="m496.789062 0h-90.738281c-8.191406 0-15.238281 6.292969-15.621093 14.476562-.414063 8.734376 6.546874 15.945313 15.191406 15.945313h60.746094c8.402343 0 15.210937 6.808594 15.210937 15.210937v60.316407c0 8.1875 6.296875 15.238281 14.476563 15.621093 8.734374.414063 15.945312-6.546874 15.945312-15.191406v-91.167968c0-8.402344-6.808594-15.210938-15.210938-15.210938zm0 0"/><path d="m15.945312 121.570312c8.179688-.382812 14.476563-7.433593 14.476563-15.621093v-60.316407c0-8.402343 6.808594-15.210937 15.210937-15.210937h60.316407c8.1875 0 15.238281-6.296875 15.621093-14.476563.410157-8.734374-6.546874-15.945312-15.191406-15.945312h-91.167968c-8.402344 0-15.210938 6.808594-15.210938 15.210938v91.167968c0 8.644532 7.210938 15.601563 15.945312 15.191406zm0 0"/><path d="m229.625 77.035156c-81.484375 0-147.53125 66.328125-147.53125 147.539063v26.019531c22.257812-93.320312 101.214844-163.609375 198.292969-173.558594zm0 0"/><path d="m419.226562 397.71875c-5.179687 8.738281-12.125 16.414062-20.472656 22.542969l-105.628906-105.632813c-5.945312-5.929687-5.945312-15.5625 0-21.503906 5.941406-5.945312 15.574219-5.945312 21.503906 0zm0 0"/><path d="m357.65625 250.097656c-14.359375-14.359375-33.464844-22.265625-53.773438-22.265625-67.042968 0-101.941406 81.667969-53.785156 129.824219l77.308594 77.308594c14.992188-.488282 28.824219 1.117187 41.515625-1.511719l-97.304687-97.304687c-28.902344-28.902344-7.953126-77.898438 32.265624-77.898438 11.671876 0 23.351563 4.453125 32.265626 13.367188l93.503906 93.5c.4375-5.230469.179687-6.832032.253906-42.769532zm0 0"/><path d="m400.679688 207.082031c-53.378907-53.375-140.226563-53.375-193.597657 0-53.375 53.371094-53.375 140.21875 0 193.597657l34.285157 34.285156h43.027343l-55.804687-55.800782c-41.511719-41.515624-41.511719-109.058593 0-150.574218 41.515625-41.511719 109.058594-41.511719 150.574218 0l50.742188 50.742187v-43.023437zm0 0"/><path d="m393.460938 127.585938c-26.929688-13.714844-57.585938-21.367188-89.578126-21.367188-141.175781 0-235.496093 142.9375-183.203124 272.0625 8.4375 20.847656 20.230468 39.859375 35.125 56.644531 1.773437.070313.054687.027344 42.539062.039063l-12.777344-12.777344c-65.230468-65.230469-65.230468-171.378906 0-236.621094 32.621094-32.609375 75.464844-48.925781 118.316406-48.925781 77.542969 0 119.601563 50.914063 121.660157 52.28125-5.738281-23.058594-16.914063-43.988281-32.082031-61.335937zm0 0"/></svg></div>
            <div> | </div>
            <div> YourTouch</div>
        </a>
        <!-- <a href="../index.php"> Accueil </a> -->
        <form style="margin:0px" action="../admin/scripts/logout.php">
            <a href="scripts/logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path><line x1="12" y1="2" x2="12" y2="12"></line></svg></a>
            </a>
        </form>
    </header>
    <main style="padding-top: 100px; margin:auto;">
    <h2><a href="../publication.php" ><div class="yassine"><?php echo $titre_formulaire; ?></div></a></h2>

    <!-- <form action="<?php echo $script; ?>" method="post">
       
        <label>Pseudo :</label> &nbsp;
        <input required type="text" name="champ_auteur" value="<?php echo $auteur_de_article; ?>" />
        <br /><br />

        <label> Titre de l'article :</label> &nbsp;
        <input required type="text" name="champ_titre" value="<?php echo $titre_article; ?>" />
        <br /><br />

        <label> Contenu de l'article :</label> &nbsp;
        <textarea required name="champ_contenu"><?php echo $contenu_article; ?></textarea>
        <br /><br />

        <label> Image de l'article :</label> &nbsp;
        <input type="file" name="champ_image" value="<?php echo $url.$image_article; ?>" ></input>
        <br /><br />

        <input type="submit" value="Valider" />
    </form> -->

    <!-- <h1>Ajouter une nouvelle publication</h1>
    <div class="pub">
        <a href='editeur-article.php'>Nouvelle publication</a>
    </div> -->

    <div>
        <h1 style="text-align:center; padding-top: 35px;">Liste des articles</h1>
        <?php
        $requete2 = "SELECT * FROM articles INNER JOIN users ON articles.idUser=users.idUser ORDER BY `idArticle` DESC";
        $resultat = $connexion->query($requete2);
        while ($ligne = mysqli_fetch_array($resultat)) {
            $id_article = $ligne["idArticle"]; // ou $ligne[0]
            $titre_article = $ligne["titre"]; // ou $ligne[2]
            $auteur_de_article = $ligne["pseudo"];
            ?>
            <table class="tableadmin">
            <tr>
            <td style="width:30%; font-weight:bold;">Auteur de l'article</td>
            <td style="font-weight:bold">Titre de l'article </td>
            <td style="font-weight:bold">Supprimer l'article </td>
            </tr>

            <td style="width:30%"><?=$auteur_de_article?></td>
            <td>
                <!-- <a href = "editeur-article.php?id=$id_article"> <?=$titre_article?> </a> -->
                <a href="../admin/article.php?id=<?= $ligne['idArticle'] ?>">
                    <?=$titre_article?>
                </a>
            </td>
           
            <td>
                <a onclick = 'if ( !window.confirm( "Supprimer cet article ?" ) ) {
                    return false;
                }' 
                href = "supprimer-article.php?id=<?= $id_article ?>">Supprimer</a>
            </td>
            <br>
            </table>
            <?php
        }
        ?><br /><br />
    </div>
    <div id="scrollUp">
        <a href="#top"><img src="../imgarticle/to_top.png"/></a>
    </div>
    </main>
</body>