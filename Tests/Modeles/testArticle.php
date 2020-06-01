<?php

require_once 'Modele/Produit.php';

$tstProduit = new Produit;
$produits = $tstProduit->getProduits();
echo '<h3>Test getProduits : </h3>';
var_dump($produits->rowCount());

echo '<h3>Test getProduit : </h3>';
$produit =  $tstProduit->getProduit(1);
var_dump($produit);