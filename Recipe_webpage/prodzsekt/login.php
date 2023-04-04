<?php
session_start();
require_once('db.php');
 
if(isset($_POST['submit']))
{
	if(isset($_POST['username'],$_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']))
	{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
 
			$sql = "SELECT * FROM users WHERE username = :username ";
			$handle = $conn->prepare($sql);
			$params = ['username'=>$username];
			$handle->execute($params);
			if($handle->rowCount() > 0)
			{
				$getRow = $handle->fetch(PDO::FETCH_ASSOC);
				if($password == $getRow['pw'])
				{
					unset($getRow['pw']);
                    $_SESSION["user"] = $username;

					header('location:index.php');
				}
				else
				{
					$errors[] = "Wrong Email or Password";
				}
			}
			else
			{
				$errors[] = "Wrong Email or Password";
			}
			
		}
		else
		{
			$errors[] = "Email address is not valid";	
		}
 
	}
	else
	{
		$errors[] = "Email and Password are required";	
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
    <link rel="icon" type="image/x-icon" href="favicon.png">
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
      <h2>Bejelentkezés</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post" action="login.php">
        <div class="form-group">
          <label for="username">Felhasználónév</label>
          <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="pw">Jelszó</label>
          <input type="password" name="password" id="pw" class="form-control">
        </div>
        <div class="form-group">
		

          <input type="submit" class="btn btn-info" value="bejelentkezés" name="submit" /><br><br>
          <a href="regisztracio.php" id="register">Ha még nincs fiókja, regisztráljon</a>
        </div>

      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
