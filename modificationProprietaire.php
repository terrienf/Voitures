<?php

$connexion = filter_input(INPUT_POST, 'connexion', FILTER_SANITIZE_SPECIAL_CHARS);
$enregistrer = filter_input(INPUT_POST, 'enregistrer', FILTER_SANITIZE_SPECIAL_CHARS);;

if($connexion){

    $identifiant = filter_input(INPUT_POST, 'identifiant', FILTER_SANITIZE_SPECIAL_CHARS);
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);




    if(!$identifiant || !$nom){

        header("refresh:5;url=connexionProprietaire.php");
        echo '<h1>echec de l\'identification !</h1>Vous allez être renvoyé sur la page d\'authentification...';
        exit();
    }else{
        require_once 'connexion/connexion.php';

        $query = 'SELECT id_pers, nom, prenom, adresse, codepostal, ville FROM proprietaires WHERE id_pers = :id_pers AND nom = :nom';
        $prep = $pdo->prepare($query);
        $prep->bindValue(':id_pers', $identifiant);
        $prep->bindValue(':nom', $nom);
        $prep->execute();
        $proprietaire = $prep->fetch();
        
        var_dump($proprietaire);

        if(!$proprietaire){
            header("refresh:5;url=connexionProprietaire.php");
            echo '<h1>echec de l\'identification !</h1>Vous allez être renvoyé sur la page d\'authentification...';
            die();
        }

    }

}elseif ($enregistrer){

    $filtreCP = array( 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '#^\d{5}$#') );
    $filtre = array( 'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'prenom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'adresse' => FILTER_SANITIZE_SPECIAL_CHARS,
        'codepostal' => $filtreCP,
        'ville' => FILTER_SANITIZE_SPECIAL_CHARS,
        'id_pers' => FILTER_VALIDATE_INT);

    $proprietaire = filter_input_array(INPUT_POST, $filtre);

    if(!$proprietaire['nom']){
        $erreurs['nom'] = 'Le nom est obligatoire';
    }
    if(!$proprietaire['prenom']){
        $erreurs['prenom'] = 'Le prenom est obligatoire';
    }

    if(!$proprietaire['adresse']){
        $erreurs['adresse'] = 'L\'adresse est obligatoire';
    }

    if(!$proprietaire['codepostal']){
        $erreurs['codepostal'] = 'Le code postal est sur 5 chiffres';
    }

    if(!$proprietaire['ville']){
        $erreurs['ville'] = 'La ville est obligatoire';
    }
    if(!$proprietaire['id_pers']){
        $erreurs['id_pers'] = 'L\'identifiant est obligatoire';
    }

    var_dump($proprietaire);

    if(!isset($erreurs)) {
        require_once './Connexion/connexion.php';

        try {
            $query = 'UPDATE proprietaires SET nom = :nom, prenom = :prenom, adresse = :adresse, codepostal = :codepostal, ville = :ville WHERE id_pers = :id_pers ';
            $prep = $pdo->prepare($query);
            $prep->bindValue(':nom', $proprietaire['nom']);
            $prep->bindValue(':prenom', $proprietaire['prenom']);
            $prep->bindValue(':adresse', $proprietaire['adresse']);
            $prep->bindValue(':codepostal', $proprietaire['codepostal']);
            $prep->bindValue(':ville', $proprietaire['ville']);
            $prep->bindValue(':id_pers', $proprietaire['id_pers']);
            $ok = $prep->execute();

            if ($ok) {
                $message = 'Vos informations ont été mises à jour';
            }
        } catch (PDOException $e) {
            $messageErreur = 'Désolé mais vos données n\'ont pas pu être mises à jour';
        }
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet">
    <title>Modification de vos informations</title>
</head>
<body>

<form method="post" action="">
    <fieldset>
        <legend>Modification de vos informations</legend>

        <?php if(isset($message)) :?>
            <div class="succes"><?=$message?></div>
        <?php endif;?>
        <?php if(isset($messageErreur)) :?>
            <div class="error"><?=$messageErreur?></div>
        <?php endif;?>
        <input type="hidden" name="id_pers" value="<?=$proprietaire['id_pers']?>">

        <label for="nom">Nom de famille : </label>
        <input type="text" name="nom" value="<?=$proprietaire['nom']?>">
        <?php if(isset($erreurs['nom'])) :?>
            <div class="error"><?=$erreurs['nom']?></div>
        <?php endif;?>
        <br><br>
        <label for="prenom">Prénom : </label>
        <input type="text" name="prenom" value="<?=$proprietaire['prenom']?>">
        <?php if(isset($erreurs['prenom'])) :?>
            <div class="error"><?=$erreurs['prenom']?></div>
        <?php endif;?>
        <br><br>
        <label for="adresse">Adresse : </label>
        <input type="text" name="adresse" value="<?=$proprietaire['adresse']?>">
        <?php if(isset($erreurs['adresse'])) :?>
            <div class="error"><?=$erreurs['adresse']?></div>
        <?php endif;?>
        <br><br>
        
        <label for="cp">Code Postal : </label>
        <input type="text" name="codepostal" value="<?=$proprietaire['codepostal']?>">
        <?php if(isset($erreurs['codepostal'])) :?>
            <div class="error"><?=$erreurs['codepostal']?></div>
        <?php endif;?>
        <br><br>
        
        <label for="ville">Ville : </label>
        <input type="text" name="ville" value="<?=$proprietaire['ville']?>">
        <?php if(isset($erreurs['ville'])) :?>
            <div class="error"><?=$erreurs['ville']?></div>
        <?php endif;?>
        <br><br>

        <input type="submit" name="enregistrer" value="Enregistrer"/>
    </fieldset>
</form>

</body>
</html>
