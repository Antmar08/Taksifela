<!DOCTYPE html>
<html lang="fi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.2">
  <title>Kirjautuminen epäonnistui</title>
  <h1>Kirjautuminen epäonnistui</h1>
  <h1>Yritä uudelleen</h1>
  <li><a href="paikat.php" class="button">Palaa takaisin kirjautumissivulle</a></li>
  <link rel="stylesheet" href="juttu.css" />
</head>

<?php

include "connect.php";


// tämä if lauseke ajetaan vain jos käyttäjä tulee lisaauusiopiskelija.php sivun kautta
if (isset($_POST['nimi'])) {
// otetaan lomakkeen tiedot vastaan muuttujiin
$nimi =                     $_POST['nimi'];
$tyo =                      $_POST['tyo'];
$ohjaaja =                  $_POST['ohjaaja'];
$ohjaajayhteystiedot =      $_POST['ohjaajayhteystiedot'];
$alkaa =                    $_POST['alkaa'];
$loppuu =                   $_POST['loppuu'];
$status =                   $_POST['status'];
$ruokaraha =                $_POST['ruokaraha'];
$muutatietoa =              $_POST['muutatietoa'];


$sql = "INSERT INTO oppilaat (nimi, paikka, ohjaaja, yhteystiedot, aloitus, lopetus, status, ruokaraha, muuta) VALUES
('$nimi', '$tyo', '$ohjaaja', '$ohjaajayhteystiedot', '$alkaa', '$loppuu', '$status', '$ruokaraha', '$muutatietoa')";


if ($conn->query($sql) === TRUE) {
    echo "Uusi oppilas lisätty järjestelmään";
    echo '<script>';
    echo 'location.replace("paikat.php")';
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

// jos käyttäjä on tullut kirjautumissivu.php lomakkeen kautta
if (isset($_POST['kayttajanimi'])) {

    // estää SQL-hyökkäykset
    $kayttajanimi = mysqli_real_escape_string($conn,$_POST['kayttajanimi']);
    $salasana = mysqli_real_escape_string($conn,$_POST['salasana']);

if ($kayttajanimi == NULL OR $salasana == NULL) {
    header("location:kirjautumissivu.php");
} else {
    $sql = "SELECT * FROM users WHERE username ='".$kayttajanimi."' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $hashedPwd = $row['password'];
    if(password_verify($salasana, $hashedPwd)){
        mysqli_query($conn, $sql);
        $_SESSION["kayttajanimi"] = $kayttajanimi;
        header ("location:paikat.php");
        echo "Kirjautuminen onnistui";
    } else {
        echo "Kirjautuminen epäonnistui";
        exit();
    }
}
}

if (isset($_POST['yritys'])) {

$yritys =                        $_POST['yritys'];
$katu =                          $_POST['katu'];
$numero =                        $_POST['numero'];
$pnumero =                       $_POST['pnumero'];
$sposti =                        $_POST['sposti'];

$sql = "INSERT INTO harjottelupaikat (yritys, katu, rakennuksennumero, puhelinnumero, sahkoposti) VALUES
('$yritys', '$katu', '$numero', '$pnumero', '$sposti')";

if ($conn->query($sql) === TRUE) {
    echo "Uusi yritys lisätty järjestelmään";
   echo '<script>';
    echo 'location.replace("lista.php")';
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


?>