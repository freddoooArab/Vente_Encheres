<?php $this->titre = "Vente aux Encheres" ?>

<header>
    <h1 id="titreReponses">Encheres :</h1>
</header>
<?php
foreach ($encheres as $enchere):
    ?>
    <?php if ($enchere['efface'] == '0') : ?>
        <p><a href="AdminEncheres/confirmer/<?= $this->nettoyer($enchere['id']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($enchere['date']) ?>, <?= $this->nettoyer($enchere['auteur']) ?><br/>
            <strong><?= $this->nettoyer($enchere['nom_enchere']) ?></strong><br/>
            <?= $this->nettoyer($enchere['texte']) ?><br />
            <a href="Adminproduits/lire/<?= $this->nettoyer($enchere['produit_id']) ?>" >
                [écrit pour l'produit <i><?= $this->nettoyer($enchere['titreProduit']) ?></i>]</a></a>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminEncheres/retablir/<?= $this->nettoyer($enchere['id']) ?>" >
                [Rétablir]</a>
            Enchere du <?= $this->nettoyer($enchere['date']) ?>, par <?= $this->nettoyer($enchere['auteur']) ?> EFFACÉ!
        </p>
    <?php endif; ?>
<?php endforeach; ?>