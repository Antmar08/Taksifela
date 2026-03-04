<?php
include "connect.php";
// tuhoaa sesssionit eli kirjautuu ulos""
session_destroy();
header ("location:../suomi/hinnasto.php")

?>