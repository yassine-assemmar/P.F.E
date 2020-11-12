<?php
$titre_page = "Profil";
include "inc/header.php";

?>

<link rel="stylesheet" media="screen" type="text/css" title="style" href="css/option.css" />

<main class="profil-wrap">
                <?php
                $hote = "localhost";
                $utilisateur = "root";
                $motdepasse = "";
                $base = "yourtouch";
                $url = "imgarticle/";
                $connexion = mysqli_connect($hote, $utilisateur, $motdepasse, $base);
                
                if (isset($_GET['id']) and !empty($_GET['id'])) :
                    
                    $get_id = htmlspecialchars($_GET['id']);
                
                    $sql = "SELECT * FROM users WHERE `idUser` = '$get_id'"; 
                    $req = $connexion->prepare("SELECT * FROM users WHERE `idUser` = '$get_id'");
                    $resultat = $connexion->query($sql);
                    while ($profil = mysqli_fetch_array($resultat)):
                        $image = 'profil.jpg';
                        if($profil["photoProfil"] != "")
                        {
                            $image = $profil["photoProfil"];
                        }
                
                  
                    $requete = "SELECT * FROM articles WHERE idUser ='". $profil["idUser"]."'ORDER BY idArticle DESC";
                    $imagearticle = $connexion->query($requete);
                
                    ?>
                    <section class=head-profil>
                        <div class="profil">
                            <div class="photo-user" style="background-image: url('<?=$url.$image?>')"></div>
                                <div class="profil-info">
                                    <h2 class="profil-pseudo"><?= $profil['pseudo'];?></h2>
                                        <br> <br>
                                        <p><?= $profil['prenom']. " " . $profil['nom'];?></p>
                                    <a class="mailprofil" href="mailto:<?= $profil['mail'];?>"><?= $profil['mail'];?></a>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="article-user">
                            <div class="photo">
                                <?php while ($photoarticle = mysqli_fetch_array($imagearticle)){ 
                                    $imageArtcile = 'default.png';
                                    if($photoarticle['cheminImage'] != "")
                                    {
                                        $imageArtcile = $photoarticle['cheminImage'];
                                    }    
                                ?>
                                <a href="admin/article.php?id=<?= $photoarticle['idArticle'] ?>">
                                    <div class="photo-article" style="background-image: url('<?=$url.$imageArtcile?>')"></div>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                <?php endwhile;
                       endif; ?>
        </main>
<?php
include "inc/footer.php";