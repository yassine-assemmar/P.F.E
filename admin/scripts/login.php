<?php
session_start();
$login = "";
$mdp = "";
$iduser= "";
if (isset($_POST["champ_identifiant"]) && isset($_POST["champ_motdepasse"])) {
    $login = $_POST["champ_identifiant"];
    $mdp = $_POST["champ_motdepasse"];
    
    $connexion = mysqli_connect("localhost", "root", "", "yourtouch");
    $sql ="SELECT `login`, `pass`, `niveau_user`, `idUser` FROM `users` INNER JOIN `roles` ON `users`.`idRole`=`roles`.`idRole` WHERE `login` = '$login' AND `pass` = PASSWORD('$mdp')";
    $res = $connexion->query($sql);

    if (mysqli_num_rows($res) > 0) {
        while ($row = $res->fetch_assoc()) {
            $_SESSION["login"] = $login;
            $_SESSION["role"] = $row["niveau_user"];
            $_SESSION["idUser"] = $row["idUser"];
        }
    }
    mysqli_close($connexion);
    header("location:../index.php");
    
}

?>
       

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ padding:7%; font: 14px sans-serif; height:100vh; background: linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));}
        .wrapper{ width: 350px; padding: 20px; margin:auto; box-shadow: 0 0 30px rgba(0, 0, 0, 0.9); background:#fff;}
        .form-control {background: #f9f9f9; }
    </style>
</head>
<body>
<div class="wrapper">
        <h2>Login</h2>
        <p>Veuillez rentrer vos informations de connexion</p>
        <form method="post" >
            <div class="form-group <?php echo (!empty($login)) ? 'has-error' : ''; ?>">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="champ_identifiant" class="form-control" value="<?php echo $login; ?>" id="username">
                <span class="text-danger"><?php echo $login; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($mdp)) ? 'has-error' : ''; ?>">
                <label for="password">Mot de passe</label>
                <input type="password" name="champ_motdepasse" class="form-control" id="password">
                <span class="text-danger"><?php echo $mdp; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Login">
            </div>
            <p>Vous n'avez pas de compte ? <a href="../../inscription.php">Inscrivez-vous maintenant</a>.</p>
        </form>
    </div> 
</body>
</html>