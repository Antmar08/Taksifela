<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style css/hinnasto.css" />
</head>

<body>

</body>

</html>

<?php

include "connect.php";

$id = $_POST['id'];

$sql = "SELECT * FROM taksifela WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        $taksa =                    $row['taksa'];
        $alv =                      $row['alv'];
        $esimerkkimatka =           $row['esimerkkimatka'];
        $aloitusmaksu =             $row['aloitusmaksu'];
        $aloitusmaksumuina =        $row['aloitusmaksumuina'];
        $matka =                    $row['matka'];
        $aika =                     $row['aika'];
        $id =                       $row['id'];
        
        echo "<form action='muokkaa.php' method='POST'>";
        echo "<input type='hidden' name='id' value="; echo $id; echo " required>";
        echo "Taksat alkaen: <input type='text' name='taksa' value='"; echo $taksa; echo "' required>";
        echo "Alv: <input type='text' name='alv' value='"; echo $alv; echo "' required>";
        echo "Esimerkkimatka: <input type='text' name='esimerkkimatka' value='"; echo $esimerkkimatka; echo "' required>";
        echo "Aloitusmaksu: <input type='text' name='aloitusmaksu' value='"; echo $aloitusmaksu; echo "' required>";
        echo "Aloitusmaksu muina aikoina: <input type='text' name='aloitusmaksumuina' value='"; echo $aloitusmaksumuina; echo "' required>";
        echo "Matkataksa: <input type='text' name='matka' value='"; echo $matka; echo "' required>";
        echo "Aikataksa: <input type='text' name='aika' value='"; echo $aika; echo "' required>";
        echo '<input type="submit" value="Muokkaa tietoja">';
    }
}

?>