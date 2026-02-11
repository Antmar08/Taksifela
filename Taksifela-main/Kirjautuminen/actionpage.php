<!DOCTYPE html>
<html lang="fi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.2">
  <title>Kirjautuminen epäonnistui</title>
  <h1>Kirjautuminen epäonnistui</h1>
  <li><a href="../suomi/kirjaudu.php" class="button">Palaa takaisin kirjautumissivulle</a></li>
  <link rel="stylesheet" href="style.css" />
</head>

<?php

include "connect.php";

// jos käyttäjä on tullut kirjaudu.php lomakkeen kautta
if (isset($_POST['kayttajanimi'])) {

    // estää SQL-hyökkäykset
    $kayttajanimi = mysqli_real_escape_string($conn,$_POST['kayttajanimi']);
    $salasana = mysqli_real_escape_string($conn,$_POST['salasana']);

if ($kayttajanimi == NULL OR $salasana == NULL) {
    header("location:../suomi/kirjaudu.php");
} else {
    $sql = "SELECT * FROM users WHERE username ='".$kayttajanimi."' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $hashedPwd = $row['password'];
    if(password_verify($salasana, $hashedPwd)){
        mysqli_query($conn, $sql);
        $_SESSION["kayttajanimi"] = $kayttajanimi;
        header ("location:../suomi/etusivu.php");
        echo "Kirjautuminen onnistui";
    } else {
        echo "Kirjautuminen epäonnistui";
        exit();
    }
}
}


?>