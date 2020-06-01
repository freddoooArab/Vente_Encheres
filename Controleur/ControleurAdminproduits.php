<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Produit.php';
require_once 'Modele/Enchere.php';

class ControleurAdminProduits extends ControleurAdmin {

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
        $encheres = $this->enchere->getEncheres($idProduit);
        $this->genererVue(['produit' => $produit, 'encheres' => $encheres, 'erreur' => $erreur]);
    }

    public function ajouter() {
        $vue = new Vue("Ajouter");
        $this->genererVue();
    }

// Enregistre le nouvel produit et retourne à la liste des produits
    public function nouvelProduit() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Ajouter un produit n'est pas permis en démonstration");
        } else {
            $produit['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $produit['nom'] = $this->requete->getParametre('nom');
            $produit['description'] = $this->requete->getParametre('description');
            $produit['prix'] = $this->requete->getParametre('prix');
            $produit['date'] = $this->requete->getParametre('date');
            $produit['type'] = $this->requete->getParametre('type');
            $this->produit->setProduit($produit);
            $this->executerAction('index');
        }
    }

// Modifier un produit existant    
    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $produit = $this->produit->getProduit($id);
        $this->genererVue(['produit' => $produit]);
    }

// Enregistre l'produit modifié et retourne à la liste des produits
    public function miseAJour() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Modifier un produit n'est pas permis en démonstration");
        } else {
            $produit['id'] = $this->requete->getParametreId('id');
            $produit['nom'] = $this->requete->getParametre('nom');
            $produit['description'] = $this->requete->getParametre('description');
            $produit['prix'] = $this->requete->getParametre('prix');
            $produit['date'] = $this->requete->getParametre('date');
            $produit['type'] = $this->requete->getParametre('type');
            $produit['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $this->produit->updateProduit($produit);
            $this->executerAction('index');
        }
    }

}
