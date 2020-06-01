<?php $this->titre = "Le Blogue du prof - " . $this->nettoyer($produit['titre']); ?>

<produit>
    <header>
        <h1 class="titreProduit"><?= $this->nettoyer($produit['titre']) ?></h1>
        <time><?= $this->nettoyer($produit['date']) ?></time>, par <?= $this->nettoyer($produit['nom']) ?>
        <h3 class=""><?= $this->nettoyer($produit['sous_titre']) ?></h3>
    </header>
    <p><?= $this->nettoyer($produit['texte']) ?></p>
    <p><?= $this->nettoyer($produit['type']) ?></p>
</produit>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $this->nettoyer($produit['titre']) ?> :</h1>
</header>
<?= ($encheres->rowCount() == 0) ? '<p class="message">Pas encore de encheres pour cet produit.</p>' : '' ?>
<?php
foreach ($encheres as $enchere):
    ?>
        <p>
            <?= $this->nettoyer($enchere['date']) ?>, <?= $this->nettoyer($enchere['auteur']) ?> dit :<br/>
            <strong><?= $this->nettoyer($enchere['titre']) ?></strong><br/>
            <?= $this->nettoyer($enchere['texte']) ?>
        </p>
<?php endforeach; ?>

<form action="Encheres/ajouter" method="post">
    <h2>Ajouter un enchere</h2>
    <p>
        <label for="auteur">Courriel de l'auteur (xxx@yyy.zz)</label> : <input type="text" name="auteur" id="auteur" /> 
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?> 
        <br />
        <label for="texte">Titre</label> :  <input type="text" name="titre" id="titre" /><br />
        <label for="texte">Enchere</label> :  <textarea type="text" name="texte" id="texte" >Écrivez votre enchere ici</textarea><br />
        <label for="prive">Privé?</label><input type="checkbox" name="prive" />
        <input type="hidden" name="produit_id" value="<?= $this->nettoyer($produit['id']) ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>


