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
            <th>Amount</th>
            <th>Username</th>
        </tr>
    <?php 
        $query = " SELECT category.Category_name,order_detail.Amount,member_account.Username FROM orders INNER JOIN member_account ON orders.ID = member_account.Id INNER JOIN order_detail ON orders.OID = order_detail.OID INNER JOIN products ON order_detail.PID = products.PID INNER JOIN category ON products.CID = category.CID;";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td><?php echo $row["Category_name"] ?></td>
            <td><?php echo $row["Amount"] ?></td>
            <td><?php echo $row["Username"] ?></td>
        </tr>
    <?php 
        }
        mysqli_close($con);
    ?>
    </table>

</body>
</html>