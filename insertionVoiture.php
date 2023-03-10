<?php
require_once './Connexion/connexion.php';

if(isset($_POST['btnAjouter'])){
    $identifiant = htmlspecialchars($_POST['identifiant']);
    $marque = htmlspecialchars($_POST['marque']);
    $modele = htmlspecialchars($_POST['modele']);
    $carburant = ($_POST['carburant']);

    $query = 'INSERT INTO modeles (id_modele, marque, modele, carburant) VALUES (:identifiant, :marque, :modele, :carburant)';
    $prep = $pdo->prepare($query);
    $prep ->bindValue(':identifiant', $identifiant);
    $prep ->bindValue(':marque', $marque);
    $prep ->bindValue(':modele', $modele);
    $prep ->bindValue(':carburant', $carburant);
    $prep ->execute();

    echo 'Voici le paramètre l\'IDENTIFIANT reçu: '.$identifiant .'<br>';
    echo 'Voici le paramètre MARQUE reçu: '.$marque.'<br>' ;
    echo 'Voici le paramètre MODELE reçu : '.$modele.'<br>';

    $valeurRecues = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    var_dump($identifiant);
    var_dump($marque);
    var_dump($modele);
    var_dump($carburant);
}
$carburant = ['essence', 'diesel', 'e85', 'electrique'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<fieldset>
    <legend>Ajouter un nouveau modèle</legend>
    
<form action="insertionVoiture.php" method="post">
    
    <label>Identifiant : </label>
    <input type="text"  id="identifiant" name="identifiant"><br>

    <label>Marque : </label>
    <input type="text"  id="idMarque" name="marque">
    <br>

    <label>Modèle : </label>
    <input type="text"  id="modele" name="modele"><br><br>
    
<div>
    <input type="radio" id="essence" name="carburant" value="essence" checked>
    <label for="essence">Essence</label>
    </div>

    <div>
        <input type="radio" id="diesel" name="carburant" value="diesel">
        <label for="diesel">Diesel</label>
    </div>

    <div>
        <input type="radio" id="e85" name="carburant" value="e85">
        <label for="e85">E85</label>
    </div>

    <div>
        <input type="radio" id="electrique" name="carburant" value="electrique">
        <label for="electrique">Electrique</label>
    </div>
    
    </select>
    <input type="submit" value="Ajouter" name="btnAjouter">
</form>
    </fieldset>
</body>
</html>
