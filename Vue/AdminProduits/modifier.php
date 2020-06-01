<?php $this->titre = "Vente aux Enchères - " . $this->nettoyer($produit['nom']); ?>

<header>
    <h1 id="titreReponses">Modifier un produit de l'utilisateur 1 :</h1>
</header>
<form action="Adminproduits/miseAJour" method="post">
    <h2>Modifier un produit</h2>
    <p>
        <label for="nom">Nom</label> : <input type="text" name="nom" id="nom" value="<?= $this->nettoyer($produit['nom']) ?>" /> <br />
        <label for="descripton">Description</label> :  <input type="text" name="descripton" id="descripton" value="<?= $this->nettoyer($produit['descripton']) ?>" /><br />
        <label for="prix">Prix</label> :  <input type="number" name="prix" id="texte" > value="<?= $this->nettoyer($produit['prix']) ?>" /> <br />
        <label for="date">Date</label> : <input type="date" name="date" id="auto" value="<?= $this->nettoyer($produit['date']) ?>" /> <br />
        <input type="hidden" name="utilisateur_id" value="<?= $idUtilisateur ?>" /><br />
        <input type="hidden" name="id" value="<?= $this->nettoyer($produit['id']) ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>


