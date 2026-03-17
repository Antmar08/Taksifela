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
    <title>Taksifela FPA-taksi</title>
    <link rel="stylesheet" href="../style css/kelataksi.css">
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
            <a href="../suomi/palvelut.php">Suomi</a>
            <a href="../english/palvelut.php">English</a>

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

    

   
    
    
    <div class="teksti">
    <h1 id="otsikko">FPA-taksi</h1>     
    <a href="tel: +358 0800 41 5720" id="puhelinnumero" ><h1>0800 41 5720</h1></a>
        <div class="buttonit">
        <a href="tel: +358 0800 41 5720"><button>Beställ FPA-taxi</button></a>
        </div>
    <p>Behöver du en FPA-taxi?<br> Du kan beställa en FPA-taxi från Tampereen Aluetaksi Oy <br> genom att ringa numret <a href="tel: 0800 41 5720"><br>0800 41 5720</br></a>  och då kan du be för taxin KP1717</p>
    <video id="myVideo" autoplay muted>
    <source src="../kuvat/kelataksi.mp4" type="video/mp4">
    </video>
    <p>FPA-taxitjänsten tillhandahålls av Tampereen Aluetaksi Oy.</p>
    
</div>



    </main>

    <footer>

    <p1>&copyTaksi Fela</p1> <?php echo date("Y"); ?><br>
    <a href="kirjaudu.php" id="admin">Logga in som admin</a>
    </footer>

</div>

</body>

</html>
















