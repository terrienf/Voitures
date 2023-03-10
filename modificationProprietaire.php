<?php
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
    <legend>Modification de vos informations</legend>

    <form action="" method="post">

        <label>Nom de famille : </label>
        <input type="text"  id="nom" name="nom"><br>

        <label>Prénom : </label>
        <input type="text"  id="idPrenom" name="prenom">
        <br>
        <label>Adresse : </label>
        <input type="text"  id="idadresse" name="adresse">
        <br>
        <label>Code postale : </label>
        <input type="text"  id="idCP" name="CP">
        <br>
        <label>Ville : </label>
        <input type="text"  id="idVille" name="ville">
        <br>

        <input type="submit" value="Enregistrer" name="btnEnregistrer">
    </form>
</fieldset>

</body>
</html>
