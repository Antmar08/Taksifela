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
    <title>Taksi Fela pricelist</title>
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

        <a href="tel: +358 040 3765890"><img id="pnumero" src="../kuvat/Pnumeroenglanti.png" alt="pnumero"></a>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <ul class="nav" id="topnav">
            <a href="etusivu.php">Homepage</a>
            <a href="hinnasto.php">Price list</a>
            <a href="palvelut.php">Kela taxi</a>
            <a href="yhteystiedot.php">Contact</a>
            <a href="../suomi/hinnasto.php">Suomi</a>
            <a href="../svenska/hinnasto.php">Svenska</a>

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
    <h1>Price list</h1>

<?php
// Hakee tiedot hinnasto tietokannasta
$res = $conn->query("SELECT * FROM hinnasto LIMIT 1");
$row = $res ? $res->fetch_assoc() : null;
?>

<!-- Hintataulukko alkaa -->
    <table>
            <tr>
                <th>Taxes from<?php echo($row['taksa']) ?></th>
                <th>VAT <?php echo($row['alv']) ?>%</th>
            </tr>

            <tr>
                <th>For example 1-4 people (10km/15min)</th>
                <th><?php echo($row['esimerkkimatka']) ?>€</th>
            </tr>

            <tr>
                <th>Start fee (mon-fri 6:00-18:00)</th>
                <th><?php echo($row['aloitusmaksu']) ?>€</th>
            </tr>

            <tr>
                <th>Start fee at other times</th>
                <th><?php echo($row['aloitusmaksumuina']) ?>€</th>
            </tr>

             <tr>
                <th>Time fare</th>
                <th><?php echo($row['aika']) ?>€/min</th>
            </tr>

            <tr>
                <th>1-4 passengers</th>
                <th><?php echo($row['matkustaja']) ?>€/km</th>
            </tr>

            <tr>
                <th>5-8 passengers</th>
                <th><?php echo($row['matkustajia']) ?>€/km</th>
            </tr>

            <tr>
                <th>Baggage fee</th>
                <th><?php echo($row['matkatavarat']) ?>€</th>
            </tr>

            <tr>
                <th>Mobility aids (e.g., wheelchair)</th>
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

<h1>PRICE CALCULATOR</h1>
<div class="laskuri">
    <label><span>Travel distance (km):</span></label>
    <input type="number" id="km" placeholder="For example. 10km" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

    <label><span>Travel time (min):</span></label>
    <input type="number" id="min" placeholder="For example. 15min" min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<div id="casePointsFieldset">
  <fieldset class="casePointFieldset">
    <div>
      <label><span>Start fee mon-fri 6:00-18:00</span>
        <input type="checkbox" name="casePoints[0][isDutyPoint]" class="duty" value="0"></label>
    </div>
  </fieldset>
  
  <fieldset class="casePointFieldset">
    <div>
      <label><span>Start fee at other times than mon-fri 6:00-18:00:</span>
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
      <label><span>1-4 passengers</span>
        <input type="checkbox" name="casePointsi[0][isDutyPoint]" class="dutye" value="0"></label>
    </div>
  </fieldset>
  
  <fieldset class="casePointFieldseti">
    <div>
      <label><span>5-8 passengers:</span>
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

    <label><span>Baggage fee:</span>
    <input type="checkbox" id="matkatavarat"></label>

    <label><span>If you have mobility aids with you (e.g., wheelchair):</span>
    <input type="checkbox" id="kulkuvaline"></label>

    <button onclick="laskeHinta()">Calculate a price estimate</button>
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
                document.getElementById('tulos').innerText = "Please fill in both travel distance and travel time.";
                return;
            }

            const km = parseFloat(kmInput) || 0;
            const min = parseFloat(minInput) || 0;

            // Jos arvot ovat nolla tai negatiivisia, näytä virhe
            if (km <= 0 || min <= 0) {
                document.getElementById('tulos').innerText = "Travel distance and travel time must be greater than zero.";
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
            document.getElementById('tulos').innerText = "Estimated price: " + summa.toFixed(2) + "€";
        }
    </script>

<!-- Hintataulukko päättyy -->

<h2>ORDERING INSTRUCTIONS</h2>
<p>If you want to book a kela taxi, you can read  <a href="palvelut.php"><nobr>more about it here</nobr></a></p>
<p>You can book a taxi by calling <a href="tel: +358 040 376 5890"><nobr>+358 040 3765890</nobr></a>.<br>When the call is connected to our driver, mention clearly these next things:</p>
 <ul class="ohjeet">
        <li>Your name</li>
        <li>The exact address where you want your taxi to come pick you up</li>
        <li>How many passengers will come</li>
        <li>Please inform us if you are bringing a substantial amount of luggage or oversized items</li>
    </ul>

    </main>

   
    <footer>
    <p1>&copyTaksi Fela</p1> <?php echo date("Y"); ?><br>
    <a href="../suomi/kirjaudu.php" id="admin">Login as admin</a>
    </footer>

</div>

</body>



</html>