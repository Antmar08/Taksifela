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

$yritys =                    $_POST['yritys'];
$katu =                      $_POST['katu'];
$rakennus =                  $_POST['rakennuksennumero'];
$pnumero =                   $_POST['puhelinnumero'];
$sposti =                    $_POST['sahkoposti'];
$id =                        $_POST['id'];

$sql = "UPDATE harjottelupaikat SET yritys='$yritys', katu='$katu', rakennuksennumero='$rakennus', puhelinnumero='$pnumero', sahkoposti='$sposti' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Yrityksen tiedot muokattu onnistuneesti, <a href='paikat.php'>Palaa takaisin</a>";

} else {
    echo "Virhe: " . $conn->error;
}
?>