<?php
    session_start();
    try {
        $dbuser = "root";
        $dbpassw = "";
        $conn = new PDO("mysql:host=localhost;dbname=receptek1", $dbuser, $dbpassw);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        echo "<p>Adatbázis kapcsolódási hiba: ".$e->getMessage()."</p>\n";
        die();
    } catch (Exception $e){
        echo "<p>Hiba: ".$e->getMessage()."</p>\n";
        die();
    }

    try {
        $sql = "SELECT * FROM receptek WHERE id LIKE :id";
        $query = $conn->prepare($sql);
        $query->bindParam(':id', $_GET["id"]);
        $query->execute();

        if ($query->rowCount()==1) {
            $i=0;
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $mezo) {
                    $recept[$i] = $mezo;
                    $i++;
                }
            }

            $id=$recept[0];
            $nev=$recept[1];
            $leiras=$recept[2];
            $nehezseg=$recept[3];
            $hozzavalok=$recept[4];
            $ido=$recept[5];
            $ertekeles=$recept[6];
            $feltolto=$recept[7];
            $kep=$recept[8];
            $konyha=$recept[9];
            

            switch ($nehezseg) {
                case "konnyu" : 
                    $nehezseg = "Könnyű";
                    break;
                case "kozepes" : 
                    $nehezseg = "Közepes";
                    break;
                case "nehez" : 
                    $nehezseg = "Nehéz";
                    break;
            }

        } else {
            echo "<p>Nincs listázható recept.</p>";
        }
        
    } catch (PDOException $e) {
        echo "<p>Lekérdezési hiba: ".$e->getMessage()."</p><br>";
        die();
    } catch (Exception $e){
        echo "<p>Hiba: ".$e->getMessage()."</p>\n";
        die();
    } 

    try {
        $sql = "SELECT vegetarianus, vegan, gluten, laktoz, tojas, szoja, cukor, kukorica FROM szurok JOIN receptek ON szurok.recept_id=receptek.id WHERE id LIKE :id";
        $query = $conn->prepare($sql);
        $query->bindParam(':id', $_GET["id"]);
        $query->execute();

        if ($query->rowCount()>0) {
            $i=0;
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $mezo) {
                    $szurok[$i] = $mezo;
                    $i++;
                }
            }
        }

        $allergen=array();

        if ($szurok[0]==1) {
            array_push($allergen, "Vegetariánus");
        }
        if ($szurok[1]==1) {
            array_push($allergen, "Vegán");
        }
        if ($szurok[2]==1) {
            array_push($allergen, "Gluténmentes");
        }
        if ($szurok[3]==1) {
            array_push($allergen, "Laktózmentes");
        }
        if ($szurok[4]==1) {
            array_push($allergen, "Tojásmentes");
        }
        if ($szurok[5]==1) {
            array_push($allergen, "Szójamentes");
        }
        if ($szurok[6]==1) {
            array_push($allergen, "Cukormentes");
        }
        if ($szurok[7]==1) {
            array_push($allergen, "Kukoricamentes");
        }
        

    } catch (PDOException $e) {
        echo "<p>Lekérdezési hiba: ".$e->getMessage()."</p><br>";
        die();
    } catch (Exception $e){
        echo "<p>Hiba: ".$e->getMessage()."</p>\n";
        die();
    } 
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinamikus Receptek - <?php echo $nev; ?></title>
    <link href="http://fonts.cdnfonts.com/css/gentium-book-basic" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./kepek/favicon.png">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/recept.css">
</head>
<body>
<header>
        <div id="logo">
            <a href="index.php">
                <img src="./kepek/logo1.png">
            </a>
        </div>
        <div id="menu">
        <div class="dropdown">
        <img src="./kepek/menu.png" onclick="dropDown1()" class="dropbtn">
                <p onclick="dropDown1()" class="dropbtn desktop">Profil</p>
                <div id="myDropdown" class="dropdown-content">
                    <?php if (isset($_SESSION["user"])) {
                        echo '
                        <a href="sajat.php">Saját Receptek</a><br>
                        <a href="profil.php">Profil Megtekintése</a><br>
                        <a href="keszites.php"> Recept keszitése</a><br>
                        <a href="logout.php">Kijelentkezés</a><br>';
                     } else {
                        echo '<a href="regisztracio.php">Regisztráció</a><br>';
                        echo '<a href="login.php">Bejelentkezés</a><br>';
                     }
                      ?>
                    
                    <?php
                    
                    if(isset($_SESSION["user"]) && ($_SESSION["user"] == "Admin")) {
                   echo  '<a href="admin.php" > Admin Felület</a>';
                }
                    ?>
                </div>
            </div>
        </div>
        </div>
    </header>
    <?php

    ?>
    
    <span class="hatter"></span>
    
    <div id="container">
        <div id="receptNev">
            <p><?php echo $nev; ?></p>
        </div>
        <br><br>
        <div id="info">
            <p>Elkészítési idő: <?php echo $ido; ?> perc</p>
            <p style="float: right;">Elkészítési nehézség: <?php echo $nehezseg; ?></p>
            <br><br>
        </div>
        <br>
        <div id="receptKep">
            <img src="<?php echo $kep; ?>">
        </div>
        <div id="hozzavalok">
            <div id="hozzavalokNev"><h4>HOZZÁVALÓK</h4></div>
            <div id="hozzavalokOssz">
                <?php echo $hozzavalok; ?>
            </div>
        </div>
        <br>
        <div id="elkeszites">
            <h2>ELKÉSZÍTÉS</h2>
            <div class="folyamat">
                <p>
                    <?php echo $leiras; ?>
                </p>
            </div>
        </div>
        <div id="etrend">
            <p>Étrend: <br><?php echo implode(", ", $allergen) ?></p>
        </div>
    </div>

    <script>
        function dropDown1() {
            document.getElementById("myDropdown").classList.toggle("show");
            }

            // Close the dropdown menu if the user clicks outside of it
            window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
                }
            }
        }
    </script>
</body>
</html>