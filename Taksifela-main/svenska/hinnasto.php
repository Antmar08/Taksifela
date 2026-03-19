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

<!--- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taksifela Prislista</title>
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

        <a href="tel: +358 040 3765890"><img id="pnumero" src="../kuvat/Pnumeroruotsi.png" alt="pnumero"></a>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <ul class="nav" id="topnav">
            <a href="etusivu.php">Framsida</a>
            <a href="hinnasto.php">Prislista</a>
            <a href="palvelut.php">FPA-taksi</a>
            <a href="yhteystiedot.php">Kontakta oss</a>
            <a href="../suomi/hinnasto.php">Suomi</a>
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
    <h1>PRISLISTA</h1>

<?php
// Hakee tiedot hinnasto tietokannasta
$res = $conn->query("SELECT * FROM hinnasto LIMIT 1");
$row = $res ? $res->fetch_assoc() : null;
?>

<!-- Hintataulukko alkaa -->
    <table>
            <tr>
                <th>Taxetabell från <?php echo($row['taksa']) ?></th>
                <th>Moms <?php echo($row['alv']) ?>%</th>
            </tr>

            <tr>
                <th>Exempel resa 1-4 passagerare (10 km/15 min)</th>
                <th><?php echo($row['esimerkkimatka']) ?>€</th>
            </tr>

            <tr>
                <th>Grundavgift (mån-fre 6:00-18:00)</th>
                <th><?php echo($row['aloitusmaksu']) ?>€</th>
            </tr>

            <tr>
                <th>Grundavgift övriga tider</th>
                <th><?php echo($row['aloitusmaksumuina']) ?>€</th>
            </tr>

             <tr>
                <th>Tidsavgift</th>
                <th><?php echo($row['aika']) ?>€/min</th>
            </tr>

            <tr>
                <th>Färdtaxa 1-4 passagerare</th>
                <th><?php echo($row['matkustaja']) ?>€/km</th>
            </tr>

            <tr>
                <th>Färdtaxa 5-8 passagerare</th>
                <th><?php echo($row['matkustajia']) ?>€/km</th>
            </tr>

            <tr>
                <th>frakttillägg</th>
                <th><?php echo($row['matkatavarat']) ?>€</th>
            </tr>

            <tr>
                <th>Mobilitetshjälpmedel som rullstolar</th>
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

<h1>Prisräknare</h1>
<div class="laskuri">
    <label><span>färdens längd (km):</span></label>
    <input type="number" id="km" placeholder="till exempel. 10km" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

    <label><span>färdtid  (min):</span></label>
    <input type="number" id="min" placeholder="till exempel. 15min" min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<div id="casePointsFieldset">
  <fieldset class="casePointFieldset">
    <div>
      <label><span>Grundavgift mån-fre 6:00-18:00</span>
        <input type="checkbox" name="casePoints[0][isDutyPoint]" class="duty" value="0"></label>
    </div>
  </fieldset>
  
  <fieldset class="casePointFieldset">
    <div>
      <label><span>Grundavgift övriga tider</span>
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
      <label><span>1-4 passagerare</span>
        <input type="checkbox" name="casePointsi[0][isDutyPoint]" class="dutye" value="0"></label>
    </div>
  </fieldset>
  
  <fieldset class="casePointFieldseti">
    <div>
      <label><span>5-8 passagerare:</span>
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

    <label><span>frakttillägg:</span>
    <input type="checkbox" id="matkatavarat"></label>

    <label><span>Om du har med mobilitetshjälpmedel som rullstolar:</span>
    <input type="checkbox" id="kulkuvaline"></label>

    <button onclick="laskeHinta()">Beräkna prisuppskattning</button>
</div>
    <div id="tulos"></div>

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

<h2>BESTÄLLNINGSINSTRUKTIONER</h2>
<p>Om du vill beställa en taxi kan du läsa <a href="palvelut.php"><nobr>instruktioner här</nobr></a></p>
<p>Du kan beställa en taxi genom att ringa <a href="tel: +358 040 376 5890"><nobr>+358 040 3765890</nobr></a>.<br>När samtalet är kopplat till föraren, ange tydligt följande:</p>
 <ul class="ohjeet">
        <li>Din namn</li>
        <li>Den exakta adressen dit du vill att taxin ska anlända</li>
        <li>Antal personer som ska åka i taxin</li>
        <li>Meddela om du har mycket bagage eller stora föremål</li>
    </ul>

    </main>

   
    <footer>
    <p1>&copyTaksi Fela</p1><?php date_default_timezone_set('Europe/Helsinki'); echo date(" Y"); ?><br>
    <a href="../suomi/kirjaudu.php" id="admin">Logga in som admin</a>
    </footer>

</div>

</body>



</html>