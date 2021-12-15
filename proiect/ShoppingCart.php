<?php
require_once "DBController.php";
class ShoppingCart extends DBController
{
function getAllProduct()
 {
 $query = "SELECT * FROM produse";

 $productResult = $this->getDBResult($query);
 return $productResult;
 }
 
function getProduct()
 {
 $query = "SELECT * FROM produse WHERE categorie='casnice'";

 $productResult = $this->getDBResult($query);
 return $productResult;
 }
 function getProductscoala()
 {
 $query = "SELECT * FROM produse WHERE categorie='scoala'";

 $productResult = $this->getDBResult($query);
 return $productResult;
 }

 function getProduc()
 {
 $query = "SELECT * FROM produse WHERE idprodus=1";

 $productResult = $this->getDBResult($query);
 return $productResult;
 } 
 
 
 function getMemberCartItem($member_id)
 {
 $query = "SELECT produse.*, cos.idcos as cart_id,cos.quantity FROM produse,
cos WHERE
 produse.idprodus = cos.product_id AND cos.id_client = ?";

 $params = array(
 array(
 "param_type" => "i",
 "param_value" => $member_id
 )
 );

 $cartResult = $this->getDBResult($query, $params);
 return $cartResult;
 }
 function getProductByCode($product_code)
 {
 $query = "SELECT * FROM produse WHERE descriere=?";

 $params = array(
 array(
 "param_type" => "s",
 "param_value" => $product_code
 )
 );

 $productResult = $this->getDBResult($query, $params);
 return $productResult;
 }
 function getCartItemByProduct($product_id, $member_id)
 {
 $query = "SELECT * FROM cos WHERE product_id = ? AND id_client = ?";

 $params = array(
 array(
 "param_type" => "i",
 "param_value" => $product_id
 ),
 array(
 "param_type" => "i",
 "param_value" => $member_id
 )
 );

 $cartResult = $this->getDBResult($query, $params);
 return $cartResult;
 }
 function addToCart($product_id, $quantity, $member_id)
 {
 $query = "INSERT INTO cos (product_id,quantity,id_client) VALUES (?, ?, ?)";

 $params = array(
 array(
 "param_type" => "i",
 "param_value" => $product_id
 ),
 array(
 "param_type" => "i",
 "param_value" => $quantity
 ),
 array(
 "param_type" => "i",
 "param_value" => $member_id
 )
 );

 $this->updateDB($query, $params);
 }
 function updateCartQuantity($quantity, $cart_id)
 {
 $query = "UPDATE cos SET quantity = ? WHERE idcos= ?";

 $params = array(
 array(
 "param_type" => "i",
 "param_value" => $quantity
 ),
 array(
 "param_type" => "i",
 "param_value" => $cart_id
 )
 );
 $this->updateDB($query, $params);
 }
 function deleteCartItem($cart_id)
 {
 $query = "DELETE FROM cos WHERE idcos = ?";

 $params = array(
 array(
 "param_type" => "i",
 "param_value" => $cart_id
 )
 );

 $this->updateDB($query, $params);
 }
 function emptyCart($member_id)
 {
 $query = "DELETE FROM cos WHERE id_client = ?";

 $params = array(
 array(
 "param_type" => "i",
 "param_value" => $member_id
 )
 );

 $this->updateDB($query, $params);
 }
}
