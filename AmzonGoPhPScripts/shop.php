<?php
include('session.php');
$query = "select item.*, storeinventory.InventoryQuantity from item left join storeinventory on item.Itemno = storeinventory.InventoryId and storeNO = $StoreNo_session";
$result = mysqli_query($db,$query);
?>
<table cellpadding="2" cellspacing="2" border="0">
<form method="GET" action="cart.php">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Price</th>
    <th>Type</th>
    <th>Quantity</th>
    <th>Buy</th>
  </tr>
  <?php while($product = mysqli_fetch_assoc($result)){ ?>
    <tr>
      <td><?php echo $product['Itemno'] ?></td>
      <td><?php echo $product['ItemName'] ?></td>
      <td>$<?php echo $product['Price'] ?></td>
      <td><?php echo $product['ItemType'] ?></td>
      <td><?php echo $product['InventoryQuantity'] ?></td>
      <td><a href="carts.php?id=<?php echo $product['Itemno']?>">Add to Cart</a></td>
    </tr>
  <?php  }?>
</table>
