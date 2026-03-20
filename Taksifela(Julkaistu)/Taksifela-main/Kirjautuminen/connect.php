<?php
// Aloittaa sessionin jos sessioni ei ole vielä alkanut
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$servername = "localhost"; // 
$username = "deb02itjy_taksifela";         //  username
$password = "eccW6J7GrpKLSGy7bBhR";         //  password
$database = "deb02itjy_taksifela";  // tietokannan nimi

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