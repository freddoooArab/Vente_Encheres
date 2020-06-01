<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux produits 
 * 
 * @author André Pilon
 */
class Produit extends Modele {

// Renvoie la liste de tous les produits, triés par identifiant décroissant avec le nom de l'utilisateus lié
    public function getProduits() {
//        $sql = 'select produits.id, titre, sous_titre, utilisateur_id, date, texte, type, nom from produits, utilisateurs'
//                . ' where produits.utilisateur_id = utilisateurs.id order by ID desc';
        $sql = 'SELECT a.id,'
                . ' a.titre,'
                . ' a.sous_titre,'
                . ' a.utilisateur_id,'
                . ' a.date,'
                . ' a.texte,'
                . ' a.type,'
                . ' u.nom,'
                . ' u.identifiant'
                . ' FROM produits a'
                . ' INNER JOIN utilisateurs u'
                . ' ON a.utilisateur_id = u.id'
                . ' ORDER BY id desc';
        $produits = $this->executerRequete($sql);
        return $produits;
    }

// Renvoie la liste de tous les produits, triés par identifiant décroissant
    public function setProduit($produit) {
        $sql = 'INSERT INTO produits ('
                . ' titre,'
                . ' sous_titre,'
                . ' utilisateur_id,'
                . ' date,'
                . ' texte,'
                . ' type)'
                . ' VALUES(?, ?, ?, NOW(), ?, ?)';
        $result = $this->executerRequete($sql, [
            $produit['titre'],
            $produit['sous_titre'],
            $produit['utilisateur_id'],
            $produit['texte'],
            $produit['type']
                ]
        );
        return $result;
    }

// Renvoie les informations sur un produit avec le nom de l'utilisateur lié
    function getProduit($idProduit) {
        $sql = 'SELECT a.id,'
                . ' a.titre,'
                . ' a.sous_titre,'
                . ' a.utilisateur_id,'
                . ' a.date,'
                . ' a.texte,'
                . ' a.type,'
                . ' u.nom'
                . ' FROM produits a'
                . ' INNER JOIN utilisateurs u'
                . ' ON a.utilisateur_id = u.id'
                . ' WHERE a.id=?';
        $produit = $this->executerRequete($sql, [$idProduit]);
        if ($produit->rowCount() == 1) {
            return $produit->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun produit ne correspond à l'identifiant '$idProduit'");
        }
    }

// Met à jour un produit
    public function updateProduit($produit) {
        $sql = 'UPDATE produits'
                . ' SET titre = ?,'
                . ' sous_titre = ?,'
                . ' utilisateur_id = ?,'
                . ' date = NOW(),'
                . ' texte = ?,'
                . ' type = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [
            $produit['titre'],
            $produit['sous_titre'],
            $produit['utilisateur_id'],
            $produit['texte'],
            $produit['type'],
            $produit['id']
                ]
        );
        return $result;
    }

}
