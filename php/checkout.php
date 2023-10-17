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
