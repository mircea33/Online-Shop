<?php
require 'db_connection.php';

if(isset($_GET['idprodus']) && is_numeric($_GET['idprodus'])){
    
    $idprodus = $_GET['idprodus'];
    $produs = mysqli_query($conn,"SELECT * FROM produse WHERE idprodus='$idprodus'");
    
  //  if(mysqli_num_rows($get_user) === 1){
        
        $row = mysqli_fetch_assoc($produs);
  }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produs</title>
</head>

<body>
<img src="<?php echo $row['image'];?>?>">
<form action="insertcos.php" method="post">
Id Produs:<input type="text" size='1' name="product_id" value="<?php echo"$idprodus" ?>" />
<p> Cantitate:
<input type="text" name="quantity" value="1" size="2" />
 <input type="submit" value="Adaugare cos">
 </form>
<h3>Descriere:</h3>
<?php echo $row['descriere'];?>

 
 
</body>
<p>
<a href="magazin.php">Inapoi magazin</a></div>
</html>