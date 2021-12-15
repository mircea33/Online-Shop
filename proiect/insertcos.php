<?php
require 'db_connection.php';
require_once "ShoppingCart.php";
session_start();


    
    // check username and email empty or not

        
        // Escape special characters.
        $product_id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['product_id']));
	   $quantity = mysqli_real_escape_string($conn, htmlspecialchars($_POST['quantity']));
        $id_client = $_SESSION['iduser'];
                
                // INSERT USERS DATA INTO THE DATABASE
                $insert_query = mysqli_query($conn,"INSERT INTO cos(product_id,quantity,id_client) VALUES('$product_id','$quantity','$id_client')");

                //CHECK DATA INSERTED OR NOT
                if($insert_query){
                    echo "<script>
                    alert('Data inserted');
                    window.location.href = 'magazin.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
                
                
            
            
            
        
    
    

?>