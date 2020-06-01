<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleProduit') {
        require 'Tests/Modeles/testProduit.php';
    } else if ($_GET['test'] == 'modeleEnchere') {
        require 'Tests/Modeles/testEnchere.php';
    } else if ($_GET['test'] == 'vueProduits') {
        require 'Tests/Vues/testVueProduits.php';
    } else if ($_GET['test'] == 'vueConfirmer') {
        require 'Tests/Vues/testVueConfirmer.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleProduit">Produit</a>
    </li>
    <li>
        <a href="tests.php?test=modeleEnchere">Enchere</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueProduits">Produits</a>
    </li>
    <li>
        <a href="tests.php?test=vueConfirmer">Confirmer</a>
    </li>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
</ul>
