<?php
  include("session.php");
  include("item.php");
  $id = $_GET['id'];
  $query = 'select * from item where Itemno = '.$id;
  $result = mysqli_query($db,$query);
  $product = mysqli_fetch_object($result);
  echo "my id".$id;
  echo "my id name".$product->ItemName;

  if(isset($id)){
    $item = new Item();
    $item->id = $product->Itemno;
    $item->name = $product->ItemName;
    $item->price = $product->Price;
    $item->quantity = 1;
    $_SESSION['cart'][] = $item;
  }
?>
<table cellpadding="2" cellspacing="2" border="0">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Price</th>
    <th>Type</th>
    <th>Quantity</th>
    <th>SubTotal</th>
  </tr>
  <?php
    $cart = $_SESSION['cart'];
    for($i=0; $i<count($cart); $i++){
  ?>
    <tr>
      <td><? php echo $cart[$i]->id; ?></td>
      <td><? php echo $cart[$i]->name; ?></td>
      <td><? php echo $cart[$i]->price; ?></td>
      <td><? php echo $cart[$i]->quantiy; ?></td>
      <td><? php echo $cart[$i]->price * $cart[$i]->quantity; ?></td>
    </tr>
<?php } ?>
</table>
