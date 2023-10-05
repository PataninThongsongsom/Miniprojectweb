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
            <th>Date</th>
            <th>Time</th>
            <th>price</th>
        </tr>
    <?php 
        $query = " SELECT orders.Date,orders.TIME,SUM(products.price*order_detail.Amount) as price FROM orders INNER JOIN member_account ON orders.ID = member_account.Id INNER JOIN order_detail ON orders.OID = order_detail.OID INNER JOIN products ON order_detail.PID = products.PID INNER JOIN category ON products.CID = category.CID GROUP BY orders.Date;";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td><?php echo $row["Date"] ?></td>
            <td><?php echo $row["TIME"] ?></td>
            <td><?php echo $row["price"] ?></td>
        </tr>
    <?php 
        }
        mysqli_close($con);
    ?>
    </table>

</body>
</html>