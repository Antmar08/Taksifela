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

$id = $_POST['id'];


$sql = "SELECT * FROM oppilaat WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
       
        $nimi =                     $row['nimi'];
        $tyo =                      $row['paikka'];
        $ohjaaja =                  $row['ohjaaja'];
        $ohjaajayhteystiedot =      $row['yhteystiedot'];
        $alkaa =                    $row['aloitus'];
        $loppuu =                   $row['lopetus'];
        $status =                   $row['status'];
        $ruokaraha =                $row['ruokaraha'];
        $muutatietoa =              $row['muuta'];
        $id =                       $row['id'];
        
        echo "<form action='muokkaa.php' method='POST'>";
        echo "<input type='hidden' name='id' value="; echo $id; echo " required>";
        echo "nimi: <input type='text' name='nimi' value='"; echo $nimi; echo "' required>";
        echo "paikka: <input type='text' name='paikka' value='"; echo $tyo; echo "' required>";
        echo "ohjaaja: <input type='text' name='ohjaaja' value='"; echo $ohjaaja; echo "' required>";
        echo "yhteystiedot: <input type='text' name='yhteystiedot' value='"; echo $ohjaajayhteystiedot; echo "' required>";
        echo "alkaa: <input type='date' name='aloitus' value='"; echo $alkaa; echo "' required>";
        echo "loppuu: <input type='date' name='lopetus' value='"; echo $loppuu; echo "' required>";
        echo "status: <input type='text' name='status' value='"; echo $status; echo "' required>";
        echo "ruokaraha: <input type='text' name='ruokaraha' value='"; echo $ruokaraha; echo "' ";
        echo "muutatietoa: <input type='text' name='muuta' value='"; echo $muutatietoa; echo "' required>";
        echo '<input type="submit" value="Muokkaa tietoja">';
    }
}

?>

