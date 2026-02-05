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

$sql = "SELECT * FROM harjottelupaikat WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
       
        $yritys =                    $row['yritys'];
        $katu =                      $row['katu'];
        $rakennus =                  $row['rakennuksennumero'];
        $pnumero =                   $row['puhelinnumero'];
        $sposti =                    $row['sahkoposti'];
        $id =                        $row['id'];
        
        echo "<form action='muokkaa1.php' method='POST'>";
        echo "<input type='hidden' name='id' value="; echo $id; echo " required>";
        echo "yritys: <input type='text' name='yritys' value='"; echo $yritys; echo "' required>";
        echo "katu: <input type='text' name='katu' value='"; echo $katu; echo "' required>";
        echo "rakennus: <input type='text' name='rakennuksennumero' value='"; echo $rakennus; echo "' required>";
        echo "puhelinnumero: <input type='text' name='puhelinnumero' value='"; echo $pnumero; echo "' required>";
        echo "sähköposti: <input type='text' name='sahkoposti' value='"; echo $sposti; echo "' required>";
        echo '<input type="submit" value="Muokkaa tietoja">';
    }
}

?>