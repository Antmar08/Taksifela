<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style css/muokkaa.css" />
</head>

<body>

</body>

</html>

<?php

include "../Kirjautuminen/connect.php";

$taksa =                    $_POST['taksa'];
$alv =                      $_POST['alv'];
$esimerkkimatka =           $_POST['esimerkkimatka'];
$aloitusmaksu =             $_POST['aloitusmaksu'];
$aloitusmaksumuina =        $_POST['aloitusmaksumuina'];
$matka =                    $_POST['matka'];
$aika =                     $_POST['aika'];
$lisamaksu =                $_POST['lisamaksu'];
$id =                       $_POST['id'];

$sql = "UPDATE hinnasto SET taksa='$taksa', alv='$alv', esimerkkimatka='$esimerkkimatka', aloitusmaksu='$aloitusmaksu', aloitusmaksumuina='$aloitusmaksumuina', matka='$matka', aika='$aika', lisamaksu='$lisamaksu' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Hinnaston tiedot muokattu onnistuneesti, <a href='../suomi/hinnasto.php'>Palaa takaisin</a>";

} else {
    echo "Virhe: " . $conn->error;
}
?>