<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM receptek WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute([':id' => $id ]);
$recept = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['username']) ) {
  $name = $_POST['name'];
  $nehezseg = $_POST['nehezseg'];
  $hozzavalok = $_POST['hozzavalok'];
  $elkeszitesi_ido = $_POST['elkeszitesi_ido'];
  $ertekeles = $_POST['ertekeles'];
  $leiras = $_POST["leiras"];
  $nemzetiseg = $_POST['nemzetiseg'];
  $sql = 'UPDATE receptek SET nev=:name, nehezseg=:nehezseg,leiras = :leiras, hozzavalok=:hozzavalok, elkeszitesi_ido=:elkeszitesi_ido, ertekeles=:ertekeles, nemzetiseg=:nemzetiseg WHERE id=:id';
  $statement = $conn->prepare($sql);
  if ($statement->execute([':name' => $name, ':nehezseg' => $nehezseg,':leiras' => $leiras,':hozzavalok' => $hozzavalok, ':elkeszitesi_ido' => $elkeszitesi_ido,':ertekeles' => $ertekeles,  ':nemzetiseg' => $nemzetiseg, ':id' => $id])) {
    header("Location: /index.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<span class="hatter"></span>   
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Recept szerkesztése</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Név</label>
          <input value="<?= $recept->nev; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="nehezseg">Nehézseg</label>
          <input type="text" value="<?= $recept->nehezseg; ?>" name="nehezseg" id="nehezseg" class="form-control">
        </div>
        <div class="form-group">
          <label for="hozzavalok">Hozzávalók</label>
          <input type="text" value="<?= $recept->hozzavalok; ?>" name="hozzavalok" id="hozzavalok" class="form-control">
        </div>
        <div class="form-group">
          <label for="leir's">Leir's</label>
          <input type="text" value="<?= $recept->leiras; ?>" name="leiras" id="leiras" class="form-control">
        </div>
        <div class="form-group">
          <label for="elkeszitesi_ido">Elkészítési idő</label>
          <input type="text" value="<?= $recept->elkeszitesi_ido; ?>" name="elkeszitesi_ido" id="elkeszitesi_ido" class="form-control">
        </div>
        <div class="form-group">
          <label for="ertekeles">Értékelés</label>
          <input type="text" value="<?= $recept->ertekeles; ?>" name="ertekeles" id="ertekeles" class="form-control">
        </div>
        <div class="form-group">
          <label for="text">Nemzetiség</label>
          <input type="text" value="<?= $recept->nemzetiseg; ?>" name="nemzetiseg" id="kategoria" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Adatok frissítése</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
