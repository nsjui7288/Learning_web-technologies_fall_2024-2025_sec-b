<?php 

session_start();
include("../controller/component.php");
include("../model/db.php");

 if(isset($_POST['remove'])){
    if($_GET['action']=='remove'){

        foreach($_SESSION['cart'] as $key=>$value){

            if($value["product_id"]==$_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('product has been removed')</script>";
                echo "<script>window.location='cart.php'</script>";
            }
        }
    }
 }

?>

<html>
<head>
   
    <title>Cart</title>
</head>
<body>
 </br>
 <h1>MY CART</h1> <hr> </br>
 <?php
 $con = connection();
 $total = 0;
 if(isset($_SESSION['cart'])){

    $product_id = array_column($_SESSION['cart'],'product_id');
$sql = "SELECT * FROM product";

 $result = mysqli_query($con,$sql);
 while($row = mysqli_fetch_assoc($result)){
    foreach($product_id as $id){
            if($row['id'] == $id){
            cartITEMS($row['image'],$row['name'],$row['price'],$row['id']);
                $total = $total + (float)$row['price'];
        }
    }
}
 }else{

echo "<h5>cart is empty!</h5>";
 }
?>
 <h3>price details</h3>

 <?php
 if(isset($_SESSION['cart'])){

    $count = count($_SESSION['cart']);
    echo "<h5>price ($count X items) = $$total</h5>";
    
 }else {
    echo "<h5>price (0 items)</h5>";
 }
 ?>
 
 <hr>
 <h5>amount payable $<?php echo $total;?></h5> 
 <form action="thankyou.html">
        <button>Confirm your Order</button>

    </form><br>
 
</body>
</html>