<?php
include("Kirjautuminen/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <!--- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style css/rekisteroidy.css">
    <title>rekisteröinti sivu</title>
</head>
<body>
    <div class="site">
    <header>

    <?php
    if(isset($_SESSION['kayttajanimi'])) {
    echo "Kirjautunut käyttäjä: " . $_SESSION['kayttajanimi'];
    }
    ?>

        <a href="index.php"><img id="logo" src="kuvat/logo.png" alt="logo"></a>

        <a href="tel: +358 040 3765890"><img id="pnumero" src="kuvat/Pnumero.png" alt="pnumero"></a>
        <ul class="nav" id="topnav">
        <!-- Kirjaudu ulos nappi joka näkyy vain sillon kun olet kirjautunut -->
            <?php
            if (isset($_SESSION['kayttajanimi'])) {
            ?>  
            <a href="Kirjautuminen/logout.php">Kirjaudu ulos</a>
            <a href="kirjaudu.php">Palaa takaisin kirjautumissivulle</a>
            <?php
            }
            ?>
        </ul>
    </header>

    <main>

    <h1>Täällä Kirjoitat uuden käyttäjänimen ja salasanan</h1>

<form action="Kirjautuminen/register.php" method="post"><br>
  <input type="hidden" name="access_key" value="">

  <label>
    <span>Uusi käyttäjänimi</span>
    <input type="text" name="username" id="kayttajanimi" required>
  </label>

  <label>
    <span>Uusi salasana</span>
    <input type="password" name="password" id="salasana" title="8 merkkiä, väh yksi numero, yksi iso kirjain ja yksi pieni kirjain" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
  </label>

  <button type="submit">Vahvista muutokset</button>

</form>

</main>

    <footer>
    <p1>&copyTaksi Fela</p1><?php date_default_timezone_set('Europe/Helsinki'); echo date(" Y"); ?><br>
    <a href="kirjaudu.php" id="admin">Kirjaudu Adminiksi</a>
    </footer>

</body>
</html>