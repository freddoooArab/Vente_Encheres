<?php

require_once 'Modele/Enchere.php';

$tstEnchere = new Enchere;
$encheres = $tstEnchere->getEncheres(1);
echo '<h3>Test getEncheres : </h3>';
var_dump($encheres->rowCount());

$enchere = $tstEnchere->getEnchere(5);
echo '<h3>Test getEnchere : </h3>';
var_dump($enchere);