<?php
    include "../Kirjautuminen/connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taksifela etusivu</title>
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

        <a href="tel: +358 040 3765890"><img id="pnumero" src="../kuvat/Pnumero.png" alt="pnumero"></a>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <ul class="nav" id="topnav">
            <a href="etusivu.php">Etusivu</a>
            <a href="hinnasto.php">Hinnasto</a>
            <a href="palvelut.php">Kelataksi</a>
            <a href="yhteystiedot.php">Ota yhteyttä</a>
            <a href="../svenska/etusivu.php">Svenska</a>
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

    <h1>TURVALLISESTI<br>MÄÄRÄNPÄÄHÄN</h1>

    <a href="tel: +358 040 3765890" id="puhelinnumero" ><h1>040 376 5890</h1></a>

    <div class="buttonit">
    <a href="tel: +358 040 3765890"><button>Soita taksi</button></a>

    <a href="../suomi/palvelut.php"><button>Kelataksi</button></a>
   </div>

    </main>
    
    
    <section>
        <div class="teksti">
        <img src="" alt="">
        <h3>Tervetuloa Taksi Felaan</h3>
        <p>– Matkasi alkaa meiltä

        Taksi Fela tarjoaa luotettavat ja mukavat taksipalvelut silloin, kun haluat liikkua helposti ja vaivattomasti.<br> Kuljetamme sinut turvallisesti perille kaikkina vuorokaudenaikoina – nopeasti, joustavasti ja aina hyvällä palveluasenteella.<br>
        
        Olipa kyseessä arkinen asiointimatka, kyyti lentokentälle, juhlat, työmatka tai ennakkoon varattu kuljetus, hoidamme sen puolestasi.<br> Meille tärkeitä ovat täsmällisyys, turvallisuus ja asiakkaan hyvä olo jokaisella matkalla.</p>
    </div>
    </section>

    <!-- Kuvat linkillä -->
    <a href="../suomi/hinnasto.php">
    <div class="kuva">
    <div class="kuvateksti">
        <h2>Hinnasto</h2>
        <p>Taksikyydille tarve? Täältä näet hinnaston ja voit arvioida matkasi hinnan heti!</p>
    </div>
    <img src="../kuvat/sisatila.jpg" alt="kuva">
</div>
</a>

    <a href="../suomi/palvelut.php">
    <div class="kuva1">
    <div class="kuvateksti1">
        <h2>Kelataksi</h2>
        <p>Onko kelataksille tarvetta? Täältä voit lukea kelataksista lisää</p>
    </div>
    <img src="../kuvat/KP1717.jpg" alt="kuva1">
</div>
</a>

<a href="../suomi/yhteystiedot.php">
   <div class="kuva">
    <div class="kuvateksti">
        <h2>Ota yhteyttä</h2>
        <p>Onko asiaa tai kysyttävää? Täältä voit täyttää lomakkeen ja lähettää sen meille</p>
    </div>
    <img src="../kuvat/otayht.jpg" alt="kuva">
</div>
</a>
    
    
    
    <footer>
    <p1>&copyTaksi Fela</p1> <?php echo date("Y"); ?><br>
    <a href="kirjaudu.php" id="admin">Kirjaudu Adminiksi</a>
    </footer>

  </div> 

</body>


</html>