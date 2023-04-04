<?php
session_start();
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
$msg="";
$error="";
$imgs="./images";

if(isset($_POST['save'])){
        $rname=htmlspecialchars($_POST['rname']);
        $txt=htmlspecialchars($_POST['leiras']);
        $tm=htmlspecialchars($_POST['time']);
        $lvl=htmlspecialchars($_POST['level']);
        $ing=htmlspecialchars($_POST['ing']);
        $region=htmlspecialchars($_POST['reg']);
        $username=$_SESSION['user'];
        try {
            if (is_uploaded_file($_FILES["img"]["tmp_name"])){
                $fajlnev = basename($_FILES["img"]["name"]);
                $kiterjesztes = strtolower(pathinfo($fajlnev,PATHINFO_EXTENSION));
                $meret = intval($_FILES["img"]["size"]);
                $tipus = $_FILES["img"]["type"];
                $celfajl = $imgs."/".$fajlnev;


                if ($meret > (1024*1024)){
                    throw new Exception("Túl nagy méretű a fájl");
                }
                if (!($kiterjesztes=="jpg" && $tipus=="image/jpeg") && !($kiterjesztes=="png" && $tipus=="image/png")){
                    throw new Exception("Hibás fájlformátum");
                }
                if (!move_uploaded_file($_FILES["img"]["tmp_name"],$celfajl)){
                    throw new Exception("Sikertelen mentés");
                }
            }else {
                $celfajl=$imgs."./images/nopicture.png";
            }
        }catch (Exception $e){
            $error .= "Fájl mentési hiba: ".$e->getMessage();
        }
        $ert=0;
        try {
            $sql="INSERT INTO receptek (nev,leiras,nehezseg,hozzavalok,elkeszitesi_ido,ertekeles,feltolto,imgurl,nemzetiseg) VALUES (:rname,:txt,:lvl,:ing,:tm,:ert,:username,:url,:reg)";
            $newRecipe=$conn->prepare($sql);
            $newRecipe->bindParam(':rname',$rname);
            $newRecipe->bindParam(':txt',$txt);
            $newRecipe->bindParam(':tm',$tm);
            $newRecipe->bindParam(':lvl',$lvl);
            $newRecipe->bindParam(':url',$celfajl);
            $newRecipe->bindParam(':ert',$ert);
            $newRecipe->bindParam(':ing',$ing);
            $newRecipe->bindParam(':reg',$region);
            $newRecipe->bindParam(':username',$username);
            $newRecipe->bindParam(':ert',$ert);
            $newRecipe->execute();

            
            if(isset($_POST['vg'])){$vg=true;}else{$vg=false;}
            if(isset($_POST['vn'])){$vn=true;}else{$vn=false;}
            if(isset($_POST['gm'])){$gm=true;}else{$gm=false;}
            if(isset($_POST['lm'])){$lm=true;}else{$lm=false;}
            if(isset($_POST['tm'])){$tm=true;}else{$tm=false;}
            if(isset($_POST['sm'])){$sm=true;}else{$sm=false;}
            if(isset($_POST['cm'])){$cm=true;}else{$cm=false;}
            if(isset($_POST['km'])){$km=true;}else{$km=false;}

            $query="SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'receptek1' AND TABLE_NAME = 'receptek'";
            $getId=$conn->prepare($query);
            $getId->execute();
            $id = $getId->fetch(PDO::FETCH_NUM);
            $rid=$id[0]-1;

            $sql2="INSERT INTO szurok(recept_id,vegetarianus,vegan,gluten,laktoz,tojas,szoja,cukor,kukorica)
            VALUES (:recept_id,:vegetarianus,:vegan,:glutenmentes,:laktozmentes,:tojasmentes,:szojamentes,:cukormentes,:kukoricamentes)";
            $newFilters=$conn->prepare($sql2);
            $newFilters->bindParam(":recept_id",$rid);
            $newFilters->bindParam(":vegetarianus",$vg);
            $newFilters->bindParam(":vegan",$vn);
            $newFilters->bindParam(":glutenmentes",$gm);
            $newFilters->bindParam(":laktozmentes",$lm);
            $newFilters->bindParam(":tojasmentes",$tm);
            $newFilters->bindParam(":szojamentes",$sm);
            $newFilters->bindParam(":cukormentes",$cm);
            $newFilters->bindParam(":kukoricamentes",$km);
            $newFilters->execute();
        }catch(PDOException $e){
            echo "Recept mentési hiba: ".$e->getMessage();
        }
        echo "<script>";
        echo "alert('Recept mentése sikeresen megtörtént!')";
        echo "</script>";
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saját recept</title>
    <link href="http://fonts.cdnfonts.com/css/gentium-book-basic" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.png">
	<script src="keszites.js" async></script>
    <link rel="stylesheet" href="./css/keszites.css">
    <link rel="stylesheet" href="./css/header.css">

</head>
<body>
<form action="?php echo htmlspecialchars($_SERVER[PHP_SELF]);?>" method="post" enctype="multipart/form-data">
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
    <span class="hatter"></span>

<form method="post">
<div class="diy">

	<h2>Készítsünk saját receptet!</h2>
	<div class="name">
		<h3>Étel neve: </h3>
        <form method="post">
		    <input type="text" name="rname" id="rname">
        </form>
	</div>
	<div class="kep">
	
		<img src="images/nopicture.png" id="kep">
		<input type="file" id="logo2" name="img" onchange="putImage()">
	</div>
		
	<div class="lista">
		<h3>Hozzávalók:</h3>
			<div id="myDIV" class="header">
				<textarea id="hozzavalo"  name="ing" rows="20" cols="90" placeholder="Ide írja a hozzávalókat vesszővel elválasztva!"></textarea>
				<br>
			</div>
	</div>
	
	<div class="elkeszit">
		<h3>Elkészítés:</h3>
		    <textarea id="leiras"  name="leiras" rows="40" cols="90"></textarea>
	</div>
	
	<div class="ido">
		<label for="quantity">Elkészítési idő:</label><br>
		<input type="number" name="time" min="1"> perc<br>
		<br>
		<label for="level">Elkészítés nehézsége:</label><br>
        <select name="level">
			<option></option>
			<option>Könnyű</option>
			<option>Átlagos</option>
			<option>Nehéz</option>
		</select><br>
		<br>

		<label for="reg">Étel nemzetiség:</label><br>
        <select name="reg">
			<option></option>
			<option>Magyaros</option>
			<option>Amerikai</option>
			<option>Indiai</option>
			<option>Olaszos</option>
			<option>Kínai</option>
			<option>Francia</option>
			<option>Japán</option>
			<option>Brit</option>
			<option>Német</option>
			<option>Egyéb</option>

		</select>
	</div>
	
	<div class="filter">
		<h3>Szűrők:</h3>
			<div class="chk">
				<input type="checkbox" name="vg" value="1">Vegetariánus<br>
				<input type="checkbox" name="vn" value="2">Vegán<br>
				<input type="checkbox" name="gm" value="3">Gluténmentes<br>
				<input type="checkbox" name="lm" value="4">Laktózmentes<br>
				<input type="checkbox" name="tm" value="5">Tojásmentes<br>
				<input type="checkbox" name="sm" value="6">Szójamentes<br>
				<input type="checkbox" name="cm" value="7">Cukormentes<br>
				<input type="checkbox" name="km" value="8">Kukoricamentes<br>
			</div>
	</div>
	    <input type="submit" name="save" class="gomb" value="RECEPT MENTÉSE">
</div>
</form>
</body>
</html>