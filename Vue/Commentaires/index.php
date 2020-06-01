<?php $this->titre = "Le Blogue du prof - Encheres" ?>

<header>
    <h1 id="titreReponses">Encheres du Blogue du prof :</h1>
</header>
<?php
foreach ($encheres as $enchere):
    ?>
    <?php 
        ?>
        <p><?= $this->nettoyer($enchere['date']) ?>, <?= $this->nettoyer($enchere['auteur']) ?> dit <?= $this->nettoyer($enchere['prive']) ? '(EN PRIVÉ)' : '' ?> : <br/>
            <strong><?= $this->nettoyer($enchere['titre']) ?></strong><br/>
            <?= $this->nettoyer($enchere['texte']) ?><br />
            <!-- Vers Adminproduits si utilisateur en session -->
            <a href="<?= ($utilisateur != '') ? 'Admin' : '' ?>Produits/lire/<?= $this->nettoyer($enchere['produit_id']) ?>" >
                [écrit pour l'produit <i><?= $this->nettoyer($enchere['titreProduit']) ?></i>]</a>
        </p>
<?php endforeach; ?>