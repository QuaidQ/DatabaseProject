<?php
  error_reporting(0);
  include('session.php');
  $store = $StoreNo_session;
  $cust = $login_session;
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $_SESSION['cart_'.(int)$id] += '1';

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
  function cart($db, $store, $cust){
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
        $total += $sub;
        /*if(isset($_POST['submit'])){
            $update = "UPDATE storeinventory set InventoryQuantity = InventoryQuantity - '$value' where storeNO = '$store' and InventoryId ='$ids'";
            $stmt = $db->prepare($update);
            $stmt->execute();
            $order = "INSERT into customerorder(TotalPrice, Cust) values('$total', '$cust')";
            $stmt2 = $db->prepare($order);
            $stmt2->execute();
            $sql = "SELECT * from customerorder where Cust ='$cust'";
            $grab = mysqli_query($db,$sql);
            $product = mysqli_fetch_assoc($grab);
            if($product){
              $sql2 = "SELECT * from item where Itemno = '$ids'";
              $stmt3 = mysqli_query($db,$sql2);
              $items = mysqli_fetch_assoc($stmt3);
              $name = $items['ItemName'];
              $Onum = $product['Orderno'];
              $price = $items['Price'];
              $order2 = "INSERT into ordereditems(orderno,itemid,Iname,quantity, price) values('$Onum', '$ids', '$name','$value','$price')";
              $stmt4 = $db->prepare($order2);
              $stmt4->execute();
          }
          header("location: purchased.php");

        }*/

      }

    }
    echo '<br />';
    echo "Cart Total   $ $total<br />";
    echo '<br />';
    if(isset($_POST['submit'])){
        $update = "UPDATE storeinventory set InventoryQuantity = InventoryQuantity - '$value' where storeNO = '$store' and InventoryId ='$ids'";
        $stmt = $db->prepare($update);
        $stmt->execute();
        $order = "INSERT into customerorder(TotalPrice, Cust) values('$total', '$cust')";
        $stmt2 = $db->prepare($order);
        $stmt2->execute();
        /*$sql = "SELECT * from customerorder where Cust ='$cust'";
        $grab = mysqli_query($db,$sql);
        $product = mysqli_fetch_assoc($grab);
        if($product){
          $sql2 = "SELECT * from item where Itemno = '$ids'";
          $stmt3 = mysqli_query($db,$sql2);
          $items = mysqli_fetch_assoc($stmt3);
          $name = $items['ItemName'];
          $Onum = $product['Orderno'];
          $price = $items['Price'];
          $order2 = "INSERT into ordereditems(orderno,itemid,Iname,quantity, price) values('$Onum', '$ids', '$name','$value','$price')";
          $stmt4 = $db->prepare($order2);
          $stmt4->execute();
      }*/
      header("location: purchased.php");

    }

  }
  echo '<td><a href="home.php">[Home]</a> </td><br />';
  echo '<br />';
  echo "Your Shopping Cart<br />";
  cart($db, $store, $cust);
?>
<!DOCTYPE HTML>
<html>
<body>
<form method="POST" action="carts.php">
<tr> <td><input id="button" type="submit" name="submit" value="Purchase"></td><br />
</tr><td><a href="shop.php"><-------Continue Shopping</a> </td><br />
<tr>
</tr>
</body>
</html>
