<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Enchere.php';

class ControleurEncheres extends Controleur {

    private $enchere;

    public function __construct() {
        $this->enchere = new Enchere();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les encheres
    public function index() {
        $encheres = $this->enchere->getEncheresPublics();
        $this->genererVue(['encheres' => $encheres]);
    }

// Ajoute un enchere à un produit
    public function ajouter() {
        $enchere['produit_id'] = $this->requete->getParametreId("produit_id");
        $enchere['auteur'] = $this->requete->getParametre('auteur');
        $validation_courriel = filter_var($enchere['auteur'], FILTER_VALIDATE_EMAIL);
        if ($validation_courriel) {
            if ($this->requete->getSession()->getAttribut("env") == 'prod') {
                $this->requete->getSession()->setAttribut("message", "Ajouter une enchère n'est pas permis en démonstration");
            } else {
                $enchere['nom'] = $this->requete->getParametre('nom');
                $enchere['texte'] = $this->requete->getParametre('texte');
                // Ajouter le enchere à l'aide du modèle
                $this->enchere->setEnchere($enchere);
            }
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            //Recharger la page pour mettre à jour la liste des encheres associés
            $this->rediriger('Produits', 'lire/' . $enchere['produit_id']);
        } else {
            //Recharger la page avec une erreur près du courriel
            $this->requete->getSession()->setAttribut('erreur', 'courriel');
            $this->rediriger('Produits', 'lire/' . $enchere['produit_id']);
        }
    }

}
