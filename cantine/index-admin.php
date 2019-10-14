<?php require_once '../connect.php'; ?>
<link rel="stylesheet" href="style.css">


<?php

// Session ouverte
session_start();
$_SESSION['admin'] = 'admin';
//Integration de la page de Connexion
// require_once('connect.php');

// Verification : Session existe ?
if(isset($_SESSION['admin'])){
?>
<!DOCTYPE html>
<html lang='fr' dir='ltr'>
<head>
	<meta charset="utf-8">
	<title>Cantine :: Admin</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<main>
		<div>
      <h2>Bienvenu, <?php echo $_SESSION['admin']; ?></h2>
      <a href="./disconnect.php">Se deconnecter</a>
    </div>
		<h1>MENUS DE LA SEMAINE</h1>
	<?php
		//Selection de la table menu
		$sql = "SELECT * FROM menu";
		// Recuperation des données (de la requete sql)
		$select = mysqli_query($link, $sql);
		//Boucle permettant l'affichage des données de la table menu
		while($s = mysqli_fetch_assoc($select)){
			?>
			<div class="modify">
				<!-- Jour de la semaine -->
				<h2><?php echo $s['day']; ?></h2>
				<!-- Formulaire pré-rempli pour chaque jour de la semaine -->
				<form method="POST" action="update.php?id=<?php echo $s['id'];?>">
					<!-- Plat A -->
					<input onFocus="this.select()" type="text" name="plate_a" value="<?php echo $s['plate_a']; ?>">
					<!-- Plat B -->
					<input onFocus="this.select()" type="text" name="plate_b" value="<?php echo $s['plate_b']; ?>">
					<!-- Plat C -->
					<input onFocus="this.select()" type="text" name="plate_c" value="<?php echo $s['plate_c']; ?>">
					<!-- Bouton d'envoi -->
					<input onFocus="this.select()" type="submit" name="update" value="Modifier">
				</form>
			</div>
		<?php
		}
		?>

	</main>
<?php
}
// Si Session inexistante -> Redirection vers la page de connexion
else{
	header('Location: index.php');
}
?>
</body>
</html>
