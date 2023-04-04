<?php
session_start();
$username = $_SESSION["user"];
require 'db.php';
$sql = 'SELECT * FROM users WHERE username=:username';
$statement = $conn->prepare($sql);
$statement->execute([':username' => $username ]);
$person = $statement->fetch(PDO::FETCH_OBJ);


 ?>
<?php include 'header.php'; ?>
<span class="hatter"></span>   
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>User szerkesztese</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group edit">
          <h2>Teljes név</h2>
          <h3><?= $person->teljes_nev; ?></h3>
        </div>
        <div class="form-group">
          <h2>Felhasználónév</h2>
          <h3><?= $person->username;?></h3>
        </div>
        <div class="form-group">
          <h2>Szuletesi ido</h2>
          <h3><?= $person->szul_ido; ?></h3>
        </div>
        <div class="form-group">
          <h2>Email</h2>
          <h3><?= $person->email; ?></h3>
        </div>
        <div class="form-group">
        <button class="btn btn-edit" href="profil-edit.php?id=<?= $person->id ?>"><a href="profil-edit.php?id=<?= $person->id ?>" >Szerkesztés</a></button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
