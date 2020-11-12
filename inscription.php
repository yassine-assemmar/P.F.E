<?php

$titre_page = "Inscription";
// include("inc/header.php");

?>


<?php
$nom = "";
$prenom = "";
$pseudo = "";
$photoProfil = "";
$dateNaissance = "";
$sexe = "";
$mail = "";
$adresse = "";
$codePostal = "";
$ville = "";
$login = "";
$pass = "";
$class_error = "";

if (isset($_GET['error'])) {
    $class_error = "error";
    print '<div class="message-error">Inscription impossible.<br/> Nom d\'utilisateur déjà utilisé.</div>';
    if (isset($_GET['nom'])) {
        $nom = $_GET['nom'];
    }
    if (isset($_GET['prenom'])) {
        $prenom = $_GET['prenom'];
    } 
    if (isset($_GET['pseudo'])) {
        $pseudo = $_GET['pseudo'];
    }
    if (isset($_GET['dateNaissance'])){
        $dateNaissance = $_GET['dateNaissance'];
    }
    if (isset($_GET['sexe'])) {
        $sexe = $_GET['sexe'];
    }
    if (isset($_GET['mail'])) {
        $mail = $_GET['mail'];
    }
    if (isset($_GET['adresse'])) {
        $adresse = $_GET['adresse'];
    }
    if (isset($_GET['codePostal'])) {
        $codePostal = $_GET['codePostal'];
    }
    if (isset($_GET['ville'])) {
        $ville = $_GET['ville'];
    }
    if (isset($_GET['login'])) {
        $login = $_GET['login'];
    }
    if (isset($_GET['pass'])) {
        $pass = $_GET['pass'];
    }
}
?>
<head>
    <link rel="stylesheet" media="screen" type="text/css" title="style" href="css/option.css" />  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="bodylogout">
<main>
<div class="form-wizard">  
  <div class="steps">
    <ul>
      <li>
        <span>1</span>
        Creation du compte
      </li>
      <li>
        <span>2</span> 
        Info personnel
      </li>
      <li>
        <span>3</span>
        Info complémentaire
      </li>
        <li>
        <span>4</span>
        Finir
      </li>
    </ul>
  </div>
  <div class="myContainer">
    <form method="post" action="enregistrer.php" enctype="multipart/form-data">
        <div class="form-container animated">
        <h2 class="text-center form-title">Creation du compte</h2>
            <div class="form-group">
            <input class="inputstyle" type="text" placeholder="Pseudo" name="pseudo" id="pseudo" value="<?php print $pseudo; ?>">
            </div><div class="form-group">
            <input class="inputstyle" type="email" placeholder="E-mail" name="mail" id="mail" value="<?php print $mail; ?>">
            </div>
            <div class="form-group">
            <input class="inputstyle" type="text" placeholder="Login"  class="<?php print $class_error; ?>" type="text" name="login" id="login" value="<?php print $login; ?>">
            </div>
            <div class="form-group">
            <input class="inputstyle" type="password" placeholder="Mot de passe"  type="password" name="pass" id="pass">
            </div>
            <div class="form-group text-center mar-b-0">
            <input type="button" value="NEXT" class="btn btn-primary next">        
            </div>
        </div>
        <div class="form-container animated">
        <h2 class="text-center form-title">Info personnel</h2>
            <div class="form-group">
            <input class="inputstyle" type="text" placeholder="Prenom" name="prenom" id="prenom" value="<?php print $prenom; ?>">
            </div>
            <div class="form-group">
            <input class="inputstyle" type="text" placeholder="Nom" name="nom" id="nom" value="<?php print $nom; ?>">
            </div>
            <div class="form-group">
            <input class="inputstyle" type="text" placeholder="Code postal"  name="codePostal" id="codePostal" value="<?php print $codePostal; ?>">
            </div>
            <div class="form-group">
            <textarea class="inputstyle" placeholder="Adresse"  type="text" name="adresse" id="adresse" value="<?php print $adresse; ?>"></textarea>
            </div>
            <div class="form-group text-center mar-b-0">
            <input type="button" value="BACK" class="btn btn-default back">        
            <input type="button" value="NEXT" class="btn btn-primary next">        
            </div>
        </div>
        <div class="form-container animated">
        <h2 class="text-center form-title">Info complémentaire</h2>
            <div class="form-group">
                <label for="dateNaissance">Date de naissance</label>
                <input class="inputstyle" type="date" placeholder="Date de naissance" name="dateNaissance" id="dateNaissance" value="<?php print $dateNaissance; ?>">
            </div>
            <div class="form-group">
                <input class="inputstyle" type="file" placeholder="Photo de profil" name="champ_image" accept="image/png, image/jpeg, image/jpg" />
            </div>
            <div class="form-group">
                <label for="sexe">Je suis :</label>
                <input type="radio" name="sexe" value="Femme">Femme <br>
                <input type="radio" name="sexe" value="Homme">Homme 
            </div>
            <div class="form-group text-center mar-b-0">
            <input type="button" value="BACK" class="btn btn-default back">        
            <input type="button" value="NEXT" class="btn btn-primary next">        
            </div>
        </div>
        <div class="form-container animated">
        <h2 class="text-center form-title">Finish</h2>
            <div class="form-group">
            <h3 class="text-center">Thanks for Stay Tuned!</h3>
            <p class="text-center">Made by <a href="https://www.linkedin.com/in/yassine-assemmar-6b6b80113/" target="_blank">@Assemmar Tarieu Duran</a></p>
            </div>
            <div class="form-group text-center mar-b-0"> 
            <input type="button" value="BACK" class="btn btn-default back"> 
            <input type="submit" class="btn btn-primary submit" value="Envoyer" name="publier">         
            </div>
        </div>
    </form>
  </div>
</div>
</main>
<footer>
    <a href="legal.html">Mentions légales</a>
    <a href="">Facebook</a>
    <a href="">Myspace</a>
</footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/jacascript" src="/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="./admin/JS/main.js"></script>
</body>

</html>

