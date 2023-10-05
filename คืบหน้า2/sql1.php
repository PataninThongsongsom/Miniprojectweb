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
            <th>จำนวน</th>
            <th>ชนิด</th>
        </tr>
    <?php 
        $query = " SELECT COUNT(*) as amount,category.Category_name FROM products INNER JOIN category ON products.CID = category.CID GROUP BY products.CID";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td><?php echo $row["amount"] ?></td>
            <td><?php echo $row["Category_name"] ?></td>
        </tr>
    <?php 
        }
        mysqli_close($con);
    ?>
    </table>

</body>
</html>