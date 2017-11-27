<?php
  error_reporting(0);
  include('session.php');
 

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    //$qty = "select * from storeinventory where storeNO = $StoreNo_session and InventoryId =".$id;
  //  $quant = mysqli_query($db,$qty);
    //while ($quantity = mysqli_fetch_assoc($quant)){
    //  if($quantity['InventoryQuantity'] != $_SESSION['cart'.$id]){
        $_SESSION['cart_'.(int)$id] += '1';
    //  }
  //  }
  }

  if(isset($_GET['remove'])){
    $_SESSION['cart_'.(int)$_GET['remove']] --;
  }

  if(isset($_GET['add'])){
    $_SESSION['cart_'.(int)$_GET['add']] ++;
  }

  if(isset($_GET['delete'])){
    $_SESSION['cart_'.(int)$_GET['delete']] ='0';
  }
  function cart($db){
    foreach($_SESSION as $name => $value){
      if($value>0){
        if(substr($name, 0, 5) == 'cart_'){
          $ids = substr($name, 5,(strlen($name) - 5));
          $get = 'select * from item where Itemno = '.$ids;
          $result = mysqli_query($db,$get);
          while($get_row = mysqli_fetch_assoc($result)){
            $sub = $get_row['Price'] *$value;
            echo $get_row['ItemName'].' x '.$value.' @ $'.$get_row['Price'].' = $'. $sub.'<a href="?remove='.$ids.'">[-]</a> <a href="?add='.$ids.'">[+]</a> <a href="?delete='.$ids.'">[Delete]</a><br />';
          }

        }
      }
      else{
      }
    }
    echo '<br />';
    echo '<td><input id="button" type="submit" name="submit" value="Purchase"></td><br />';
    echo '<br />';
    echo '<td><a href="shop.php"><-------Continue Shopping</a> </td><br />';

  }
  echo '<td><a href="home.php">[Home]</a> </td><br />';
  echo '<br />';
  echo "Your Shopping Cart<br />";
  cart($db);
?>
