<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="juttu.css" />
</head>

<body>

</body>

</html>

<?php

include "connect.php";

$nimi =                     $_POST['nimi'];
$tyo =                      $_POST['paikka'];
$ohjaaja =                  $_POST['ohjaaja'];
$ohjaajayhteystiedot =      $_POST['yhteystiedot'];
$alkaa =                    $_POST['aloitus'];
$loppuu =                   $_POST['lopetus'];
$status =                   $_POST['status'];
$ruokaraha =                $_POST['ruokaraha'];
$muutatietoa =              $_POST['muuta'];
$id =                       $_POST['id'];

$sql = "UPDATE oppilaat SET nimi='$nimi', paikka='$tyo', ohjaaja='$ohjaaja', yhteystiedot='$ohjaajayhteystiedot', aloitus='$alkaa', lopetus='$loppuu', status='$status', ruokaraha='$ruokaraha', muuta='$muutatietoa' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Oppilaan tiedot muokattu onnistuneesti, <a href='paikat.php'>Palaa takaisin</a>";

} else {
    echo "Virhe: " . $conn->error; 
}




?>