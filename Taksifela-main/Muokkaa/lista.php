<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style css/lista.css" />
</head>

<body>
<h1>Tällä hetkellä hinnastossa näkyvät tiedot:</h1>
</body>

</html>

<?php

// yhdistetään tietokantayhteys
include "../Kirjautuminen/connect.php";

// tehdääm SQL komento muuttujaan
// valikoi kaikki
$sql = "SELECT * FROM hinnasto";
$result = $conn->query($sql); // tietokanta-ajo tällä SQL
// komennolla

// Tarkistetaan löytyykö result
// Tietokanta-ajolla yhtään tulosta 

// tehdään if-lausekkeella

// jos löytyy enemmän kui 0
if ($result->num_rows >0) {
    while($row = $result->fetch_assoc()) {
       
    echo "<table>";
                echo "<tr>" . "<th>" . $row['taksa'] . "</th>" . "</tr>";
                echo "<tr>" . "<th>" . $row['alv'] . "</th>" . "</tr>";
                echo "<tr>" . "<th>" . $row['esimerkkimatka'] . "</th>" . "</tr>";
                echo "<tr>" . "<th>" . $row['aloitusmaksu'] . "</th>" . "</tr>";
                echo "<tr>" . "<th>" . $row['aloitusmaksumuina'] . "</th>" . "</tr>";
                echo "<tr>" . "<th>" . $row['matka'] . "</th>" . "</tr>";
                echo "<tr>" . "<th>" . $row['aika'] . "</th>" . "</tr>";
                echo "<tr>" . "<th>" . $row['lisamaksu'] . "</th>" . "</tr>";
                echo "<th><form action='../Muokkaa/muokkaahinnasto.php' method='post'>";
                echo "<input type='hidden' name='id' value=";
                echo $row['id'];
                echo ">";
                echo "<input type='submit' value='Muokkaa'></form></th>";
            echo"</table>";
    }
} else{
    echo "Yhtään hinnaston tietoja ei löytynyt";
}
$conn->close();

?>