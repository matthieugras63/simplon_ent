<?php require_once('../connect.php'); ?>

	<?php
		$error= "";
		if (isset($_POST['add_genre'])) {		//name n'existe pas lorsqu' on lance la page donc on rentre dans la condition seulement si on submit(cela créer name)
			if (empty($_POST['add_genre']) || $_POST['add_genre'] ==" ") {
				$error = "vide";
				?><p class="error">Error, enter a genre please</p><?php
			}
			else{
				$data = $_POST['add_genre'];
				$sql = "INSERT INTO genre (name) values ('$data');";
				$result = mysqli_query($link,$sql);
				?><p class="correct">Successful genre addition</p><?php
			}
		}
	?>
