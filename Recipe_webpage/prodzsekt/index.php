<?php
    session_start();
    if (!array_key_exists("etrend", $_SESSION)) $_SESSION["etrend"]=array();
    if (!array_key_exists("konyha", $_SESSION)) $_SESSION["konyha"]=array();
    if (!array_key_exists("nehezseg", $_SESSION)) $_SESSION["nehezseg"]="mind";

    function checked($tomb, $nev) {
        if (isset($tomb) && in_array($nev, $tomb)) echo 'checked="checked"';
    }

    function receptKiir($l) {
        // MOBIL
        for ($i=0; $i<count($l); $i++) {
            echo '
            <div class="recept-sor-mobil">
            <a href="recept.php?id='.$l[$i][0].'">
                    <div class="recept-mobil">
                        <div class="kep-tarolo">
                            <img src="'.$l[$i][5].'">
                        </div>
                        <br>
                        <div class="szoveg-tarolo">
                            <h4 class="receptnev">'.$l[$i][1].'</h4>
                            <br>
                            <h5 class="feltolto">'.$l[$i][4].'</h5>
                            <br>
                        </div>
                    </div> 
                    <div class="idonehez">
                            <p>'.$l[$i][3].'</p>
                            <p>'.$l[$i][2].'</p>
                        </div>
                </a>
            </div>
            ';
        }

        //TABLET

        $sz=0;
        if ((count($l)%2==1) && (count($l)>0)) {
            $u = array_pop($l);
        } 
        $r = count($l)/2;
        for ($j=0; $j<$r; $j++) {
            echo '
            <div class="recept-sor-tablet">';
                for ($i=$sz; $i<$sz+2; $i++) {
                    echo '
                    <a href="recept.php?id='.$l[$i][0].'">
                        <div class="recept-tablet">
                        <div class="kep-tarolo">
                            <img src="'.$l[$i][5].'">
                        </div>
                            <br><br>
                            <h4 class="receptnev">'.$l[$i][1].'</h4>
                            <br>
                            <h5 class="feltolto">'.$l[$i][4].'</h5>
                            <br> 
                        </div>
                        <div class="idonehez">
                                <p>'.$l[$i][3].'</p>
                                <p>'.$l[$i][2].'</p>
                        </div>
                        </a>';  
                }
                echo '
            </div>';
                $sz+=2;      
        }
        if (isset($u)) {
            echo '
            <div class="recept-sor-tablet">
            <a href="recept.php?id='.$u[0].'">
                        <div class="recept-tablet">
                        <div class="kep-tarolo">
                            <img src="'.$u[5].'">
                        </div>
                            <br><br>
                            <h4 class="receptnev">'.$u[1].'</h4>
                            <br>
                            <h5 class="feltolto">'.$u[4].'</h5>
                            <br> 
                        </div>
                        <div class="idonehez">
                                <p>'.$u[3].'</p>
                                <p>'.$u[2].'</p>
                        </div>
                        </a>
            </div>';
        }

        //PC

        $sz=0;
        $upc=array();
        

        if (isset($u)) {
            array_push($l, $u);
        }

        if ((count($l)%3==1) && (count($l)>3)) {
            $mar=1;
            $upc = array_pop($l);
        } else if ((count($l)%3==2) && (count($l)>3)) {
            $mar=2;
            $upc = array_slice($l, -2);
            array_pop($l);
            array_pop($l);
        }
        
        $r = count($l)/3;
        if (floor($r)>0) {
            for ($j=0; $j<$r; $j++) {
                echo '
                <div class="recept-sor-pc">';
                    for ($i=$sz; $i<$sz+3; $i++) {
                        echo '
                        <a href="recept.php?id='.$l[$i][0].'">
                        <div class="recept-pc">
                        <div class="kep-tarolo">
                            <img src="'.$l[$i][5].'">
                        </div>
                            <br><br>
                            <h4 class="receptnev">'.$l[$i][1].'</h4>
                            <br>
                            <h5 class="feltolto">'.$l[$i][4].'</h5>
                            <br> 
                        </div>
                        <div class="idonehez">
                                <p>'.$l[$i][3].'</p>
                                <p>'.$l[$i][2].'</p>
                        </div>
                        </a>';  
                    }
                    echo '
                </div>';
                    $sz+=3;      
            }
        } else if (floor($r)==0) {
            if (count($l)==1) {
                echo '
            <div class="recept-sor-pc">
            <a href="recept.php?id='.$l[0][0].'">
                        <div class="recept-pc">
                        <div class="kep-tarolo">
                            <img src="'.$l[0][5].'">
                        </div>
                            <br><br>
                            <h4 class="receptnev">'.$l[0][1].'</h4>
                            <br>
                            <h5 class="feltolto">'.$l[0][4].'</h5>
                            <br> 
                        </div>
                        <div class="idonehez">
                                <p>'.$l[0][3].'</p>
                                <p>'.$l[0][2].'</p>
                        </div>
                        </a>
            </div>
            ';
            
            } else if (count($l)==2) {
                echo '
            <div class="recept-sor-pc">';
                for ($i=0; $i<2; $i++) {
                    echo '
                    <a href="recept.php?id='.$l[$i][0].'">
                        <div class="recept-pc">
                        <div class="kep-tarolo">
                            <img src="'.$l[$i][5].'">
                        </div>
                            <br><br>
                            <h4 class="receptnev">'.$l[$i][1].'</h4>
                            <br>
                            <h5 class="feltolto">'.$l[$i][4].'</h5>
                            <br> 
                        </div>
                        <div class="idonehez">
                                <p>'.$l[$i][3].'</p>
                                <p>'.$l[$i][2].'</p>
                        </div>
                        </a>';  
                }
                echo '
            </div>';
            }
        }
        if (!empty($upc)) {
            if ($mar==1) {
            echo '
            <div class="recept-sor-pc">';
                echo '
                <a href="recept.php?id='.$upc[0].'">
                        <div class="recept-pc">
                        <div class="kep-tarolo">
                            <img src="'.$upc[5].'">
                        </div>
                            <br><br>
                            <h4 class="receptnev">'.$upc[1].'</h4>
                            <br>
                            <h5 class="feltolto">'.$upc[4].'</h5>
                            <br> 
                        </div>
                        <div class="idonehez">
                                <p>'.$upc[3].'</p>
                                <p>'.$upc[2].'</p>
                        </div>
                        </a>
            </div>';
            } else if ($mar==2) {
                echo '
                <div class="recept-sor-pc">';
                for ($i=0; $i<2; $i++) {  
                    echo '
                    <a href="recept.php?id='.$upc[$i][0].'">
                        <div class="recept-pc">
                        <div class="kep-tarolo">
                            <img src="'.$upc[$i][5].'">
                        </div>
                            <br><br>
                            <h4 class="receptnev">'.$upc[$i][1].'</h4>
                            <br>
                            <h5 class="feltolto">'.$upc[$i][4].'</h5>
                            <br> 
                        </div>
                        <div class="idonehez">
                                <p>'.$upc[$i][3].'</p>
                                <p>'.$upc[$i][2].'</p>
                        </div>
                        </a>';
                }
                echo '</div>';
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinamikus Receptek - Főoldal</title>
    <link href="http://fonts.cdnfonts.com/css/gentium-book-basic" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./kepek/favicon.png">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/szurok.css">
    <link rel="stylesheet" href="./css/receptek.css">
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

                    $kaja = array(array());

                    try {
                        $sql = "SELECT id, nev, nehezseg, elkeszitesi_ido, feltolto, imgurl FROM receptek";
                        $query = $conn->prepare($sql);
                        $query->execute();
    
                        if ($query->rowCount()>0) {
                            $i=0; 
                            $j=0;
                            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                foreach ($row as $mezo) {
                                    $kaja[$i][$j] = $mezo;
                                    $j++;
                                }
                                $i++;
                                $j=0;
                            }
                        } else {
                            $ures=true;
                        }
    
                        
                    } catch (PDOException $e) {
                        echo "<p>Lekérdezési hiba: ".$e->getMessage()."</p><br>";
                        die();
                    } catch (Exception $e){
                        echo "<p>Hiba: ".$e->getMessage()."</p>\n";
                        die();
                    }     
 
                    //Szűrés

                    if (isset($_POST["submit"])) {
                        //Étrend

                        if (isset($_SESSION["szurtkaja"])) $_SESSION["szurtkaja"]=array(array());
                        if (isset($_SESSION["etrend"]))   $_SESSION["etrend"]=array();
                        if (isset($_SESSION["konyha"]))   $_SESSION["konyha"]=array();
                        if (isset($_SESSION["nehezseg"])) $_SESSION["nehezseg"]="mind";
                    
                        $_SESSION["nehezseg"] = $_POST["nehezseg"];
                        $szurtkaja=array(array());

                        if (isset($_POST["vegetarianus"])) {array_push($_SESSION["etrend"], "vegetarianus");}
                        if (isset($_POST["vegan"])) {array_push($_SESSION["etrend"], "vegan");}
                        if (isset($_POST["gluten"])) {array_push($_SESSION["etrend"], "gluten");}
                        if (isset($_POST["laktoz"])) {array_push($_SESSION["etrend"], "laktoz");}
                        if (isset($_POST["tojas"])) {array_push($_SESSION["etrend"], "tojas");}
                        if (isset($_POST["szoja"])) {array_push($_SESSION["etrend"], "szoja");}
                        if (isset($_POST["cukor"])) {array_push($_SESSION["etrend"], "cukor");}
                        if (isset($_POST["kukorica"])) {array_push($_SESSION["etrend"], "kukorica");}
                        
                        //Konyha

                        if (isset($_POST["magyar"])) {array_push($_SESSION["konyha"], "magyaros");}
                        if (isset($_POST["amerikai"])) {array_push($_SESSION["konyha"], "amerikai");}
                        if (isset($_POST["japan"])) {array_push($_SESSION["konyha"], "japan");}
                        if (isset($_POST["kinai"])) {array_push($_SESSION["konyha"], "kinai");}
                        if (isset($_POST["indiai"])) {array_push($_SESSION["konyha"], "indiai");}
                        if (isset($_POST["olasz"])) {array_push($_SESSION["konyha"], "olasz");}
                        if (isset($_POST["egyeb"])) {array_push($_SESSION["konyha"], "egyeb");}

                        //WHERE-Étrend

                        if (!empty($_SESSION["etrend"])) {
                            $where = " WHERE (";
                            for ($i=0; $i<count($_SESSION["etrend"]); $i++) {
                                $where .= $_SESSION["etrend"][$i]."=1";
                                if (array_key_exists($i+1, $_SESSION["etrend"])) $where .= " OR ";
                                else if (empty($_SESSION["konyha"]) && $_SESSION["nehezseg"]=="mind") $where .= ") ";
                                else if (!empty($_SESSION["konyha"]) || $_SESSION["nehezseg"]!="mind" || (!empty($_POST["min"]) || !empty($POST["max"]))) $where .= ") AND (";
                            }
                        }

                        //WHERE-Konyha

                        if (!empty($_SESSION["konyha"])) {
                            if (!isset($where)) $where=" WHERE (";
                            for ($i=0; $i<count($_SESSION["konyha"]); $i++) {
                                $where .= ' nemzetiseg LIKE "'.$_SESSION["konyha"][$i].'"';
                                if (array_key_exists($i+1, $_SESSION["konyha"])) $where .= " OR ";
                                else if (($_SESSION["nehezseg"]=="mind") && (empty($_POST["min"]) && empty($_POST["max"]))) $where .= ") ";
                                else if (($_SESSION["nehezseg"]!="mind") || (!empty($_POST["min"]) || !empty($_POST["max"]))) $where .= ") AND (";
                            } 
                        }

                        //Nehézség

                        //WHERE-Nehézség

                        if ($_SESSION["nehezseg"]!="mind") {
                            if (!isset($where) && (empty($_POST["min"]) && empty($_POST["max"]))) $where =' WHERE (nehezseg LIKE "'.$_SESSION["nehezseg"].'") ';
                            else if (isset($where) && (empty($_POST["min"]) && empty($_POST["max"]))) $where .= 'nehezseg LIKE "'.$_SESSION["nehezseg"].'") ';
                            else if (!isset($where) && (!empty($_POST["min"]) || !empty($_POST["max"]))) $where =' WHERE (nehezseg LIKE "'.$_SESSION["nehezseg"].'") AND (';
                            else if (isset($where) && (!empty($_POST["min"]) || !empty($_POST["max"]))) $where .= 'nehezseg LIKE "'.$_SESSION["nehezseg"].'") AND (';
                        }

                        //Elkészítési idő

                        if ((!empty($_POST["min"])) && (!empty($_POST["max"]))) {
                            $_SESSION["min"]=$_POST["min"];
                            $_SESSION["max"]=$_POST["max"];
                            if (isset($where)) {
                                $where .= 'elkeszitesi_ido BETWEEN '.$_POST["min"].' AND '.$_POST["max"].')';
                            } else {
                                $where = ' WHERE elkeszitesi_ido BETWEEN '.$_POST["min"].' AND '.$_POST["max"];
                            }   
                        } 

                        if (!empty($_POST["min"]) && (empty($_POST["max"]))) {
                            $_SESSION["min"]=$_POST["min"];
                            if (isset($where)) {
                                $where .= 'elkeszitesi_ido > '.$_POST["min"].')';
                            } else {
                                $where = ' WHERE elkeszitesi_ido > '.$_POST["min"];
                            }
                        }

                        if (empty($_POST["min"]) && (!empty($_POST["max"]))) {
                            $_SESSION["max"]=$_POST["max"];
                            if (isset($where)) {
                                $where .= 'elkeszitesi_ido < '.$_POST["max"].')';
                            } else {
                                $where = ' WHERE elkeszitesi_ido < '.$_POST["max"];
                            }
                        }

                        if (isset($where)) $_SESSION["where"] = $where;                      

                        if (isset($rendezes)) $_SESSION["where"] .= $rendezes;
                        

                        $sql = "SELECT id, nev, nehezseg, elkeszitesi_ido, feltolto, imgurl FROM receptek JOIN szurok ON receptek.id=szurok.recept_id";
                        if (isset($_SESSION["where"])) $sql .= $_SESSION["where"];
                        $query = $conn->prepare($sql);
                        $query->execute();
    
                        if ($query->rowCount()>0) {
                            $i=0; 
                            $j=0;
                            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                foreach ($row as $mezo) {
                                    $szurtkaja[$i][$j] = $mezo;
                                    $j++;
                                }
                                $i++;
                                $j=0;
                            }
                            $_SESSION["szurtkaja"] = $szurtkaja;
                        } else {
                            $ures=true;
                        }
                    }

                    

                    if (isset($_POST["torles"])) {
                        unset($_SESSION["where"]);
                        $_SESSION["etrend"]=[];
                        $_SESSION["konyha"]=[];
                        unset($_SESSION["nehezseg"]);
                        unset($_SESSION["szurtkaja"]);
                        unset($_SESSION["min"]);
                        unset($_SESSION["max"]);
                    }

                ?>
    <span class="hatter"></span>
    <hr id="header-valaszto">
    <div id="container">
        <div id="ossz-szurok">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>"> 
            <div id="szurok">
                <div id="szurok-sav">
                    <div id="szuro">
                        <button type="button" onclick="szurokDisplay()">Szűrők</button>
                    </div>
                    <div id="rendezes">
                        <button type="button" onclick="dropDown2()" class="dropbtn">Rendezés</button>
                        <div id="myDropdown2" class="dropdown-content">
                            <img src="./kepek/down-arrow.png" class="rendezes-nyil"><input type="submit" value="ABC" name="abcle"><br>
                            <img src="./kepek/up-arrow.png" class="rendezes-nyil"><input type="submit" value="ABC" name="abcfel"><br>
                            <img src="./kepek/down-arrow.png" class="rendezes-nyil"> <input type="submit" value="Feltöltés dátuma" name="felle"><br>
                            <img src="./kepek/up-arrow.png" class="rendezes-nyil"> <input type="submit" value="Feltöltés dátuma" name="felfel"><br>
                        </div>
                    </div>
                </div>
            </div>
            <div id="szuro-lista">        
                <button type="button" onclick="etrendDisplay()" id="etrend-gomb" class="szuro-gomb"><img src="./kepek/up-arrow.png" class="lenyil1">Étrendek</button>
                <div id="etrend">
                    <input name="vegetarianus" type="checkbox" <?php checked($_SESSION["etrend"], "vegetarianus");?> >
                    <label>Vegetariánus</label>
                    <br>
                    <input name="vegan" type="checkbox" <?php checked($_SESSION["etrend"], "vegan");?>>
                    <label>Vegán</label>
                    <br>
                    <input name="gluten" type="checkbox" <?php checked($_SESSION["etrend"], "gluten");?>>
                    <label>Gluténmentes</label>
                    <br>
                    <input name="laktoz" type="checkbox" <?php checked($_SESSION["etrend"], "laktoz");?>>
                    <label>Laktózmentes</label>
                    <br>
                    <input name="tojas" type="checkbox" <?php checked($_SESSION["etrend"], "tojas");?>>
                    <label>Tojásmentes</label>
                    <br>
                    <input name="szoja" type="checkbox" <?php checked($_SESSION["etrend"], "szoja");?>>
                    <label>Szójamentes</label>
                    <br>
                    <input name="cukor" type="checkbox" <?php checked($_SESSION["etrend"], "cukor");?>>
                    <label>Cukormentes</label>
                    <br>
                    <input name="kukorica" type="checkbox" <?php checked($_SESSION["etrend"], "kukorica");?>>
                    <label>Kukoricamentes</label>
                    <br>
                </div>
                <button type="button" onclick="konyhaDisplay()" id="konyha-gomb" class="szuro-gomb"><img src="./kepek/up-arrow.png" class="lenyil2">Konyha</button>
                <div id="konyha">
                    <input name="magyar" type="checkbox" <?php checked($_SESSION["konyha"], "magyaros");?>>
                    <label>Magyaros</label>
                    <br>
                    <input name="amerikai" type="checkbox" <?php checked($_SESSION["konyha"], "amerikai");?>>
                    <label>Amerikai</label>
                    <br>
                    <input name="japan" type="checkbox" <?php checked($_SESSION["konyha"], "japan");?>>
                    <label>Japán</label>
                    <br>
                    <input name="kinai" type="checkbox" <?php checked($_SESSION["konyha"], "kinai");?>>
                    <label>Kínai</label>
                    <br>
                    <input name="indiai" type="checkbox" <?php checked($_SESSION["konyha"], "indiai");?>>
                    <label>Indiai</label>
                    <br>
                    <input name="olasz" type="checkbox" <?php checked($_SESSION["konyha"], "olasz");?>>
                    <label>Olasz</label>
                    <br>
                    <input name="egyeb" type="checkbox" <?php checked($_SESSION["konyha"], "egyeb");?>>
                    <label>Egyéb</label>
                    <br>
            </div>
                <div class="szuro2">
                    <label for="nehezseg" class="nehezseg">Elkészítési nehézség: </label>
                    <select name="nehezseg">
                        <option <?php if (isset($_SESSION["nehezseg"]) && $_SESSION["nehezseg"]=="mind") echo 'selected="selected"' ?> value="mind">Mind</option>
                        <option <?php if (isset($_SESSION["nehezseg"]) && $_SESSION["nehezseg"]=="konnyu") echo 'selected="selected"' ?> value="konnyu">Könnyű</option>
                        <option <?php if (isset($_SESSION["nehezseg"]) && $_SESSION["nehezseg"]=="kozepes") echo 'selected="selected"' ?> value="kozepes">Közepes</option>
                        <option <?php if (isset($_SESSION["nehezseg"]) && $_SESSION["nehezseg"]=="nehez") echo 'selected="selected"' ?> value="nehez">Nehéz</option>
                    </select>
                </div>
                <div id="ido">
                    <div class="szuro2">
                        <div class="szuro-gomb" style="font-size: 1.2em;">Elkészítési idő: </div>
                        <input type="number" name="min" placeholder="Minimum perc" class="ido" value="<?php if (isset($_SESSION["min"])) echo $_SESSION["min"] ?>">
                        <input type="number" name="max" placeholder="Maximum perc" class="ido" value="<?php if (isset($_SESSION["max"])) echo $_SESSION["max"] ?>" style="float: right;">
                    </div>
                </div>
                <br><br>
                <input class="szures-gomb" type="submit" name="submit" value="Szűrés">
                <input class="szures-gomb" type="submit" name="torles" value="Szűrők Törlése">
            </div>
        </form>
        </div>
        <div id="osszrecept">
            <?php
                //ABC ASC
                if(isset($_POST["abcle"]) && isset($_SESSION["szurtkaja"])) {
                    $key_values = array_column($_SESSION["szurtkaja"], 1); 
                    array_multisort($key_values, SORT_ASC, $_SESSION["szurtkaja"]);  
                } else if (isset($_POST["abcle"]) && (!isset($_SESSION["szurtkaja"]))) {
                    $key_values = array_column($kaja, 1); 
                    $rendezettkaja = array_multisort($key_values, SORT_ASC, $kaja);  
                } 
                //ABC DESC
                if(isset($_POST["abcfel"]) && isset($_SESSION["szurtkaja"])) {
                    $key_values = array_column($_SESSION["szurtkaja"], 1); 
                    array_multisort($key_values, SORT_DESC, $_SESSION["szurtkaja"]);  
                } else if (isset($_POST["abcfel"]) && !isset($_SESSION["szurtkaja"])) {
                    $rendezettkaja;
                    $key_values = array_column($kaja, 0); 
                    $rendezettkaja = array_multisort($key_values, SORT_DESC, $kaja);  
                } 
                //ID ASC
                if(isset($_POST["felle"]) && isset($_SESSION["szurtkaja"])) {
                    $key_values = array_column($_SESSION["szurtkaja"], 0); 
                    print_r($key_values);
                    array_multisort($key_values, SORT_ASC, $_SESSION["szurtkaja"]);  
                } else if (isset($_POST["felle"]) && !isset($_SESSION["szurtkaja"])) {
                    $rendezettkaja;
                    $key_values = array_column($kaja, 0); 
                    $rendezettkaja = array_multisort($key_values, SORT_ASC, $kaja);  
                } 
                //ID DESC
                if(isset($_POST["felfel"]) && isset($_SESSION["szurtkaja"])) {
                    $key_values = array_column($_SESSION["szurtkaja"], 0); 
                    array_multisort($key_values, SORT_DESC, $_SESSION["szurtkaja"]);  
                } else if (isset($_POST["felfel"]) && !isset($_SESSION["szurtkaja"])) {
                    $rendezettkaja;
                    $key_values = array_column($kaja, 0); 
                    $rendezettkaja = array_multisort($key_values, SORT_DESC, $kaja);  
                }

                //if (isset($_SESSION["szurtkaja"])) print_r($_SESSION["szurtkaja"]);
                


                //Kiírás
                if (isset($_SESSION["where"])) print_r($_SESSION["where"]);
                if (!isset($_SESSION["where"])) receptKiir($kaja);
                else if (isset($_SESSION["szurtkaja"][0][0])) (receptKiir($_SESSION["szurtkaja"]));
                else if (!isset($_SESSION["where"]) && (isset($rendezettkaja))) {
                    receptKiir($rendezettkaja);
                } 
                if (isset($ures) && ($ures==true)) {
                    echo '<p>Nincs listázható recept</p>';
                }
            ?>
        </div>
            <br>
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

        function dropDown2() {
            document.getElementById("myDropdown2").classList.toggle("show");
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

        function szurokDisplay() {
            var x = document.getElementById("szuro-lista");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function etrendDisplay() {
            var x = document.getElementById("etrend");
            var k = document.querySelector(".lenyil1");
            if (x.style.display === "none") {
                x.style.display = "block";
                k.src = "./kepek/down-arrow.png";
            } else {
                x.style.display = "none";
                k.src = "./kepek/up-arrow.png";
            }
        }

        function konyhaDisplay() {
            var x = document.getElementById("konyha");
            var k = document.querySelector(".lenyil2");
            if (x.style.display === "none") {
                x.style.display = "block";
                k.src = "./kepek/down-arrow.png";
            } else {
                x.style.display = "none";
                k.src = "./kepek/up-arrow.png";
            }
        }

        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value; // Display the default slider value

        // Update the current slider value (each time you drag the slider handle)
        slider.oninput = function() {
        output.innerHTML = this.value;
        }
    </script>
</body>
</html>