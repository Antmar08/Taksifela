<?php
session_start();
$servername = "localhost"; // aina localhost
$username = "root";
$password = "root";         // tyhjä koska xampp
$database = "taksifela";  // tietokannan nimi

//luodaan tietokanta yhteys

$conn = new mysqli($servername, $username, $password, $database );
$conn->set_charset("utf8mb4");    // suomalaiset merkistöt toimimaan

// tarkistetaan yhteys

// jos tulee virhe
if($conn->connect_error) {
    die("Tietokanta virhe: " . $conn->connect_error);



}
// jos toimii niin voi sanoa yhteys onnistui
//echo "Tietokanta yhteystoimii :)";



?>