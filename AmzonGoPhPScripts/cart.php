<?php
include("shop.php");
require 'item.php';
$query = 'select * from item where Itemno = '.$_GET['id'];
$result = mysqli_query($db,'select * from item where Itemno = '.$_GET['id']);
$product = mysqli_fetch_object($result);

if(isset($_GET['id'])){
  $item = new Item();
  $item->id = $product->Itemno;
  $item->name = $product->ItemName;
  $item->price = $product->Price;
  $item->quantity = 1;
  $_SESSION['cart'][0] = $item;
}

?>
<table cellpadding="2" cellspacing="2" border="0">
  <? php echo $_GET['id']; ?>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Price</th>
    <th>Type</th>
    <th>Quantity</th>
    <th>SubTotal</th>
  </tr>
  <?php
    $cart = unserialize(serialize($_SESSION['cart']));
    for($i=0; $i<count($cart); $i++){
  ?>
    <tr>
      <td><? php echo $_GET['id']; ?></td>
      <td><? php echo $cart[$i]->name; ?></td>
      <td><? php echo $cart[$i]->price; ?></td>
      <td><? php echo $cart[$i]->quantiy; ?></td>
      <td><? php echo $cart[$i]->price * $cart[$i]->quantity; ?></td>
    </tr>
<?php } ?>
</table>
