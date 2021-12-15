<?php
require 'db_connection.php';
if(isset($_GET['idprodus']) && is_numeric($_GET['idprodus'])){
    
    $idprodus = $_GET['idprodus'];
    $delete_idprodus = mysqli_query($conn,"DELETE FROM produse WHERE idprodus='$idprodus'");
    
    if($delete_idprodus){
        echo "<script>
        alert('Data Deleted');
        window.location.href = 'index.php';
        </script>";
        exit;
    }else{
       echo "Opps something wrong!"; 
    }
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>