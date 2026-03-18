<?php
    include "../Kirjautuminen/connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taksifela framsida</title>
    <!--- TYYLIN LINKKI JA SCRIPT -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../style css/etusivu.css">
    
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
            <a href="../suomi/etusivu.php">Suomi</a>
            <a href="../english/etusivu.php">English</a>

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

            <script src="../style css/nav.js"></script>
        </ul>
    </header>

    <main>

    <h1>SÄKERT TILL DIN <BR> DESTINATION</h1>

    <a href="tel: +358 040 3765890" id="puhelinnumero" ><h1>040 376 5890</h1></a>

    <div class="buttonit">
    <a href="tel: +358 040 3765890"><button>Beställ taxi</button></a>

    <a href="palvelut.php"><button>FPA-taksi</button></a>
   </div>

    </main>
    
    
    <section>
        <div class="teksti">
        <img src="" alt="">
        <h3>Välkommen till Taksi Fela</h3>
        <p>– Din resa börjar med oss

        Taksi Fela bjuder pålitlig och bekväm Taxitjänster när du vill förflytta dig enkelt och smidigt.<br> Vi transporterar dig säkert till din destination dygnet runt – snabbt, flexibelt och alltid med en god serviceinställning. <br>
        
        Oavsett om det är en vardaglig shoppingtur, en skjuts till flygplatsen, en fest, en affärsresa eller en förbokad transport, tar vi hand om det åt dig.<br> Punktlighet, säkerhet och kundens välbefinnande på varje resa är viktigt för oss.</p>
    </div>
    </section>

    <!-- Kuvat linkillä -->
    <a href="hinnasto.php">
    <div class="kuva">
    <div class="kuvateksti">
        <h2>Prislista</h2>
        <p>Behöv för taksi? Här kan du se våra priser och räkna ut priset på din resa direkt!</p>
    </div>
    <img src="../kuvat/sisatila.jpg" alt="kuva">
</div>
</a>

    <a href="palvelut.php">
    <div class="kuva1">
    <div class="kuvateksti1">
        <h2>FPA-taksi</h2>
        <p>Behöver du en FPA-taxi? Här kan du läsa mer om vår FPA-taxi!</p>
    </div>
    <img src="../kuvat/KP1717.jpg" alt="kuva1">
</div>
</a>

<a href="yhteystiedot.php">
   <div class="kuva">
    <div class="kuvateksti">
        <h2>Kontakta oss</h2>
        <p>Har du några frågor eller synpunkter? Här kan du fylla i en form och skicka den till oss</p>
    </div>
    <img src="../kuvat/otayht.jpg" alt="kuva">
</div>
</a>
    
    
    
    <footer>
    <p1>&copyTaksi Fela</p1><?php date_default_timezone_set('Europe/Helsinki'); echo date(" Y"); ?><br>
    <a href="../suomi/kirjaudu.php" id="admin">Logga in som admin</a>
    </footer>

  </div> 

</body>


</html>