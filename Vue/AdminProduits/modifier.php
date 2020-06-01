<?php $this->titre = "Le Blogue du prof - " . $this->nettoyer($produit['titre']); ?>

<header>
    <h1 id="titreReponses">Modifier un produit de l'utilisateur 1 :</h1>
</header>
<form action="Adminproduits/miseAJour" method="post">
    <h2>Modifier un produit</h2>
    <p>
        <label for="auteur">Titre</label> : <input type="text" name="titre" id="titre" value="<?= $this->nettoyer($produit['titre']) ?>" /> <br />
        <label for="sous_titre">Sous-titre</label> :  <input type="text" name="sous_titre" id="sous_titre" value="<?= $this->nettoyer($produit['sous_titre']) ?>" /><br />
        <label for="texte">Texte de l'produit</label> :  <textarea name="texte" id="texte" ><?= $this->nettoyer($produit['texte']) ?></textarea><br />
        <label for="type">Sujet</label> : <input type="text" name="type" id="auto" value="<?= $this->nettoyer($produit['type']) ?>" /> <br />
        <input type="hidden" name="utilisateur_id" value="<?= $idUtilisateur ?>" /><br />
        <input type="hidden" name="id" value="<?= $this->nettoyer($produit['id']) ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>


