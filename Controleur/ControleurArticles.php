<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Produit.php';
require_once 'Modele/Enchere.php';

class ControleurProduits extends Controleur {

    private $produit;
    private $enchere;

    public function __construct() {
        $this->produit = new Produit();
        $this->enchere = new Enchere();
    }

// Affiche la liste de tous les produits du blog
    public function index() {
        $produits = $this->produit->getProduits();
        $this->genererVue(['produits' => $produits]);
    }

// Affiche les détails sur un produit
    public function lire() {
        $idProduit = $this->requete->getParametreId("id");
        $produit = $this->produit->getProduit($idProduit);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $encheres = $this->enchere->getEncheresPublics($idProduit);
        $this->genererVue(['produit' => $produit, 'encheres' => $encheres, 'erreur' => $erreur]);
    }

}
