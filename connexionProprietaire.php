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
    <legend>Accédez à vos informations</legend>

    <form action="modificationProprietaire.php" method="post">

        <label>Numéro d'identification : </label>
        <input type="text"  name="identifiant"><br>

        <label>Nom de famille : </label>
        <input type="text"   name="nom">
        <br>

        <input type="submit" value="Connexion" name="connexion">
    </form>
</fieldset>

</body>
</html>
