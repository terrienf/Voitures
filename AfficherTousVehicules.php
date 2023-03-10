<?php

require_once './AfficherUnVehicule.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h1>Voitures</h1>
<table>
    <thead>
    <tr>
        <th colspan="4">Mes bagnoles</th>
    </tr>
    </thead>
    <tr>
    <tr>
        <th>Identifiant</th>
        <th>Marque</th>
        <th>Modèle</th>
        <th>Carburant</th>
    </tr>


    <?php foreach ($arr as $voiture) { ?>
    <tr>
    <td><?= $voiture['id_modele'];?></td>
    <td><?= $voiture['marque'];?></td>   
    <td><?= $voiture['modele'];?></td>
    <td><?= $voiture['carburant'];?></td>
    </tr><?php } ?>
    </tbody>
</table>

</body>
</html>
