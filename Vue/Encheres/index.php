<?php $this->titre = "Vente Encheres" ?>

<header>
    <h1 id="titreReponses">Encheres ouvertes :</h1>
</header>
<?php
foreach ($encheres as $enchere):
    ?>
    <?php 
        ?>
        <p><?= $this->nettoyer($enchere['date']) ?>, <?= $this->nettoyer($enchere['auteur']) ?><br/>
            <strong><?= $this->nettoyer($enchere['nom_enchere']) ?></strong><br/>
            <?= $this->nettoyer($enchere['texte']) ?><br />
            <!-- Vers Adminproduits si utilisateur en session -->
            <a href="<?= ($utilisateur != '') ? 'Admin' : '' ?>Produits/lire/<?= $this->nettoyer($enchere['produit_id']) ?>" >
                [écrit pour l'produit <i><?= $this->nettoyer($enchere['titreProduit']) ?></i>]</a>
        </p>
<?php endforeach; ?>