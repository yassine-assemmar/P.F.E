<?php

$titre_page = "Accueil";
require("inc/header.php");

if(empty($_SESSION)){
    header('location: admin/scripts/login.php');
}
else

?>
<main>

<?php
$mysqli = new mysqli('localhost', 'root', '', 'yourtouch');
$url = "imgarticle/";
$mysqli->set_charset("utf8");



$requete = 'SELECT * FROM articles INNER JOIN users ON articles.idUser=users.idUser ORDER BY idArticle DESC';
$resultat = $mysqli->query($requete);



while ($ligne = $resultat->fetch_assoc()) :
$date = new DateTime($ligne['dateArticle']);


$requete = 'SELECT *, pseudo FROM commentaires INNER JOIN users ON commentaires.idUser=users.idUser WHERE commentaires.idArticle = '.$ligne['idArticle']. ' ORDER BY idCommentaire ASC';
$commentaire = $mysqli->query($requete);
    
$req = "SELECT COUNT(`idCommentaire`) as `nb_com` FROM `commentaires` WHERE `idArticle` =". $ligne['idArticle'];
$result = $mysqli->query($req);
$num_rows = $result->fetch_assoc();
$nb_com = $num_rows['nb_com'];

$image = 'default.png';
  if($ligne["cheminImage"] != ""):
        $image = $ligne["cheminImage"];
  endif;
  
$photo_profil = 'photo_profil.png';
  if($ligne["photoProfil"] != ""):
    $photo_profil = $ligne["photoProfil"];
  endif;


  ?> 


<article class="articleindex">
    <div class="ad">
    <section>
        <a href="admin/article.php?id=<?= $ligne['idArticle'] ?>" class="lienArticle">
            <img src="<?=$url.$image?>" alt="erreur" style="width:100%"/>
        </a>
    </section>

    <section class="posteur">
        <div>
            <a href="profil2.php?id=<?= $ligne['idUser']?>">
                <div class="photoprofil" style="background-image: url('<?=$url.$photo_profil?>')"></div>
            </a>
        </div>
        <div>
            <div style="font-weight:bold"><?= $ligne['pseudo']?></div>
            <div style="font-size:12px">
                <?= $date->format('D'." à ".'H:i'); ?>
            </div>
        </div>
    </section>

    <section class="sectioncom">
        <!-- <div><?= $ligne['titre']?></div> -->
        <div class="PC">
            <div><?= snippet($ligne['contenuArticle'], 50)?> </div>
            <div><a href="admin/article.php?id=<?= $ligne['idArticle'] ?>" style="color:Grey">...&nbsp;plus</a></div>
        </div>  
        <div class="listeCommentaires">
            <div class="NB" onclick="afficherCommentaires(this)" >Afficher les <?=$nb_com?> commentaires</div>
            <?php while ($com = $commentaire->fetch_assoc()):?>
            <div class="commentaire" id="commentaire">
                <div><?= $com['pseudo']?></div>
                <div><?=$com['contenuCommentaire']?></div>
                <div><?= $com['dateCommentaire']?></div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    <section>
        <div class="formcom">
    	<form method="post" action="commentaire.php" class="form">
        	<div class="formtext">
        		<input type="hidden" name="articleID" value="<?= $ligne['idArticle'];?>" />
        		<textarea name="commentaire" cols="70px" rows="2" placeholder="Ajouter un commentaire..."></textarea>
            	<button class="publier" type="submit" value="Publier" >Publier</button>
        	</div>
        </form>
        </div>

    </section>
    </div>
</article>

<?php
endwhile;
 ?>
 </main>
<?php

$mysqli->close();
require("inc/footer.php");

?>
<div id="scrollUp">
<a href="#top"><img src="imgarticle/to_top.png"/></a>
</div>

