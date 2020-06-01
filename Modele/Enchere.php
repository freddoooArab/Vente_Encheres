<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Enchere extends Modele {

    // Renvoie la liste des encheres associés à un produit
    public function getEncheres($idProduit = NULL) {
        if ($idProduit == NULL) {
            $sql = 'SELECT c.id,'
                    . ' c.date,'
                    . ' c.auteur,'
                    . ' c.nom_enchere,'
                    . ' c.texte,'
                    . ' c.produit_id,'
                    . ' c.efface,'
                    . ' a.nom as titreProduit'
                    . ' FROM encheres c'
                    . ' INNER JOIN produits a'
                    . ' ON c.produit_id = a.id'
                    . ' ORDER BY id desc';;
        } else {
            $sql = 'SELECT * from encheres'
                    . ' WHERE produit_id = ?'
                    . ' ORDER BY id desc';;
        }
        $encheres = $this->executerRequete($sql, [$idProduit]);
        return $encheres;
    }

    // Renvoie la liste des encheres publics associés à un produit
    public function getEncheresPublics($idProduit = NULL) {
        if ($idProduit == NULL) {
            $sql = 'SELECT e.id,'
                    . ' e.date,'
                    . ' e.auteur,'
                    . ' e.nom_enchere,'
                    . ' e.texte,'
                    . ' e.produit_id,'
                    . ' e.efface,'
                    . ' a.nom as nomProduit'
                    . ' FROM encheres e'
                    . ' INNER JOIN produits a'
                    . ' ON e.produit_id = a.id'
                    . ' WHERE e.efface = 0'
                    . ' ORDER BY id desc';
        } else {
            $sql = 'SELECT * FROM encheres'
                    . ' WHERE produit_id = ? AND efface = 0'
                    . ' ORDER BY id desc';;
        }
        $encheres = $this->executerRequete($sql, [$idProduit]);
        return $encheres;
    }

// Renvoie un enchere spécifique
    public function getEnchere($id) {
        $sql = 'SELECT * FROM encheres'
                . ' WHERE id = ?';
        $enchere = $this->executerRequete($sql, [$id]);
        if ($enchere->rowCount() == 1) {
            return $enchere->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun enchere ne correspond à l'identifiant '$id'");
        }
    }

// Supprime un enchere
    public function deleteEnchere($id) {
        $sql = 'UPDATE encheres'
                . ' SET efface = 1'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

    // Réactive un enchere
    public function restoreEnchere($id) {
        $sql = 'UPDATE encheres'
                . ' SET efface = 0'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

// Ajoute un enchere associés à un produit
    public function setEnchere($enchere) {
        $sql = 'INSERT INTO encheres ('
                . 'produit_id,'
                . ' date,'
                . ' auteur,'
                . ' titre,'
                . ' texte,'
                . ' VALUES(?, NOW(), ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [
            $enchere['produit_id'],
            $enchere['auteur'],
            $enchere['titre'],
            $enchere['texte']
                ]
        );
        return $result;
    }

}
