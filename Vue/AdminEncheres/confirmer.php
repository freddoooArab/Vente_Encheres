<?php $this->titre = "Effacer - " . $this->nettoyer($enchere['titre']); ?>

<produit>
    <header>
        <p><h1>
            Effacer?
        </h1>
        <?= $this->nettoyer($enchere['date']) ?>, <?= $this->nettoyer($enchere['auteur']) ?> dit : (privé? <?= $this->nettoyer($enchere['prive']) ?>)<br/>
        <strong><?= $this->nettoyer($enchere['titre']) ?></strong><br/>
        <?= $this->nettoyer($enchere['texte']) ?>
        </p>
    </header>
</produit>

<form action="AdminEncheres/supprimer" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($enchere['id']) ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="Adminproduits/lire" method="post" >
    <input type="hidden" name="id" value="<?= $this->nettoyer($enchere['produit_id']) ?>" />
    <input type="submit" value="Annuler" />
</form>


