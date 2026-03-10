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
    <title>Taksifela</title>
    <link rel="stylesheet" href="../style css/yhteys.css">
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
            <a href="palvelut.php">Kelataksi</a>
            <a href="yhteystiedot.php">Ota yhteyttä</a>
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

    <!-- Api key kaikevarult fc2484ba-a6ec-40d1-a073-c99b021f50be 
<form action="https://api.web3forms.com/submit" method="POST">
  <input type="hidden" name="access_key" value="fc2484ba-a6ec-40d1-a073-c99b021f50be">
  <input type="text" name="Nimi ja sukunimi" required>
  <input type="email" name="Sähköposti" required>
  <textarea name="Viesti" required></textarea>
  <button type="submit">Lähetä</button>
</form>
-->

<form class="fela-form" action="https://api.web3forms.com/submit" method="POST">
  <input type="hidden" name="access_key" value="fc2484ba-a6ec-40d1-a073-c99b021f50be">

  <label>
    <span>Nimi ja sukunimi (pakollinen)</span>
    <input type="text" name="Nimi ja sukunimi" placeholder="Matti Meikäläinen" required>
  </label>

  <label>
    <span>Sähköposti (pakollinen)</span>
    <input type="email" name="Sähköposti" placeholder="matti.meikalainen@gmail.fi" required>
  </label>

  <label>
    <span>Puhelinnumero</span>
    <input type="tel" name="Puhelinnumero" placeholder="0400 123 5678">
  </label>

  <label>
    <span>Viesti (pakollinen)</span>
    <textarea name="Viesti" placeholder="Kerro asiasi…" required></textarea>
  </label>

  <button type="submit"> Lähetä viesti</button>
</form>

</main>

    <footer>
    <p1>&copyTaksi Fela</p1><br>
    <a href="kirjaudu.php" id="admin">Kirjaudu Adminiksi</a>
    </footer>

</div>

</body>



</html>


