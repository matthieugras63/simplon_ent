<?php require_once "connect.php" ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">

    <title>Accueil Bibliotheque</title>
</head>

<body>
<a href="index_genre_author_book.php"> Biblio Management</a>
    <div id='search'>

        <form id="deleteForm" method="POST" action="">
            <label for="author">Auteur</label>
            <input type="text" id="author" name="author" value='' />
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" value='' />
            <label for="Dispo">Disponibilité</label>
            <select name="dispo_name" id="dispo_name">
                <option>Dispo</option>
                <option>Réservé</option>
                <option>Emprunté</option>
            </select>
            <input id="btn" type="submit" name="submit" value="Rechercher" />

        </form>
    </div>

    <div id="table_search">
        <?php
 if (!empty($_POST["submit"]) && !empty($_POST["title"])) {
    // $author = $_POST['author'];
    $title = $_POST['title'];
    $visu_bibli =  "SELECT id, name, id_author, dispo FROM book where book.name like '%$title%'";


   
    
       
       
        //exécution de la requête:
        $request = mysqli_query($link, $visu_bibli);

        echo "<table id='tab'>
<thead>
						<tr>
							<th>Id</th>
							<th>Titre du livre </th>
							<th>Auteur</th>
							<th>Disponibilité</th>
                            <th>Editer</th>
							
                        </tr> 
                        </thead>";

        //affichage des données:
        while ($result = mysqli_fetch_array($request)) {

            echo "
       <tr>
           <td>{$result['id']}</td>
           <td>{$result['name']}</td>
           <td>{$result['id_author']}</td>
           <td>{$result['dispo']}</td>
           <td><img id='edit' src='edit.jpg'></td>
       </tr>
       
       </table>";
        }
    }

        ?>
    </div>






















</body>

</html>