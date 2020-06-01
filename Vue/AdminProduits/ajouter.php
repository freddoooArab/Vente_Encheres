<?php $this->titre = "Vente aux Enchères - ajouter un produit"; ?>

<header>
    <h1 id="titreReponses">Ajouter un produit au nom de <u><?= $utilisateur ?></u> :</h1>
</header>
<form action="Adminproduits/nouvelProduit" method="post">
    <h2>Ajouter un produit</h2>
    <p>
        <label for="nom">Nom</label> : <input type="text" name="nom" id="nom" /> <br />
        <label for="description">Description</label> :  <input type="text" name="description" id="description" /><br />
        <label for="prix">prix</label> :  <input type="text" name="prix" id="prix"/><br />
        <label for="date">date</label> :  <input type="date" name="date" id="date"/><br />
        <label for="type">Type</label> : <input type="text" name="type" id="auto" /> <br />
        <input type="hidden" name="utilisateur_id" value="<?= $idUtilisateur ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>


