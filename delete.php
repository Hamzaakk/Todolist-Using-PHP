<?php 
require_once './includes/database.php';
$id=$_GET['id'];
$query=$pdo->prepare("delete from task where id = $id");
$query->execute();
header('location:./index.php');
exit();




