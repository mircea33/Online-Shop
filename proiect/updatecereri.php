<?php
require 'db_connection.php';
if(isset($_GET['idcos']) && is_numeric($_GET['idcos'])){
    
    $idcos = $_GET['idcos'];
    $cos = mysqli_query($conn,"SELECT * FROM cos WHERE idcos='$idcos'");
    
  //  if(mysqli_num_rows($get_user) === 1){
        
        $row = mysqli_fetch_assoc($cos);
    
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
                <strong>Idcos</strong><br>
                <input type="text"  name="idcos" value="<?php echo $row['idcos'];?>" ><br>
                <strong>Productid</strong><br>
                <input type="text"  name="product_id" value="<?php echo $row['product_id'];?>" ><br>
				<strong>Cantitate</strong><br>
                <input type="text"  name="quantity" value="<?php echo $row['quantity'];?>" ><br>
                <strong>Idclient</strong><br>
                <input type="block"  name="id_client" value="<?php echo $row['id_client'];?>"><br>
				<strong>Starecerere</strong><br>
                <input type="text"  name="starecerere" value="<?php echo $row['starecerere'];?>" required><br>
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

if(isset($_POST['idcos']) && isset($_POST['starecerere'])){
    
    // check username and email empty or not
    if(!empty($_POST['idcos']) && !empty($_POST['starecerere'])){
        
        // Escape special characters.
        $quantity = mysqli_real_escape_string($conn, htmlspecialchars($_POST['quantity']));
        $starecerere = mysqli_real_escape_string($conn, htmlspecialchars($_POST['starecerere']));
		
        
                
                // UPDATE USER DATA               
                $update_query = mysqli_query($conn,"UPDATE cos SET quantity='$quantity',starecerere='$starecerere' WHERE idcos='$idcos'");

                //CHECK DATA UPDATED OR NOT
                if($update_query){
                    echo "<script>
                    alert('Data Updated');
                    window.location.href = 'cereri.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
            }
}
?>