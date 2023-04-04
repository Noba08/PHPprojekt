<?php
session_start();
require 'db.php';
$user = $_SESSION["user"];
$sql = 'SELECT * FROM receptek WHERE feltolto = :user';
$statement = $conn->prepare($sql);
$statement->bindParam(":user", $user);
$statement->execute();
$receptek = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>


<?php 
$cim="Saját Receptek";
if($_SESSION["user"] == "Admin"){
    require 'header.php';
} else {
    require 'simaheader.php';
}

?>
<span class="hatter"></span>   
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Receptek</h2>
    </div>
   
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Név</th>
          <th>Leírás</th>
          <th>Nehézség</th>
          <th>Hozzávalók</th>
          <th>Elkészítési idő</th>
          <th>Nemzetiség</th>


        </tr>
        <?php foreach($receptek as $recept): ?>
          <tr>
            <td><?= $recept->id; ?></td>
            <td><?= $recept->nev; ?></td>
            <td><?= $recept->leiras; ?></td>
            <td><?= $recept->nehezseg; ?></td>
            <td><?= $recept->hozzavalok; ?></td>
            <td><?= $recept->elkeszitesi_ido; ?></td>
            <td><?= $recept->ertekeles; ?></td>
            <td><?= $recept->nemzetiseg; ?></td>


            <td>
              <button class="btn btn-edit" href="recept-edit.php?id=<?= $recept->id ?>"><a href="recept-edit.php?id=<?= $recept->id ?>" >Szerkesztés</a></button>
              <button class='btn btn-delete'><a onclick="return confirm('Biztosan törölni szeretné ezt a receptet?')" href="recept-delete.php?id=<?= $recept->id ?>" >Törlés</a></button>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
