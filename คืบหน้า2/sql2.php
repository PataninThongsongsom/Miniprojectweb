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
            <th>Username</th>
            <th>Amount</th>
            <th>total_price</th>
        </tr>
    <?php 
        $query = " SELECT member_account.Username,SUM(order_detail.Amount) as Amount, SUM(order_detail.Amount * products.price) as total_price FROM orders INNER JOIN member_account ON orders.ID = member_account.Id INNER JOIN order_detail ON orders.OID = order_detail.OID INNER JOIN products ON order_detail.PID = products.PID GROUP BY member_account.Username;";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td><?php echo $row["Username"] ?></td>
            <td><?php echo $row["Amount"] ?></td>
            <td><?php echo $row["total_price"] ?>$</td>
        </tr>
    <?php 
        }
        mysqli_close($con);
    ?>
    </table>

</body>
</html>