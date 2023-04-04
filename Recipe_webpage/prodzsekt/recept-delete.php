<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM receptek WHERE id=:id';
$statement = $conn->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: /sajat.php");
}