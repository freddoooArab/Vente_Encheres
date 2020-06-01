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
    <?php if ($enchere['efface'] == '0') : ?>
        <?= $this->nettoyer($enchere['prive']) ? '<p class="prive">' : '<p>'; ?>
        <a href="AdminEncheres/confirmer/<?= $this->nettoyer($enchere['id']) ?>" >
            [Effacer]</a>
        <?= $this->nettoyer($enchere['date']) ?>, <?= $this->nettoyer($enchere['auteur']) ?> dit : <?= $this->nettoyer($enchere['prive']) ? '(EN PRIVÉ)' : '' ?><br/>
        <strong><?= $this->nettoyer($enchere['titre']) ?></strong><br/>
        <?= $this->nettoyer($enchere['texte']) ?>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminEncheres/retablir/<?= $this->nettoyer($enchere['id']) ?>" >
                [Rétablir]</a>
            Enchere du <?= $this->nettoyer($enchere['date']) ?>, par <?= $this->nettoyer($enchere['auteur']) ?> <?= $this->nettoyer($enchere['prive']) ? '(EN PRIVÉ)' : '' ?> effacé!
        </p>
    <?php endif; ?>
<?php endforeach; ?>



