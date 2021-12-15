<?php
require 'db_connection.php';
// function for getting data from database
function get_all_data($conn){
    $get_data = mysqli_query($conn,"SELECT * FROM produse");
    if(mysqli_num_rows($get_data) > 0){
        echo '<table>
              <tr>
                <th>Nume</th>
				<th>Descriere</th>
				<th>Imagine</th>
                <th>Pret</th> 
				<th>Categorie</th>
                <th>Action</th> 
              </tr>';
        while($row = mysqli_fetch_assoc($get_data)){
           
            echo '<tr>
            <td>'.$row['name'].'</td>
            <td>'.$row['descriere'].'</td>
			 <td>'.$row['image'].'</td>
			<td>'.$row['price'].'</td>
            <td>'.$row['categorie'].'</td>
            <td>
            <a href="update.php?idprodus='.$row['idprodus'].'">Edit</a>
            <a href="delete.php?idprodus='.$row['idprodus'].'">Delete</a>
            </td>
            </tr>';

        }
        echo '</table>';
    }else{
        echo "<h3>No records found. Please insert some records</h3>";
    }
}
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>

<body>
    <div class="container">
<a href="cereri.php">Stare cereri</a></div>
       <!-- INSERT DATA -->
        <div class="form">
            <h2>Inserare</h2>
            <form action="insert.php" method="post">
                <strong>Nume</strong><br>
                <input type="text" name="name"  required><br>
                <strong>Descriere</strong><br>
                <input type="text" name="descriere"  required><br>
				<strong>Poza</strong><br>
                <input type="file" name="image"  ><br>
				<strong>Pret</strong><br>
                <input type="text" name="price"  required><br>
                <strong>Categorie</strong><br>
                <input type="text" name="categorie"  required><br>
                <input type="submit" value="Insert">
            </form>
        </div>
        <!-- END OF INSERT DATA SECTION -->
        <hr>
        <!-- SHOW DATA -->
        <h2>Date</h2>
        <?php 
        // calling get_all_data function
        get_all_data($conn); 
        ?>
        <!-- END OF SHOW DATA SECTION -->
    </div>
</body>

</html>