<?php
session_start();
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['email']) ) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $birthdate = $_POST['szul_ido'];
  $pw = $_POST['pw'];
  $pwconfirm = $_POST['pwconfirm'];

  if($pw !== $pwconfirm) {
    echo "<p> Nem egyezik a jelszo </p>";
  }
  else {

  $sql = 'INSERT INTO users(username, teljes_nev, pw, szul_ido, email) VALUES(:username, :name, :pw, :birthdate, :email)';
  $statement = $conn->prepare($sql);
  if ($statement->execute([':username' => $username ,':name' => $name, ':pw' => $pw , ':birthdate' => $birthdate ,':email' => $email])) {
    $message = 'Sikeres regisztracio';
    $_SESSION["user"] = $username;
    header("Location: index.php");
  }

}

}


 ?>
<!doctype html>
<html lang="en">
<link href="http://fonts.cdnfonts.com/css/gentium-book-basic" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./kepek/favicon.png">
    
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/profil.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/szurok.css">
    <link rel="stylesheet" href="./css/receptek.css">
    <title>Dinamikus Receptek - Regisztráció</title>
<span class="hatter"></span>   
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
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Regisztráció</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Teljes Név</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="username">Felhasználónév</label>
          <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="szul_ido">Születési Idő</label>
          <input type="date" name="szul_ido" id="szul_ido" class="form-control">
        </div>
        <div class="form-group">
          <label for="pw">Jelszó</label>
          <input type="password" name="pw" id="pw" class="form-control">
        </div>
        <div class="form-group">
          <label for="pwconfirm">Jelszó Újra</label>
          <input type="password" name="pwconfirm" id="pwconfirm" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Regisztráció</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
