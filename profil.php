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
                $login = $_SESSION['login'];
                $sql = "SELECT * FROM users WHERE `login` ='$login'";
                $req = $connexion->prepare("SELECT * FROM users WHERE `login` ='$login'");
                $resultat = $connexion->query($sql);
                while ($donnees = mysqli_fetch_array($resultat)):
                    $image = 'profil.jpg';
                    if($donnees["photoProfil"] != "")
                    {
                        $image = $donnees["photoProfil"];
                    }
                $requete = "SELECT * FROM articles WHERE idUser =". $donnees['idUser']." ORDER BY idArticle DESC";
                $imagearticle = $connexion->query($requete);
                
                    ?>
                    <section class=head-profil>
                        <div class="profil">
                            <div class="photo-user" style="background-image: url('<?=$url.$image?>')"></div>
                                <div class="profil-info">
                                    <h2 class="profil-pseudo"><?= $donnees['pseudo'];?></h2>
                                        <br> <br>
                                        <p><?= $donnees['prenom']. " " . $donnees['nom'];?></p>
                                    <a class="mailprofil" href="mailto:<?= $donnees['mail'];?>"><?= $donnees['mail'];?></a>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="article-user">
                            <div class="photo">
                                <?php while ($photoarticle = $imagearticle->fetch_array()){ 
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
                <?php endwhile; ?>
        </main>
<?php
include "inc/footer.php";
