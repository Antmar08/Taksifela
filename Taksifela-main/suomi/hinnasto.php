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
</head>
<body>
    <div class="site">
    <header>
        
        <a href="etusivu.html"><img id="logo" src="../kuvat/logo.png" alt="logo"></a>

        <a href="tel: +358 040 3765890"><img id="pnumero" src="../kuvat/Pnumero.png" alt="pnumero"></a>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <ul class="nav" id="topnav">
            <a href="etusivu.php">Etusivu</a>
            <a href="hinnasto.php">Hinnasto</a>
            <a href="palvelut.html">Kelataksi</a>
            <a href="henkilosto.html">Henkilöstö</a>
            <a href="yhteystiedot.html">Ota yhteyttä</a>
            <a href="../svenska/hinnasto.html">Svenska</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>  
            </a>

            <script src="../style css/nav.js"></script>
        </ul>
    </header>

    <main>
    <h1>HINNASTO JA TILAUSOHJEET</h1>

<!-- Hintataulukko alkaa -->
    <table id="lista">
        <thead>
            <tr>
                <th>Taksat alkaen 1.7.2025</th>
                <th>Alv 13,5%</th>
            <tr>
                <th>Esimerkkimatka (10km + 15min)</th>
                <th>Maksimihinta 42,95€</th>
            </tr>
            
            <tr>
                <th>Aloitusmaksu (Ma-Pe 6-18)</th>
                <th>7,00€</th>
            </tr>

             <tr>
                <th>Aloitusmaksu muina aikoina</th>
                <th>10,50€</th>
            </tr>

            <tr>
                <th>Matkataksa</th>
                <th>1,52€/km</th>
            </tr>

            <tr>
                <th>Aikataksa</th>
                <th>1,15€/min</th>
            </tr>

            <tr>
                <th>Lisämaksut</th>
                <th>Matkatavarat kuten suuret laukut<br>
                Rullatuoli ja muut kulkuvälineet<br>
                Jos useampi matkustaja</th>
        </thead>
 
    </table>
<!-- Hintataulukko päättyy -->

 <!-- Lisämaksut 
<h2>Lisämaksut<h2>

<ul class="lisamaksu">
<p>Matkatavarat kuten suuret laukut<br>
Rullatuoli ja muut kulkuvälineet<br>
Jos useampi matkustaja</p>
</ul>
-->

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




