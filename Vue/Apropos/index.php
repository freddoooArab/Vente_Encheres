<?php $titre = 'Vente Encheres'; ?>

<ul>
    <li>Frédéric Arab</li>

    <li>420-4A4 MO Web et Bases de données</li>
    <li>Hiver 2020, Collège Montmorency</li>
</ul>
<h3>Vente Auto</h3>
<ul>
    <li>L'application "Vente_Encheres" permet de gérer un système de vente aux enchères de produits divers.</li>
    <li>La page d'Accueil présente la liste des produits proposées avec leurs informations.</li>
    <li>L'utilisateur régulier peut seulement consulté les produits et faire leurs offres.</li>
    <li>L'utilisateur en session peut ajouter, modifier et supprimer des produits et des offres dans le système.</li>
    
        <li>
            <form action="<?= $utilisateur != '' ? 'Admin' : ''; ?>autos" method="post">
                <input type="submit" value="Changer de controleur d'accueil">
            </form>
        </li>
    </ul>
 <br>

<table>
    <tr>
        <td>
            <h4>Base de données utilisée par l'application :</h4>
                <img src="Contenu/images/MA_BD_Vente_Encheres.png"  height="400" width="500" alt=""/>
            <br/>
        </td>
    </tr>
    <tr>
        <td>
            <h4>Basé sur ce modèle original :</h4>
                <img src="Contenu/images/BD_initiale.png"  height="400" width="500" alt=""/>
            <br/>
        </td>
    </tr>
</table>