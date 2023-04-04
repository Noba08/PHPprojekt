<?php
$felh = "root";
$jelszo = "";
try {
    $conn = new PDO('mysql:host=localhost; dbname=receptek1',
    $felh, $jelszo);
    $conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
echo "Adatbázis hiba: ".$e->getMessage();
}
catch (Exception $e){
echo "Hiba: ".$e->getMessage();
}
?>