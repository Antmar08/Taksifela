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

        <a href="etusivu.php"><img id="logo" src="../kuvat/logo.png" alt="logo"></a>

        <a href="tel: +358 040 3765890"><img id="pnumero" src="../kuvat/Pnumero.png" alt="pnumero"></a>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <ul class="nav" id="topnav">
            <a href="etusivu.php">Etusivu</a>
            <a href="hinnasto.php">Hinnasto</a>
            <a href="palvelut.php">Kelataksi</a>
            <a href="yhteystiedot.php">Ota yhteyttä</a>
            <a href="../svenska/hinnasto.php">Svenska</a>
            <a href="../english/hinnasto.php">English</a>

            <!-- Kirjaudu ulos nappi joka näkyy vain sillon kun olet kirjautunut -->
            <?php
            if (isset($_SESSION['kayttajanimi'])) {
            ?>  
            <a href="../Kirjautuminen/logout.php">Kirjaudu ulos</a>
            <?php
            }
            ?>

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
                <th>Taksa alkaen <?php echo($row['taksa']) ?></th>
                <th>Alv <?php echo($row['alv']) ?>%</th>
            </tr>

            <tr>
                <th>Esimerkkimatka (10km/15min)</th>
                <th>Maksimihinta <?php echo($row['esimerkkimatka']) ?>€</th>
            </tr>

            <tr>
                <th>Aloitusmaksu</th>
                <th><?php echo($row['aloitusmaksu']) ?>€</th>
            </tr>

            <tr>
                <th>Aloitusmaksu muina aikoina</th>
                <th><?php echo($row['aloitusmaksumuina']) ?>€</th>
            </tr>

            <tr>
                <th>Matkataksa</th>
                <th><?php echo($row['matka']) ?>€/km</th>
            </tr>

            <tr>
                <th>Aikataksa</th>
                <th><?php echo($row['aika']) ?>€/min</th>
            </tr>

            <tr>
                <th>Lisämaksu</th>
                <th><?php echo($row['lisamaksu']) ?></th>
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

<?php
// Hakee tiedot hinnasto tietokannasta
$res = $conn->query("SELECT * FROM hinnasto LIMIT 1");
$row = $res ? $res->fetch_assoc() : null;

// Jos data löytyy, poistaa erikoismerkit

    $aloitusmaksu = floatval(str_replace('€', '', $row['aloitusmaksu']));
    $aloitusmaksumuina = floatval(str_replace('€', '', $row['aloitusmaksumuina']));
    $matka = floatval(preg_replace('/[^\d.]/', '', $row['matka'])); // Poistaa €/km ja muut merkit
    $aika = floatval(preg_replace('/[^\d.]/', '', $row['aika'])); // Poistaa €/min ja muut merkit

?>

<h1>Hintalaskuri</h1>
<div class="laskuri">
    <label>Matkan pituus (km):</label>
    <input type="number" id="km" placeholder="Esim. 10" step="0.1">

    <label>Matka-aika (min):</label>
    <input type="number" id="min" placeholder="Esim. 15">

    <button onclick="laskeHinta()">Laske hinta-arvio</button>
</div>
    <div id="tulos"></div>

    <script>
        
        function laskeHinta() {
            // Määritellään taksat (haetaan PHP:stä)
            const aloitusmaksu = <?php echo $aloitusmaksu; ?>;
            const aloitusmaksumuina = <?php echo $aloitusmaksumuina; ?>;
            const kmHinta = <?php echo $matka; ?>;
            const minHinta = <?php echo $aika; ?>;

            // Haetaan syötteet
            const km = parseFloat(document.getElementById('km').value) || 0;
            const min = parseFloat(document.getElementById('min').value) || 0;

            // Laskee loppusumman (huom: aloitusmaksumuina ei käytössä laskussa – tarkista jos pitäisi lisätä)
            const summa = aloitusmaksu + (km * kmHinta) + (min * minHinta);

            // Näytetään tulos
            document.getElementById('tulos').innerText = "Hinta-arvio: " + summa.toFixed(2) + " €";
        }
    </script>

<!-- Hintataulukko päättyy -->

<h2>Tilausohjeet</h2>
<p>Jos haluat tilata kelataksin, voit lukea <a href="palvelut.php"><nobr>ohjeet täältä</nobr></a></p>
<p>Taksin voit tilata soittamalla numeroon <a href="tel: +358 040 3765890"><nobr>+358 040 3765890</nobr></a>.<br>Kun puhelu on yhdistetty kuljettajaan, mainitse selkeästi seuraavat asiat:</p>
 <ul class="ohjeet">
        <li>Nimesi</li>
        <li>Tarkan osoitteen, johon haluat taksin saapuvan</li>
        <li>Montako henkilöä tulee taksiin</li>
        <li>Ilmoita jos mukanasi on paljon matkatavaroita tai isoja esineitä</li>
    </ul>

    </main>

   
    <footer>
    <p1>&copyTaksi Fela</p1><br>
    <a href="kirjaudu.php" id="admin">Kirjaudu Adminiksi</a>
    </footer>

</div>

</body>



</html>