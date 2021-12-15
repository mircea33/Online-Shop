<?php
require 'db_connection.php';
// function for getting data from database
function get_all_data($conn){
    $data = mysqli_query($conn,"SELECT * FROM cos");
    if(mysqli_num_rows($data) > 0){
        echo '<table>
              <tr>
			  <th>Idcos</th>
                <th>Produs</th>
				<th>Cantitate</th>
				<th>Client</th>
                <th>Starecerere</th> 
                <th>Action</th> 
              </tr>';
        while($row = mysqli_fetch_assoc($data)){
           
            echo '<tr>
            <td>'.$row['idcos'].'</td>
            <td>'.$row['product_id'].'</td>
			<td>'.$row['quantity'].'</td>
			<td>'.$row['id_client'].'</td>
            <td>'.$row['starecerere'].'</td>
            <td>
            <a href="updatecereri.php?idcos='.$row['idcos'].'">Edit</a> |
            <a href="deletecos.php?idcos='.$row['idcos'].'">Delete</a>
            </td>
            </tr>';

        }
        echo '</table>';
    }else{
        echo "<h3>No records found. Please insert some records</h3>";
    }
}
?>
<?php 
        // calling get_all_data function
        get_all_data($conn); 
        ?>
<a href="index.php">Inapoi</a></div>