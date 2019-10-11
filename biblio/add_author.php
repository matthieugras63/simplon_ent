<?php require_once('connect.php'); ?>

	<?php
		$error= "";
		if (isset($_POST['add_author'])) {		//name n'existe pas lorsqu' on lance la page donc on rentre dans la condition seulement si on submit(cela créer name)
			if (empty($_POST['add_author']) || $_POST['add_author'] ==" ") {										
				$error = "vide";
				?><p class="error">Error, enter a author please</p><?php
			}
			else{
				$data = $_POST['add_author'];
				$sql = "INSERT INTO author (name) values ('$data');"; 
				$result = mysqli_query($link,$sql);
				?><p class="correct">Successful author addition</p><?php
			}
		}
	?>