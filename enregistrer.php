<?php

$hote = "localhost";
$utilisateur = "root";
$motdepasse = "";
$base = "yourtouch";

$connexion = mysqli_connect($hote, $utilisateur, $motdepasse, $base);


$nouveau_nom = htmlentities(trim($_POST['nom']));
$nouveau_prenom = htmlentities(trim($_POST['prenom']));
$nouveau_Pseudo = htmlentities(trim($_POST['pseudo']));


$extension = pathinfo($_FILES['champ_image']['name'], PATHINFO_EXTENSION);

define('FOLDER', 'imgarticle/');
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

$date_naissance = htmlentities($_POST['dateNaissance']);
$nouveau_genre = htmlentities($_POST['sexe']);
$nouvelle_mail = htmlentities(trim($_POST['mail']));
$nouvelle_adresse = htmlentities(trim($_POST['adresse']));
$nouveau_codePostal = htmlentities(trim($_POST['codePostal']));
$nouvelle_ville = htmlentities(trim($_POST['ville']));
$nouveau_login = htmlentities(trim($_POST['login']));
$nouveau_pass = $_POST['pass'];

$sql = "SELECT * FROM users WHERE `login` ='$nouveau_login'";
$resultat = $connexion->query($sql);
if (count(mysqli_fetch_all($resultat)) >= 1) {
    header("location:inscription.php?error=1&nom=" . $_POST['nom'] . "&prenom=" . $_POST['prenom'] . "&adresse=" . $_POST['adresse'] . "&ville=" . $_POST['ville'] ."&sexe=" . $_POST['sexe'] . "&codePostal=" . $_POST['codePostal'] . "&pseudo=" . $_POST['pseudo'] . "&mail=" . $_POST['mail'] . "&login=" . $_POST['login'] . "");
} else {
    
    $requete = "INSERT INTO `users` (`nom`, `prenom`, `pseudo`, `photoProfil`, `dateNaissance`, `sexe`, `mail`, `adresse`, `codePostal`, `ville`, `login`, `pass`, `idRole`)
    VALUES ('".$nouveau_nom."', '".$nouveau_prenom."', '".$nouveau_Pseudo."', '".$image_a_traiter."', '".$date_naissance."', '".$nouveau_genre."', '".$nouvelle_mail."', '".$nouvelle_adresse."', '".$nouveau_codePostal."', '".$nouvelle_ville."', '".$nouveau_login."', PASSWORD('" . $nouveau_pass . "'),'2');";
    
    $resultat = $connexion->query($requete);
    header("location:index.php");
}
