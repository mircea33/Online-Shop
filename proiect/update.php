<?php
require 'db_connection.php';
if(isset($_GET['idprodus']) && is_numeric($_GET['idprodus'])){
    
    $idprodus = $_GET['idprodus'];
    $produs = mysqli_query($conn,"SELECT * FROM produse WHERE idprodus='$idprodus'");
    
  //  if(mysqli_num_rows($get_user) === 1){
        
        $row = mysqli_fetch_assoc($produs);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
     <div class="container">
      
       <!-- UPDATE DATA -->
        <div class="form">
            <h2>Update</h2>
            <form action="" method="post">
                <strong>Nume</strong><br>
                <input type="text"  name="name" value="<?php echo $row['name'];?>" required><br>
                <strong>Descriere</strong><br>
                <input type="text"  name="descriere" value="<?php echo $row['descriere'];?>" required><br>
				<strong>Poza</strong><br>
                <input type="text"  name="image" value="<?php echo $row['image'];?>" ><br>
                <strong>Pret</strong><br>
                <input type="text"  name="price" value="<?php echo $row['price'];?>" required><br>
				<strong>Categorie</strong><br>
                <input type="text"  name="categorie" value="<?php echo $row['categorie'];?>" required><br>
                <input type="submit" value="Update">
            </form>
        </div>
        <!-- END OF UPDATE DATA SECTION -->
    </div>
</body>
</html>
<?php

    }else{
        // set header response code
        http_response_code(404);
        echo "<h1>404 Page Not Found!</h1>";
    }
    



/* ---------------------------------------------------------------------------
------------------------------------------------------------------------------ */


// UPDATING DATA

if(isset($_POST['name']) && isset($_POST['descriere'])){
    
    // check username and email empty or not
    if(!empty($_POST['name']) && !empty($_POST['descriere'])){
        
        // Escape special characters.
        $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name']));
        $descriere = mysqli_real_escape_string($conn, htmlspecialchars($_POST['descriere']));
		$image = mysqli_real_escape_string($conn, htmlspecialchars($_POST['image']));
        $price = mysqli_real_escape_string($conn, htmlspecialchars($_POST['price']));
		$categorie = mysqli_real_escape_string($conn, htmlspecialchars($_POST['categorie']));
        
                
                // UPDATE USER DATA               
                $update_query = mysqli_query($conn,"UPDATE produse SET name='$name',descriere='$descriere',image='$image',price='$price',categorie='$categorie' WHERE idprodus='$idprodus'");

                //CHECK DATA UPDATED OR NOT
                if($update_query){
                    echo "<script>
                    alert('Data Updated');
                    window.location.href = 'index.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
            }
}
?>