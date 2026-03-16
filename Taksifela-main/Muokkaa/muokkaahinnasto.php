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
<meta charset="UTF-8">
<html lang="Fi">
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style css/muokkaahinnasto.css" />
    
</head>

<body>
<h1>Tällä sivulla muokkaat taulukkoon haluamasi tiedot</h1>
</body>

</html>

<?php

include "../Kirjautuminen/connect.php";

$sql = "SELECT * FROM hinnasto";
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
        $lisamaksu =                $row['lisamaksu'];
        $matkatavarat =             $row['matkatavarat'];
        $kulkuvalineet =            $row['kulkuvalineet'];
        $matkustaja =               $row['matkustaja'];
        $matkustajia =              $row['matkustajia'];
        $id =                       $row['id'];
        
        echo "<form action='muokkaa.php' method='POST'>";
        echo "<input type='hidden' name='id' value="; echo $id; echo " required>";
        echo "Taksat alkaen: <input type='text' name='taksa' value='"; echo $taksa; echo "' required>";
        echo "Alv: <input type='text' name='alv' value='"; echo $alv; echo "' required>";
        echo "Esimerkkimatka: <input type='text' name='esimerkkimatka' value='"; echo $esimerkkimatka; echo "' required>";
        echo "Aloitusmaksu: <input type='text' name='aloitusmaksu' value='"; echo $aloitusmaksu; echo "' required>";
        echo "Aloitusmaksu muina aikoina: <input type='text' name='aloitusmaksumuina' value='"; echo $aloitusmaksumuina; echo "' required>";
        echo "1-4 Matkustajaa: <input type='text' name='matkustaja' value='"; echo $matkustaja; echo "' required>";
        echo "5-8 Matkustajaa: <input type='text' name='matkustajia' value='"; echo $matkustajia; echo "' required>";
        echo "Aikataksa: <input type='text' name='aika' value='"; echo $aika; echo "' required>";
        echo "Tavaralisä: <input type='text' name='matkatavarat' value='"; echo $matkatavarat; echo "' required>";
        echo "Kulkuvalineet: <input type='text' name='kulkuvalineet' value='"; echo $kulkuvalineet; echo "' required>";
        echo '<input type="submit" value="Muokkaa tietoja">';
    }
}

?>