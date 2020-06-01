<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Enchere.php';

class ControleurAdminEncheres extends ControleurAdmin {

    private $enchere;

    public function __construct() {
        $this->enchere = new Enchere();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les encheres
    public function index() {
        $encheres = $this->enchere->getEncheres();
        $this->genererVue(['encheres' => $encheres]);
    }
  
// Confirmer la suppression d'un enchere
    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire le enchere à l'aide du modèle
        $enchere = $this->enchere->getEnchere($id);
        $this->genererVue(['enchere' => $enchere]);
    }

// Supprimer un enchere
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire le enchere afin d'obtenir le id de l'produit associé
        $enchere = $this->enchere->getEnchere($id);
        // Supprimer le enchere à l'aide du modèle
        $this->enchere->deleteEnchere($id);
        //Recharger la page pour mettre à jour la liste des encheres associés
        $this->rediriger('Adminproduits', 'lire/' . $enchere['produit_id']);
    }

    // Rétablir un enchere
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le enchere afin d'obtenir le id de l'produit associé
        $enchere = $this->enchere->getEnchere($id);
        // Supprimer le enchere à l'aide du modèle
        $this->enchere->restoreEnchere($id);
        //Recharger la page pour mettre à jour la liste des encheres associés
        $this->rediriger('Adminproduits', 'lire/' . $enchere['produit_id']);
    }

}
