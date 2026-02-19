<?php
    include "../Kirjautuminen/connect.php";
?>


<!DOCTYPE html>
<!--- TYYLIN LINKKI JA SCRIPT -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taksifela hinnasto</title>
    <link rel="stylesheet" href="../style css/hinnasto.css">
    <script src="../style css/nav.js"></script>
</head>
<body>
    <div class="site">
    <header>

<?php
    if(isset($_SESSION['kayttajanimi'])) {
    echo "Kirjautunut käyttäjä: " . $_SESSION['kayttajanimi'];
    }
    ?>

        <a href="etusivu.html"><img id="logo" src="../kuvat/logo.png" alt="logo"></a>

        <a href="tel: +358 040 3765890"><img id="pnumero" src="../kuvat/Pnumero.png" alt="pnumero"></a>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <ul class="nav" id="topnav">
            <a href="etusivu.php">Etusivu</a>
            <a href="hinnasto.php">Hinnasto</a>
            <a href="palvelut.html">Kelataksi</a>
            <a href="yhteystiedot.html">Ota yhteyttä</a>
            <a href="../svenska/hinnasto.html">Svenska</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>  
            </a>

        </ul>
    </header>

    <main>
    <h1>HINNASTO JA TILAUSOHJEET</h1>

<?php
// Hakee tiedot hinnasto tietokannasta
$res = $conn->query("SELECT * FROM hinnasto LIMIT 1");
$row = $res ? $res->fetch_assoc() : null;
?>

<!-- Hintataulukko alkaa -->
    <table class="lista">
            <tr>
                <th><?php echo($row['taksa']) ?></th>
                <th><?php echo($row['alv']) ?></th>
            </tr>

            <tr>
                <th>Esimerkkimatka</th>
                <th><?php echo($row['esimerkkimatka']) ?></th>
            </tr>

            <tr>
                <th>Aloitusmaksu</th>
                <th><?php echo($row['aloitusmaksu']) ?></th>
            </tr>

            <tr>
                <th>Aloitusmaksu muina aikoina</th>
                <th><?php echo($row['aloitusmaksumuina']) ?></th>
            </tr>

            <tr>
                <th>Matkataksa</th>
                <th><?php echo($row['matka']) ?></th>
            </tr>

            <tr>
                <th>Aikataksa</th>
                <th><?php echo($row['aika']) ?></th>
            </tr>
        
    </table>

<?php
if (isset($_SESSION['kayttajanimi'])) {
   ?>    
    <div class="buttonit">
    <a href="../Muokkaa/lista.php"><button>Muokkaa hinnaston tietoja</button></a>
    </div>
    <?php
    }
?>

<!-- Hintataulukko päättyy -->

<h2>Tilausohjeet</h2>
<p>Taksin voit tilata soittamalla numeroon +358 040 3765890.<br>Kun puhelu on yhdistetty kuljettajaan, mainitse selkeästi seuraavat asiat:</p>
 <ul class="ohjeet">
        <li>Nimesi</li>
        <li>Tarkan osoitteen, johon haluat taksin saapuvan</li>
        <li>Montako henkilöä</li>
        <li></li>
    </ul>
    </main>

   
    <footer>
    <p1>&copyTaksi Fela</p1><br>
    <a href="kirjaudu.php" id="admin">Kirjaudu Adminiksi</a>
    </footer>

</div>

</body>



</html>