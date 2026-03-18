<?php
    include "../Kirjautuminen/connect.php";
?>

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
    <h1>HINNASTO</h1>

<?php
// Hakee tiedot hinnasto tietokannasta
$res = $conn->query("SELECT * FROM hinnasto LIMIT 1");
$row = $res ? $res->fetch_assoc() : null;
?>

<!-- Hintataulukko alkaa -->
    <table>
            <tr>
                <th>Taksat alkaen <?php echo($row['taksa']) ?></th>
                <th>Alv <?php echo($row['alv']) ?>%</th>
            </tr>

            <tr>
                <th>Esimerkkimatka 1-4 matkustajaa (10km/15min)</th>
                <th><?php echo($row['esimerkkimatka']) ?>€</th>
            </tr>

            <tr>
                <th>Aloitusmaksu (ma-pe 6:00-18:00)</th>
                <th><?php echo($row['aloitusmaksu']) ?>€</th>
            </tr>

            <tr>
                <th>Aloitusmaksu muina aikoina</th>
                <th><?php echo($row['aloitusmaksumuina']) ?>€</th>
            </tr>

             <tr>
                <th>Aikataksa</th>
                <th><?php echo($row['aika']) ?>€/min</th>
            </tr>

            <tr>
                <th>Matkataksa 1-4 matkustajaa</th>
                <th><?php echo($row['matkustaja']) ?>€/km</th>
            </tr>

            <tr>
                <th>Matkataksa 5-8 matkustajaa</th>
                <th><?php echo($row['matkustajia']) ?>€/km</th>
            </tr>

            <tr>
                <th>Tavaralisä</th>
                <th><?php echo($row['matkatavarat']) ?>€</th>
            </tr>

            <tr>
                <th>Kulkuvälineet kuten rullatuolit</th>
                <th><?php echo($row['kulkuvalineet']) ?>€</th>
            </tr>

            
    </table>

<?php
if (isset($_SESSION['kayttajanimi'])) {
   ?>    
    <div class="buttonit">
    <a href="../Muokkaa/muokkaahinnasto.php"><button>Muokkaa hinnaston tietoja</button></a>
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
    $matkustaja = floatval(preg_replace('/[^\d.]/', '', $row['matkustaja'])); // Poistaa €/km ja muut merkit
    $matkustajia = floatval(preg_replace('/[^\d.]/', '', $row['matkustajia'])); // Poistaa €/km ja muut merkit
    $aika = floatval(preg_replace('/[^\d.]/', '', $row['aika'])); // Poistaa €/min ja muut merkit
    $kulkuvalineet = floatval(preg_replace('/[^\d.]/', '', $row['kulkuvalineet'])); // Poistaa €/min ja muut merkit
    $matkatavarat = floatval(preg_replace('/[^\d.]/', '', $row['matkatavarat'])); // Poistaa €/min ja muut merkit

?>

<h1>HINTALASKURI</h1>
<div class="laskuri">
    <label><span>Matkan pituus (km):</span></label>
    <input type="number" id="km" placeholder="Esim. 10km" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

    <label><span>Matka-aika (min):</span></label>
    <input type="number" id="min" placeholder="Esim. 15min" min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<div id="casePointsFieldset">
  <fieldset class="casePointFieldset">
    <div>
      <label><span>Aloitusmaksu ma-pe 6:00-18:00</span>
        <input type="checkbox" name="casePoints[0][isDutyPoint]" class="duty" value="0"></label>
    </div>
  </fieldset>
  
  <fieldset class="casePointFieldset">
    <div>
      <label><span>Aloitusmaksu muina aikoina kuin ma-pe 6:00-18:00:</span>
        <input type="checkbox" name="casePoints[1][isDutyPoint]" class="duty" value="0"></label>
  </div>
  </fieldset>
</div>

<!-- checkboxien script että ei voi valita aloitusmaksuista kumpaakin  -->
<script>
 $(function() {
  //check first box
  $("input.duty:first").prop("checked", true);

  //clicking unchecked box should check that box
  //unchecks all others
  $(".duty").on('click', function(event) {
    $("input.duty").prop("checked", false);
    $(this).prop("checked", true);
  });
})
</script>

<div id="casePointsFieldseti">
  <fieldset class="casePointFieldseti">
    <div>
      <label><span>1-4 matkustajaa</span>
        <input type="checkbox" name="casePointsi[0][isDutyPoint]" class="dutye" value="0"></label>
    </div>
  </fieldset>
  
  <fieldset class="casePointFieldseti">
    <div>
      <label><span>5-8 matkustajaa:</span>
        <input type="checkbox" name="casePointsi[1][isDutyPoint]" class="dutye" value="0"></label>
  </div>
  </fieldset>
</div>

<!-- checkboxien script että ei voi valita aloitusmaksuista kumpaakin  -->
<script>
 $(function() {
  //check first box
  $("input.dutye:first").prop("checked", true);

  //clicking unchecked box should check that box
  //unchecks all others
  $(".dutye").on('click', function(event) {
    $("input.dutye").prop("checked", false);
    $(this).prop("checked", true);
  });
})
</script>

    <label><span>Tavaralisä:</span>
    <input type="checkbox" id="matkatavarat"></label>

    <label><span>Mukana kulkuvälineitä kuin esimerkiksi rullatuoli:</span>
    <input type="checkbox" id="kulkuvaline"></label>

    <button onclick="laskeHinta()">Laske hinta-arvio</button>
    <div id="tulos"></div>
</div>
    

<!-- tämä laskee arvioidun matkan hinnan extroineen -->
    <script>
        function laskeHinta() {
            // Haetaan syötteet
            const kmInput = document.getElementById('km').value.trim();
            const minInput = document.getElementById('min').value.trim();

            // Tarkista, että kentät ovat täytetty
            if (kmInput === '' || minInput === '') {
                document.getElementById('tulos').innerText = "Ole hyvä ja täytä sekä matkan pituus että matka-aika.";
                return;
            }

            const km = parseFloat(kmInput) || 0;
            const min = parseFloat(minInput) || 0;

            // Jos arvot ovat nolla tai negatiivisia, näytä virhe
            if (km <= 0 || min <= 0) {
                document.getElementById('tulos').innerText = "Matkan pituus ja matka-aika täytyy olla suurempia kuin nolla.";
                return;
            }

            // Määritellään taksat (haetaan PHP:stä)
            const aloitusmaksu = <?php echo $aloitusmaksu; ?>;
            const aloitusmaksumuina = <?php echo $aloitusmaksumuina; ?>;
            const kmHinta = <?php echo $matkustaja; ?>;
            const kmHintaMatkustajia = <?php echo $matkustajia; ?>;
            const minHinta = <?php echo $aika; ?>;
            const matkatavaratHinta = <?php echo $matkatavarat; ?>;
            const kulkuvalineetHinta = <?php echo $kulkuvalineet; ?>;

            // Tarkistaa, kumpi aloitusmaksu on valittu
            const isDayTime = document.querySelector('input.duty:first-of-type').checked;
            const aloitus = isDayTime ? aloitusmaksu : aloitusmaksumuina;

            const ismatkustaja = document.querySelector('input.dutye:first-of-type').checked;
            const kmHinnat = ismatkustaja ? kmHinta : kmHintaMatkustajia;

            // Tarkistaa matkataksan ja lisämaksut ja lisää ne lopulliseen arvioituun hintaan

            const isMatkatavara = document.querySelector('input#matkatavarat').checked;
            const matkatavara = isMatkatavara ? matkatavaratHinta : 0;

            const isKulkuvaline = document.querySelector('input#kulkuvaline').checked;
            const kulkuvaline = isKulkuvaline ? kulkuvalineetHinta : 0;

            // Laskee loppusumman
            const summa = aloitus + (km * kmHinnat) + (min * minHinta) + matkatavara + kulkuvaline;

            // Näytetään tulos
            document.getElementById('tulos').innerText = "Hinta-arvio: " + summa.toFixed(2) + "€";
        }
    </script>

<!-- Hintataulukko päättyy -->

<h2>TILAUSOHJEET</h2>
<p>Jos haluat tilata kelataksin, voit lukea <a href="palvelut.php"><nobr>ohjeet täältä</nobr></a></p>
<p>Taksin voit tilata soittamalla numeroon <a href="tel: +358 040 376 5890"><nobr>+358 040 3765890</nobr></a>.<br>Kun puhelu on yhdistetty kuljettajaan, mainitse selkeästi seuraavat asiat:</p>
 <ul class="ohjeet">
        <li>Nimesi</li>
        <li>Tarkan osoitteen, johon haluat taksin saapuvan</li>
        <li>Montako henkilöä tulee taksiin</li>
        <li>Ilmoita jos mukanasi on paljon matkatavaroita tai isoja esineitä</li>
    </ul>

    </main>

   
    <footer>
    <p1>&copyTaksi Fela</p1> <?php date_default_timezone_set('Europe/Helsinki'); echo date(" Y"); ?><br>
    <a href="kirjaudu.php" id="admin">Kirjaudu Adminiksi</a>
    </footer>

</div>

</body>



</html>