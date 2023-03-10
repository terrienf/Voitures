<?php

require_once './Connexion/connexion.php';

// Préparer la requête
$query = 'SELECT * FROM modeles';
$arr = $pdo->query($query)->fetchAll();
var_dump($arr);

foreach ($arr as $voiture) {
    $test= 'Voitures : ' . $voiture['id_modele'] . ' , ' . $voiture['marque'] . ' , ' . $voiture['modele'] . ' , ' . $voiture['carburant'];
}