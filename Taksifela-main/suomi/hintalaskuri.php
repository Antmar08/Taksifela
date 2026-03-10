<?php
    include "../Kirjautuminen/connect.php";
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Taksifela hintalaskuri</title>
    <style>
        body { font-family: sans-serif; padding: 20px; max-width: 300px; }
        input { width: 100%; margin-bottom: 10px; padding: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
        #tulos { margin-top: 20px; font-weight: bold; font-size: 1.2em; color: #28a745; }
    </style>
</head>
<body>

    <h3>Taksilaskuri</h3>

<?php
// Hakee tiedot hinnasto tietokannasta
$res = $conn->query("SELECT * FROM hinnasto LIMIT 1");
$row = $res ? $res->fetch_assoc() : null;

// Jos data löytyy, parsi arvot numeroiksi

    $aloitusmaksu = floatval(str_replace('€', '', $row['aloitusmaksu']));
    $aloitusmaksumuina = floatval(str_replace('€', '', $row['aloitusmaksumuina']));
    $matka = floatval(preg_replace('/[^\d.]/', '', $row['matka'])); // Poistaa €/km ja muut merkit
    $aika = floatval(preg_replace('/[^\d.]/', '', $row['aika'])); // Poistaa €/min ja muut merkit

?>

    <label>Matkan pituus (km):</label>
    <input type="number" id="km" placeholder="Esim. 10" step="0.1">

    <label>Matka-aika (min):</label>
    <input type="number" id="min" placeholder="Esim. 15">

    <button onclick="laskeHinta()">Laske hinta-arvio</button>

    <div id="tulos"></div>

    <script>
        
        function laskeHinta() {
            // Määritellään taksat (haetaan PHP:stä)
            const aloitusmaksu = <?php echo $aloitusmaksu; ?>;
            const aloitusmaksumuina = <?php echo $aloitusmaksumuina; ?>;
            const kmHinta = <?php echo $matka; ?>;
            const minHinta = <?php echo $aika; ?>;

            // Haetaan syötteet
            const km = parseFloat(document.getElementById('km').value) || 0;
            const min = parseFloat(document.getElementById('min').value) || 0;

            // Lasketaan loppusumma (huom: aloitusmaksumuina ei käytössä laskussa – tarkista jos pitäisi lisätä)
            const summa = aloitusmaksu + (km * kmHinta) + (min * minHinta);

            // Näytetään tulos
            document.getElementById('tulos').innerText = "Hinta-arvio: " + summa.toFixed(2) + " €";
        }
    </script>

</body>
</html>