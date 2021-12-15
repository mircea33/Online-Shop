<?php
require_once "ShoppingCart.php";
include "meniu.html"?>
<html>
<HEAD>
<TITLE>Creare cos cumparaturi </TITLE>

</HEAD>
<BODY>

<style>
.product-item{
	display: inline-block;
}
</style>

<div id="product-grid">
 <div class="txt-heading"><div class="txt-heading-label">Products</div></div>
 <?php
$shoppingCart = new ShoppingCart();
 $query = "SELECT * FROM produse";
 $product_array = $shoppingCart->getAllProduct($query);
 if (! empty($product_array)) {
 foreach ($product_array as $key => $value) {
 ?>
 <div class="product-item" >
 <form method="post" action="cos.php?action=add&descriere=<?php echo
$product_array[$key]["descriere"]; ?>">
 <div class="product-image">
 <img src="<?php echo $product_array[$key]["image"]; ?>">
 </div>
 <div>
 <strong><a href="produs.php?idprodus=<?php echo $product_array[$key]["idprodus"]; ?>""><?php echo $product_array[$key]["name"]; ?></a></strong>
 </div>
 <div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
 <div>
 <input type="text" name="quantity" value="1" size="2" />
 <input type="submit" value="Add to cart"  />

 </div>
 </form>
 </div>

 <?php
 }
 }
 ?>

</div>
</BODY>
</html>
