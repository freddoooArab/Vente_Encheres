<?php

require_once 'Framework/Vue.php';
$enchere = [
        'id' => '999',
        'produit_id' => '111',
        'date' => '2017-12-31',
        'auteur' => 'auteur Test',
        'prive' => '1',
        'titre' => 'titre Test',
        'texte' => 'texte Test',
    ];
$vue = new Vue('Confirmer', 'AdminEncheres');
$vue->generer(['enchere' => $enchere], null);

