<?php
session_start();
$username=$_SESSION["user"];
require 'db.php';
$id = $_GET['id'];
$sql = 'INSERT INTO kedvencek (username, receptid) VALUES (:username,:id)';
$statement = $conn->prepare($sql);
if ($statement->execute([':id' => $id,':username' => $username])) {
    
}