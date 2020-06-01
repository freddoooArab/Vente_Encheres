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
        $sql = 'SELECT a.id,'
                . ' a.nom,'
                . ' a.description,'
                . ' a.prix,'
                . ' a.date,'
                . ' a.type,'
                . ' a.utilisateur_id,'
                . ' u.nom as Username,'
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
                . ' nom,'
                . ' description,'
                . ' prix,'
                . ' date,'
                . ' type,'
                . ' utilisateur_id)'
                . ' VALUES(?, ?, ?, NOW(), ?, ?)';
        $result = $this->executerRequete($sql, [
            $produit['nom'],
            $produit['description'],
            $produit['prix'],
            $produit['date'],
            $produit['type'],
            $produit['utilisateur_id']
                ]
        );
        return $result;
    }

// Renvoie les informations sur un produit avec le nom de l'utilisateur lié
    function getProduit($idProduit) {
        $sql = 'SELECT a.id,'
                . ' a.nom,'
                . ' a.description,'
                . ' a.prix,'
                . ' a.date,'
                . ' a.type,'
                . ' a.utilisateur_id,'
                . ' u.nom as Username'
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
                . ' SET nom = ?,'
                . ' description = ?,'
                . ' prix = ?,'
                . ' date = NOW(),'
                . ' type = ?,'
                . ' utilisateur_id = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [
            $produit['nom'],
            $produit['description'],
            $produit['prix'],
            $produit['date'],
            $produit['type'],
            $produit['utilisateur_id']
                ]
        );
        return $result;
    }

}
