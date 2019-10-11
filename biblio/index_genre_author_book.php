<?php require_once('add_genre.php'); ?>
<?php require_once('add_author.php'); ?>
<?php require_once('add_book.php'); ?>


	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	    <meta charset="utf-8">
	    <link rel="stylesheet" type="text/css" href="">
	</head>
	<body>

		<!--add genre-->
		<form method="post" action="" id="add_genre">
			<label for="add_genre">genre</label>
			<input type="text" name="add_genre">
			<input type="submit" name="ok" value="Add">
		</form>

		<!--delete genre-->

		<!--add author-->
		<form method="post" action="" id="add_author">
			<label for="add_author">author</label>
			<input type="text" name="add_author">
			<input type="submit" name="ok" value="Add">
		</form>

		<h2>book</h2>
		<form method="post" action="" id="add_book">
			<p>
				<label for="name">Name:</label>
				<input type="text" name="name">
			</p>

			<p>
				<label for="date">date (ex:1889-12-31 23:59:59):</label>	
				<input type="text" name="date">
			</p>

			<p>
				<label for="book_genre">genre:</label>
				<select name="book_genre" form="add_book">
					<?php
					$sql = "SELECT name from genre ";
		            $req = mysqli_query($link,$sql); 
		            while($row = mysqli_fetch_array($req)){		
		        	   echo '<option value="'.$row[0].'">'.$row[0].'</option>';	   
		            }
		            mysqli_free_result ($req); 
		            ?>
				</select>
			</p>
			<p>
				<label for="book_author">author:</label>
				<select name="book_author" form="add_book">
					<?php
					$sql = "SELECT name from author ";
		            $req = mysqli_query($link,$sql); 
		            while($row = mysqli_fetch_array($req)){		
		        	   echo '<option value="'.$row[0].'">'.$row[0].'</option>';	   
		            }
		            mysqli_free_result ($req); 
		            ?>
				</select>
			</p>

			<p class="ok_product">
				<input type="submit" name="ok" value="Add">
			</p>
		</form>

</body>
</html>
