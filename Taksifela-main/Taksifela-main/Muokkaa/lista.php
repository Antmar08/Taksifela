<?php

// yhdistetään connect.php
// include sisällyttää toisen tiedoston
// tähän tiedostoon


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
       
    echo "<tr>";
                echo "<td>" . $row['taksa'] . "</td>";
                echo "<td>" . $row['alv'] . "</td>";
                echo "<td>" . $row['esimerkkimatka'] . "</td>";
                echo "<td>" . $row['aloitusmaksu'] . "</td>";
                echo "<td>" . $row['aloitusmaksumuina'] . "</td>";
                echo "<td>" . $row['matka'] . "</td>";
                echo "<td>" . $row['aika'] . "</td>";
                echo "<td><form action='../Muokkaa/muokkaahinnasto.php' method='post'>";
                echo "<input type='hidden' name='id' value=";
                echo $row['id'];
                echo ">";
                echo "<input type='submit' value='Muokkaa'></form></td>";
            echo"</tr>";
    }
} else{
    echo "Yhtään hinnaston tietoja ei löytynyt";
}
$conn->close();

?>