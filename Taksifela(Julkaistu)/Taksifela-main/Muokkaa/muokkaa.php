<!-- Tämä ottaa ctrl napin toiminnon pois käytöstä eli vaikeampi esim saada nettisivun koodia ja ei voi tallentaa sivua suoraan filenä -->
<script>
 document.addEventListener("keydown", function (event){

  if (event.ctrlKey){

     event.preventDefault();

  }

  if(event.keyCode == 123){

     event.preventDefault();

  }

})
</script>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
$aika =                     $_POST['aika'];
$matkatavarat =             $_POST['matkatavarat'];
$kulkuvalineet =            $_POST['kulkuvalineet'];
$matkustaja =               $_POST['matkustaja'];
$matkustajia =              $_POST['matkustajia'];
$id =                       $_POST['id'];

$sql = "UPDATE hinnasto SET taksa='$taksa', alv='$alv', esimerkkimatka='$esimerkkimatka', aloitusmaksu='$aloitusmaksu', aloitusmaksumuina='$aloitusmaksumuina', aika='$aika', matkatavarat='$matkatavarat', kulkuvalineet='$kulkuvalineet', matkustaja='$matkustaja', matkustajia='$matkustajia' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Hinnaston tiedot muokattu onnistuneesti<br> <a href='../hinnasto.php'>Palaa takaisin</a>";

} else {
    echo "Virhe: " . $conn->error;
}
?>