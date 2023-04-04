<?php
session_start();
require 'db.php';
$sql = 'SELECT * FROM users';
$statement = $conn->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinamikus Receptek - Admin Felület</title>
    <link href="http://fonts.cdnfonts.com/css/gentium-book-basic" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./kepek/favicon.png">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/szurok.css">
    <link rel="stylesheet" href="./css/receptek.css">
    <link rel="stylesheet" href="./css/styles.css">
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
    
<span class="hatter"></span>   
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Felhasználók</h2>
    </div>
   
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Teljes név</th>
          <th>Felhasználónév</th>
          <th>Születési Idő</th>
          <th>Létrehozva</th>
          <th>Email cím</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->teljes_nev; ?></td>
            <td><?= $person->username; ?></td>
            <td><?= $person->szul_ido; ?></td>
            <td><?= $person->created_at; ?></td>
            <td><?= $person->email; ?></td>

            <td>
              <button class="btn btn-edit" href="edit.php?id=<?= $person->id ?>"><a href="edit.php?id=<?= $person->id ?>" >Szerkesztés</a></button>
              <button class='btn btn-delete'><a onclick="return confirm('Biztosan torolni szeretne a felhasznalot?')" href="delete.php?id=<?= $person->id ?>" >Törlés</a></button>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
