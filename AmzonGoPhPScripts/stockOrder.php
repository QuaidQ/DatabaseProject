<?php
  error_reporting(0);
  include('eSession.php');
  $store = $StoreNo_session;
  $emp = $login_session;
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
  function stockd($db, $store, $emp){
    foreach($_SESSION as $name => $value){
      if($value>0){
        if(substr($name, 0, 5) == 'cart_'){
          $ids = substr($name, 5,(strlen($name) - 5));
          $get = 'select * from item where Itemno = '.$ids;
          $result = mysqli_query($db,$get);
          if($get_row = mysqli_fetch_assoc($result)){
            echo $get_row['ItemName'].' x '.$value.'<a href="?remove='.$ids.'">[-]</a> <a href="?add='.$ids.'">[+]</a> <a href="?delete='.$ids.'">[Delete]</a><br />';
          }
          //echo $get_row['ItemName'].' x '.$value.' @ $'.$get_row['Price'].' = $'. $sub.'<a href="?remove='.$ids.'">[-]</a> <a href="?add='.$ids.'">[+]</a> <a href="?delete='.$ids.'">[Delete]</a><br />';
        }
  


      }
      if(isset($_POST['submit'])){
        $update = "UPDATE storeinventory set InventoryQuantity = InventoryQuantity + '$value' where storeNO = '$store' and InventoryId ='$ids'";
        $stmt = $db->prepare($update);
        $stmt->execute();
        $count = count($stmt->execute());
        header("location: stocked.php");

      }


    }

  }
  echo '<td><a href="stockerHome.php">[Home]</a> </td><br />';
  echo '<br />';
  stockd($db, $store, $emp);

?>
<!DOCTYPE HTML>
<html>
<body>
<form method="POST" action="stockOrder.php">
<tr> <td><input id="button" type="submit" name="submit" value="Request Stock"></td><br />
</tr><td><a href="stock.php"><-------Continue Stocking</a> </td><br />
<tr>
</tr>
</body>
</html>
