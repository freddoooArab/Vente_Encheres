<?php $this->titre = 'Le Blogue du prof'; ?>

<?php foreach ($produits as $produit):
    ?>
    <produit>
        <header>
            <a href="Produits/lire/<?= $this->nettoyer($produit['id']) ?>">
                <h1 class="titreProduit"><?= $this->nettoyer($produit['nom']) ?></h1>
            </a>
            <strong class=""><?= $this->nettoyer($produit['description']) ?></strong><br>
            par <?= $this->nettoyer($produit['Username']) ?><br>
            <time><?= $this->nettoyer($produit['date']) ?></time>
        </header>
    </produit>
    <hr />
<?php endforeach; ?>    
