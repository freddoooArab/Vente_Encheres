<?php $this->titre = 'Le Blogue du prof'; ?>

<a href="Adminproduits/ajouter">
    <h2 class="titreProduit">Ajouter un produit</h2>
</a>
<?php foreach ($produits as $produit):
    ?>

    <produit>
        <header>
            <a href="Adminproduits/lire/<?= $this->nettoyer($produit['id']) ?>">
                <h1 class="titreProduit"><?= $this->nettoyer($produit['nom']) ?></h1>
            </a>
            <strong class=""><?= $this->nettoyer($produit['description']) ?></strong><br>
            par <?= $this->nettoyer($produit['nom']) ?><br>
            <time><?= $this->nettoyer($produit['date']) ?></time><br>
            <a href="Adminproduits/modifier/<?= $this->nettoyer($produit['id']) ?>"> [modifier le produit]</a>
        </header>
    </produit>
    <hr />
<?php endforeach; ?>    
