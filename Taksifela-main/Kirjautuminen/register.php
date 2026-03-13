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
<html lang="en">
    <!--- TYYLIN LINKKI JA SCRIPT -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taksifela rekisteröinti</title>
    <link rel="stylesheet" href="../style css/kirjaudu.css">
</head>
<body>

    <div class="site">

     <header>

    <?php
    if(isset($_SESSION['kayttajanimi'])) {
    echo "Kirjautunut käyttäjä: " . $_SESSION['kayttajanimi'];
    }
    ?>

        <a href="../suomi/etusivu.php"><img id="logo" src="../kuvat/logo.png" alt="logo"></a>

        <a href="tel: +358 040 3765890"><img id="pnumero" src="../kuvat/Pnumero.png" alt="pnumero"></a>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <ul class="nav" id="topnav">

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

<?php

$sql = "SELECT * FROM users";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $id =                       $row['id'];
    }
}
        
include "connect.php";
date_default_timezone_set("Europe/Helsinki");
$aika = date("d.m.Y H:i");
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


$sql = "SELECT * FROM users WHERE username = '$username'";



    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "UPDATE users SET username='$username', password='$hash_password' WHERE id='$id'";
    mysqli_query($conn, $sql);
    $_SESSION['loggeduser55234'] = $username;
    echo $_SESSION['loggeduser55234'] . " käyttäjä luotu!";
    header("location:../suomi/Kirjaudu.php");


?>


</main>

    <footer>
    <p1>&copyTaksi Fela</p1><br>
    <a href="kirjaudu.php" id="admin">Kirjaudu Adminiksi</a>
    </footer>

</div>

</body>

</html>