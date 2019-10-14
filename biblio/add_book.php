<?php require_once('../connect.php'); ?>
		<?php

		$error= "";
		if (isset($_POST['name'])) {

			if (empty($_POST['name']) || $_POST['name'] ==" " || empty($_POST['date']) || $_POST['date'] ==" ") {
				$error = "vide";
				?><p class="error">Error, enter the name/date of the book please</p><?php
			}
			else{
				$array_id = array(); // tabelau pour stocker les id
				$array_form = array(
				    "genre" => $_POST['book_genre'],			//on met les valeur de category brand color recupérer dans un tableau associatif
				    "author" => $_POST['book_author'],
				);												//3 colonnes dans pruduct sont des id  donc -->
				foreach ($array_form as $key => $value) {			//pour chaque association dans ce tableau, slectionner l'id correspondant
					$result = mysqli_query($link,"SELECT id from $key where name = '$value'") or die (mysqli_error($link));
					$row = mysqli_fetch_row($result);
					$array_id[$key][] = $row[0];				// on stock les id dans le tableau
				}

				$sql = "INSERT into book (id,name,dispo,date,id_genre,id_author)
				values (NULL,
				'{$_POST['name']}',
				'disponible',
				'{$_POST['date']}',
				'{$array_id['genre'][0]}',
				'{$array_id['author'][0]}')";
				$result = mysqli_query($link,$sql) or die (mysqli_error($link));

				?><p class="correct">Successful book addition</p><?php
				}
			}
