<?php $this->titre = "Vente aux Enchères - " . $this->nettoyer($produit['nom']); ?>

<produit>
    <header>
        <h1 class="titreProduit"><?= $this->nettoyer($produit['nom']) ?></h1>
        <time><?= $this->nettoyer($produit['date']) ?></time>, par <?= $this->nettoyer($produit['Username']) ?>
        <h3 class=""><?= $this->nettoyer($produit['description']) ?></h3>
    </header>
    <p><?= $this->nettoyer($produit['prix']) ?>$</p>
    <p><?= $this->nettoyer($produit['type']) ?></p>
</produit>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $this->nettoyer($produit['nom']) ?> :</h1>
</header>
<?= ($encheres->rowCount() == 0) ? '<p class="message">Pas encore d`enchères pour ce produit.</p>' : '' ?>
<?php
foreach ($encheres as $enchere):
    ?>
    <?php if ($enchere['efface'] == '0') : ?>
        <a href="AdminEncheres/confirmer/<?= $this->nettoyer($enchere['id']) ?>" >
            [Effacer]</a>
        <?= $this->nettoyer($enchere['date']) ?>, <?= $this->nettoyer($enchere['auteur']) ?><br/>
        <strong><?= $this->nettoyer($enchere['nom_enchere']) ?></strong><br/>
        <?= $this->nettoyer($enchere['texte']) ?>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminEncheres/retablir/<?= $this->nettoyer($enchere['id']) ?>" >
                [Rétablir]</a>
            Enchere du <?= $this->nettoyer($enchere['date']) ?>, par <?= $this->nettoyer($enchere['auteur']) ?> effacé!
        </p>
    <?php endif; ?>
<?php endforeach; ?>



