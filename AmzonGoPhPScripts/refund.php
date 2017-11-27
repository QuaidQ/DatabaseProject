<?php
include('session.php');
$query = "SELECT * from customerorder where Cust = '$login_session'";
$result = mysqli_query($db,$query);
echo '<td><a href="home.php">[Home]</a> </td><br />';
echo '<br />';
?>
<table cellpadding="2" cellspacing="2" border="0">
<form method="GET" action="refund.php">
  <tr>
    <th>OrderNo</th>
    <th>Total Price</th>
    <th>Order Date</th>
    <th>Refund</th>
  </tr>
  <?php while($product = mysqli_fetch_assoc($result)){ ?>
    <tr>
      <td><?php echo $product['Orderno'] ?></td>
      <td><?php echo $product['TotalPrice'] ?></td>
      <td><?php echo $product['OrderDate'] ?></td>
      <td><a href="orderHist.php?id=<?php echo $product['Orderno']?>">Refund items</a></td>
    </tr>
  <?php  }?>
</table>
