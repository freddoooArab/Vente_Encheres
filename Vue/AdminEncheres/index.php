<?php $this->titre = "Le Blogue du prof - Encheres" ?>

<header>
    <h1 id="titreReponses">Encheres du Blogue du prof :</h1>
</header>
<?php
foreach ($encheres as $enchere):
    ?>
    <?php if ($enchere['efface'] == '0') : ?>
        <p><a href="AdminEncheres/confirmer/<?= $this->nettoyer($enchere['id']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($enchere['date']) ?>, <?= $this->nettoyer($enchere['auteur']) ?> dit <?= $this->nettoyer($enchere['prive']) ? '(EN PRIVÉ)' : '' ?> : <br/>
            <strong><?= $this->nettoyer($enchere['titre']) ?></strong><br/>
            <?= $this->nettoyer($enchere['texte']) ?><br />
            <a href="Adminproduits/lire/<?= $this->nettoyer($enchere['produit_id']) ?>" >
                [écrit pour l'produit <i><?= $this->nettoyer($enchere['titreProduit']) ?></i>]</a></a>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminEncheres/retablir/<?= $this->nettoyer($enchere['id']) ?>" >
                [Rétablir]</a>
            Enchere du <?= $this->nettoyer($enchere['date']) ?>, par <?= $this->nettoyer($enchere['auteur']) ?> <?= $this->nettoyer($enchere['prive']) ? '(EN PRIVÉ)' : '' ?> EFFACÉ!
        </p>
    <?php endif; ?>
<?php endforeach; ?>