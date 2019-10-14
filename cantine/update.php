<?php require_once '../connect.php'; ?>

<?php

// Session ouverte
session_start();

//Integration de la page de Connexion
// require_once('connect.php');

$id = $_GET['id'];

if(isset($id) && $id > 0){

		$plate_a = $_POST['plate_a'];
		$plate_b = $_POST['plate_b'];
		$plate_c = $_POST['plate_c'];

		$sql = "UPDATE menu SET plate_a ='$plate_a', plate_b = '$plate_b', plate_c ='$plate_c' WHERE id = $id";
		$select = mysqli_query($link, $sql);
		header('Location: index-admin.php');

}
// if(isset($_SESSION[''])){

// }
