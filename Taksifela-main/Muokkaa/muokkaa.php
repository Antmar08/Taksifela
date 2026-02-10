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

$taksa =                    $_POST['taksa'];
$alv =                      $_POST['alv'];
$esimerkkimatka =           $_POST['esimerkkimatka'];
$aloitusmaksu =             $_POST['aloitusmaksu'];
$aloitusmaksumuina =        $_POST['aloitusmaksumuina'];
$matka =                    $_POST['matka'];
$aika =                     $_POST['aika'];
$id =                       $_POST['id'];

$sql = "UPDATE taksifela SET taksa='$taksa', alv='$alv', esimerkkimatka='$esimerkkimatka', aloitusmaksu='$aloitusmaksu', aloitusmaksumuina='$aloitusmaksumuina', matka='$matka', aika='$aika' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Hinnaston tiedot muokattu onnistuneesti, <a href='hinnasto.php'>Palaa takaisin</a>";

} else {
    echo "Virhe: " . $conn->error;
}
?>