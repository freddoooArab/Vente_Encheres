<?php $this->titre = "Vente aux enchères - " . $this->nettoyer($produit['nom']); ?>

<article>
    <header>
        <h1 class="titreProduit"><?= $this->nettoyer($produit['nom']) ?></h1>
        <time><?= $this->nettoyer($produit['date']) ?></time>, par <?= $this->nettoyer($produit['nom']) ?>
        <h3 class=""><?= $this->nettoyer($produit['description']) ?></h3>
    </header>
</article>
<hr />
<header>
    <h1 id="titreReponses">Offres sur <?= $this->nettoyer($produit['nom']) ?> :</h1>
</header>
<?= ($encheres->rowCount() == 0) ? '<p class="message">Pas encore de encheres pour cet produit.</p>' : '' ?>
<?php
foreach ($encheres as $enchere):
    ?>
        <p>
            <?= $this->nettoyer($enchere['date']) ?>, <?= $this->nettoyer($enchere['auteur']) ?> dit :<br/>
            <strong><?= $this->nettoyer($enchere['nom_enchere']) ?></strong><br/>
            <?= $this->nettoyer($enchere['texte']) ?>
        </p>
<?php endforeach; ?>

<form action="Encheres/ajouter" method="post">
    <h2>Ajouter une offre</h2>
    <p>
        <label for="auteur">Courriel de l'auteur (xxx@yyy.zz)</label> : <input type="text" name="auteur" id="auteur" /> 
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?> 
        <br />
        <label for="texte">Nom du produit</label> :  <input type="text" name="nom" id="titre" /><br />
        <label for="texte">Offre</label> :  <textarea type="text" name="texte" id="texte" >Écrivez votre offre ici</textarea><br />
        <input type="hidden" name="produit_id" value="<?= $this->nettoyer($produit['id']) ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>


