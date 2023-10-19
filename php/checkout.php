<?php
include './connect.php';
    if(isset($_POST['Submit'])&&isset($_SESSION['cart'])){
        $member = $_SESSION['userdetail'];
        $memberID = $member['id'];
        $sql = "INSERT INTO orders ('Date','TIME','M_ID')value(CURDATE(),CURTIME(),'$memberID')";
        $rs = mysqli_query($con, $sql);
        if($rs)
        {
            $mdId = mysqli_insert_id($con);
            foreach ($_SESSION["cart"] as $item){
               $pid=$item["pid"];
               $qty=$item["qty"];
               $sql2 = "INSERT INTO `order_detail` (`PID`, `OID`, `Amount`) VALUES ('$pid', '$qty', '$mdId')"; 
               $rs2 = mysqli_query($con, $sql2);
               
            }
           
        }
        if ($rs&&$rs2) {
            unset($_SESSION['cart']);
            echo "<script type='text/javascript'>alert('Sent your order to shop now'); 
                window.location = './Shop.php'
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oclock</title>
    
    <!-- เพิ่มการเชื่อมต่อไปยังไลบรารี Ionicons -->
    <link rel="stylesheet" href="../css/style-checkin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.1/dist/css/ionicons.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</head>
<body>
    
<h1>Check Out</h1>
    
    <h2>รายการสินค้า</h2>
    <table>
        <tr>
            <th>PRODUCT</th>
            <th>PRICE</th>
        </tr>
        <tr>
            <td>สินค้าที่ 1</td>
            <td>$10.00</td>
        </tr>
        <tr>
            <td>สินค้าที่ 2</td>
            <td>$15.00</td>
        </tr>
        <!-- เพิ่มรายการสินค้าเพิ่มเติมตรงนี้ -->
    </table>
    
    
        <button type="submit">ชำระเงิน</button>
    </form>

        </body>
</html>