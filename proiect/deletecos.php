<?php
require 'db_connection.php';
if(isset($_GET['idcos']) && is_numeric($_GET['idcos'])){
    
    $idcos = $_GET['idcos'];
    $delete_idcos = mysqli_query($conn,"DELETE FROM cos WHERE idcos='$idcos'");
    
    if($delete_idcos){
        echo "<script>
        alert('Data Deleted');
        window.location.href = 'cereri.php';
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