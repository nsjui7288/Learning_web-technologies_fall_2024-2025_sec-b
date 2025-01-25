<?php 
 
session_start();

include("../controller/component.php");
include("../model/db.php");


if(isset($_POST['add'])){

  
  if(isset($_SESSION['cart'])){
     
     $sss= array_column($_SESSION['cart'],"product_id");
     
     if(in_array($_POST['product_id'],$sss)){
  
  echo "<script>alert('item is already added') </script>";
  echo "<script>window.location='productList.php'</script>";
     }else{
  $how_many_element = count($_SESSION['cart']);
  $item_array = array(
  
      'product_id'=>$_POST['product_id']
  );
  $_SESSION['cart'][$how_many_element]=$item_array;
  
  
     }
  
  }else{
  
      $item_array = array(
  
          'product_id'=>$_POST['product_id']
      );
  
      $_SESSION['cart'][0]= $item_array;
      
  }
  }


?>
 <html>
 <head>
    
    <title>Shopping Cart</title>
 </head>
 <body>

<?php 
include("../controller/header.php");

?>
 
 <fieldset >

<legend >FOOD ITEMS</legend>

<?php 
$con = connection();

$sql = "SELECT * FROM product";

 $result = mysqli_query($con,$sql);
 
   
   
 while($row = mysqli_fetch_assoc($result)){

    component($row['name'],$row['price'],$row['image'],$row['id']);
}



?>

    </fieldset>


</body>
 </body>
 </html>