<?php
include "../Kirjautuminen/connect.php";
?>


<!DOCTYPE html>
<html lang="en">
    <!--- TYYLIN LINKKI JA SCRIPT -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../style css/kirjaudu.css">
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
            <a href="../svenska/etusivu.html">Svenska</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>  
            </a>

            <script src="../style css/nav.js"></script>
        </ul>
    </header>
    
    <main>
    <!-- KIRJAUTUMINEN -->
    <!-- 
    <form method="POST" action="actionpage.php">
      <fieldset>
          <legend>Kirjaudu</legend>
          <label for="kayttajanimi">Käyttäjänimi:</label>
          <input type="text" name="kayttajanimi" id="kayttajanimi" placeholder="Kayttajanimi879" required>
          <label for="salasana">Salasana:</label>
          <input type="password" name="salasana" id="salasana" required>

</fieldset>
</form>
-->

<h1>Kirjaudu adminiksi</h1>

<form class="fela-form" method="POST" action="../Kirjautuminen/actionpage.php">
  <input type="hidden" name="access_key" value="">

  <label>
    <span>Käyttäjänimi</span>
    <input type="text" name="kayttajanimi" id="kayttajanimi" required>
  </label>

  <label>
    <span>Salasana</span>
    <input type="password" name="salasana" id="salasana" required>
  </label>

  <button type="submit">Kirjaudu</button>
</form>

</main>

    <footer>
    <p1>&copyTaksi Fela</p1><br>
    <a href="kirjaudu.php" id="admin">Kirjaudu Adminiksi</a>
    </footer>

</div>

</body>

</html>


