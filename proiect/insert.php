<?php
require 'db_connection.php';

if(isset($_POST['name']) && isset($_POST['price'])){
    
    // check username and email empty or not
    if(!empty($_POST['name']) && !empty($_POST['price'])){
        
        // Escape special characters.
        $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name']));
       $descriere = mysqli_real_escape_string($conn, htmlspecialchars($_POST['descriere']));
	   $image = mysqli_real_escape_string($conn, htmlspecialchars($_POST['image']));
        $price = mysqli_real_escape_string($conn, htmlspecialchars($_POST['price']));
       $categorie = mysqli_real_escape_string($conn, htmlspecialchars($_POST['categorie']));
                
                // INSERT USERS DATA INTO THE DATABASE
                $insert_query = mysqli_query($conn,"INSERT INTO produse(name,descriere,image,price,categorie) VALUES('$name','$descriere','img/$image','$price','$categorie')");

                //CHECK DATA INSERTED OR NOT
                if($insert_query){
                    echo "<script>
                    alert('Data inserted');
                    window.location.href = 'index.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
                
                
            }
            
            
        }
        
    else{
        echo "<h4>Please fill all fields</h4>";
    }
    

?>