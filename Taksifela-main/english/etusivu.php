<?php
    include "../Kirjautuminen/connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taksi Fela homepage</title>
    
    <!--- Bootstrap -->
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

        <a href="tel: +358 040 3765890"><img id="pnumero" src="../kuvat/Pnumeroenglanti.png" alt="pnumero"></a>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <ul class="nav" id="topnav">
            <a href="etusivu.php">Homepage</a>
            <a href="hinnasto.php">Price list</a>
            <a href="palvelut.php">Kela taxi</a>
            <a href="yhteystiedot.php">Contact us</a>
            <a href="../suomi/etusivu.php">Suomi</a>
            <a href="../svenska/etusivu.php">Svenska</a>

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

    <h1>SAFELY<br>TO YOUR DESTINATION</h1>

    <a href="tel: +358 040 3765890" id="puhelinnumero" ><h1>040 376 5890</h1></a>

    <div class="buttonit">
    <a href="tel: +358 040 3765890"><button>Book a taxi</button></a>

    <a href="palvelut.php"><button>Kela taxi</button></a>
   </div>

    </main>
    
    
    <section>
        <div class="teksti">
        <img src="" alt="">
        <h3>Welcome to Taksi Fela</h3>
        <p>– Your journey starts with us

        Taksi Fela offers reliable and comfortable taxi services whenever you need to get around easily and effortlessly.<br> We transport you safely to your destination at any time of day – quickly, flexibly, and always with a friendly service attitude.<br>
        
        Whether it's a daily trip, airport transfer, event ride, work commute, or a pre-booked transportation, we take care of it for you.<br> Punctuality, safety, and customer comfort are important to us on every trip.</p>
    </div>
    </section>

    <!-- Kuvat linkillä -->
    <a href="hinnasto.php">
    <div class="kuva">
    <div class="kuvateksti">
        <h2>Price list</h2>
        <p>Need a taxi? Here you can see our prices and calculate your trip!</p>
    </div>
    <img src="../kuvat/sisatila.jpg" alt="kuva">
</div>
</a>

    <a href="palvelut.php">
    <div class="kuva1">
    <div class="kuvateksti1">
        <h2>Kela taxi</h2>
        <p>Need for a Kela taxi? Here you can read of our Kela taxi more!</p>
    </div>
    <img src="../kuvat/KP1717.jpg" alt="kuva1">
</div>
</a>

<a href="yhteystiedot.php">
   <div class="kuva">
    <div class="kuvateksti">
        <h2>Contact us</h2>
        <p>Got any questions for us? Here you can fill out a form and send it to us!</p>
    </div>
    <img src="../kuvat/otayht.jpg" alt="kuva">
</div>
</a>
    
    
    
    <footer>
    <p1>&copyTaksi Fela</p1><?php date_default_timezone_set('Europe/Helsinki'); echo date(" Y"); ?><br>
    <a href="../suomi/kirjaudu.php" id="admin">Login as admin</a>
    </footer>

  </div> 

</body>


</html>