<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM users WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['username']) ) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $birthdate = $_POST['szul_ido'];
  $email = $_POST['email'];
  $sql = 'UPDATE users SET teljes_nev=:name, username=:username, szul_ido=:birthdate, email=:email WHERE id=:id';
  $statement = $conn->prepare($sql);
  if ($statement->execute([':name' => $name, ':username' => $username, ':birthdate' => $birthdate, ':email' => $email, ':id' => $id])) {
    header("Location: admin.php");
  }



}


 ?>
<?php $cim="Szerkesztés"; include 'header.php'; ?>
<span class="hatter"></span>   
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Felhasználó Szerkesztése</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group edit">
          <label for="name">Teljes név</label>
          <input value="<?= $person->teljes_nev; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="Felhasznalonev">Felhasználónév</label>
          <input type="name" value="<?= $person->username; ?>" name="username" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="szul_ido">Születési idő</label>
          <input type="date" value="<?= $person->szul_ido; ?>" name="szul_ido" id="szul_ido" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Adatok frissítése</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
