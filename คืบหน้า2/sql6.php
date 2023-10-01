<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Category</th>
            <th>product_name</th>
            <th>price</th>
            <th>sold</th>
        </tr>
    <?php 
        $query = " SELECT category.Category_name,products.product_name,products.price,products.amount as remain,SUM(order_detail.Amount) as sold FROM orders INNER JOIN member_account ON orders.ID = member_account.Id INNER JOIN order_detail ON orders.OID = order_detail.OID INNER JOIN products ON order_detail.PID = products.PID INNER JOIN category ON products.CID = category.CID GROUP BY order_detail.PID;";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td><?php echo $row["Category_name"] ?></td>
            <td><?php echo $row["product_name"] ?></td>
            <td><?php echo $row["price"] ?></td>
            <td><?php echo $row["remain"] ?></td>
            <td><?php echo $row["sold"] ?></td>
        </tr>
    <?php 
        }
        mysqli_close($con);
    ?>
    </table>

</body>
</html>