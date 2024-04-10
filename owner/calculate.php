<?php include("navbar_owner.php"); 
include("../connection.php");
$em_id = $_SESSION['employee_id'];
$mem_id = $_GET['mem_id'];
$sql11="SELECT * FROM `employees` where employee_id = $em_id";
$res = $conn->query($sql11);
$em_data = $res->fetch_assoc();
$em_name = $em_data['name'];
$total = 0;

$today = date('Y-m-d', time());
$sql22 = "SELECT COUNT(order_id) as max_id FROM `order` where `datetime` like '$today%'";
$res22 = $conn->query($sql22);
$order_row = $res22->fetch_assoc();
$order_id = $order_row['max_id']+1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container-xxl" >
        <div class="row">
        <h1>ชำระเงิน</h1>
            
<?php

if (!empty($_SESSION['cart'])) {
    // Output data of each row
    
    echo "<br>";
    
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>เมนู</th><th>Size</th><th>จำนวน</th><th>ท็อปปิ้ง</th><th>ราคา</th></tr></thead>";
echo "<tbody>";
// while($row = $result->fetch_assoc()) {
//     echo "<tr><td>".$row["pro_name"]."</td><td>".$row["item"]."</td><td>".$row["quantity"]."</td><td>";
//     echo $row["top_name"];
    
//     echo "</td><td>";
//     if($row["item"]=="S"){
//         echo 30*(int)$row["quantity"] ;
//         $total+=(30*(int)$row["quantity"]);
//     }else if($row["item"]=="M"){
//         echo 40*(int)$row["quantity"] ;
//         $total+=(40*(int)$row["quantity"]);
//     }else{
//         echo 50*(int)$row["quantity"] ;
//         $total+=(50*(int)$row["quantity"]);
//     }
//     echo "</td></tr>";
// }




foreach ($_SESSION['cart'] as $item) {
    $sql3 = "SELECT * FROM product WHERE pro_id = ". $item['topping']['pro_id'];
    $result = $conn->query($sql3);

    $sql4 = "SELECT * FROM product WHERE pro_id = " . $item['drink']['pro_id'];
    $result2 = $conn->query($sql4);
    $drink = $result2->fetch_assoc();
    $topping = $result->fetch_assoc();
    echo "<tr>";
    echo "<td>" . $drink['name'] . "</td>";
    echo "<td>" . $item['size'] . "</td>";
    echo "<td>" . $item['quantity'] . "</td>";
    echo "<td>" . $topping['name'] . "</td>";
    // Calculate price for the current item
    $itemPrice = $item['price'] * $item['quantity'];
    $total += $itemPrice; // Update total cost
    echo "<td>" . $itemPrice . "</td>";
    echo "</tr>";
}
echo "<tr><td colspan='4'>Total</td><td>$total</td></tr>";
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</div>";
} else {
    echo "0 results";   
}
?>
<form method="post">
    <div class="col-md-4">
    <input type="number" class="form-control" name="totalPrice" value="<?php echo $total; ?>" hidden > 
    เงินรับจากลูกค้า: <input type="number" name="customerMoney" class="form-control"> <br>
   
    <input type="submit" class="btn btn-primary" value="Calculate Withdrawal"><br><br>
    <?php
function calculateWithdrawal($totalPrice, $customerMoney) {
    if($customerMoney < $totalPrice) {
        return "Insufficient funds provided.";
    }
    return $customerMoney - $totalPrice;
}
$_SESSION['receipt_data'] = array();
// Example usage of the function
if(isset($_POST['customerMoney'])) {
    $totalPrice = $total;
    $customerMoney = $_POST['customerMoney'];

    $withdrawal = calculateWithdrawal($totalPrice, $customerMoney);
    foreach ($_SESSION['cart'] as $item) {
        $sql3 = "SELECT * FROM product WHERE pro_id = ". $item['topping']['pro_id'];
    $result = $conn->query($sql3);

    $sql4 = "SELECT * FROM product WHERE pro_id = " . $item['drink']['pro_id'];
    $result2 = $conn->query($sql4);
    $drink = $result2->fetch_assoc();
    $topping = $result->fetch_assoc();
        if($item["size"]=="S"){
            $price = 30 ;
        } elseif ($item["size"]=="M"){
            $price = 40 ;
        } else {
            $price = 50 ;
        }
        
        echo $drink['name'] . " : " . $price * $item['quantity'];
        echo "<br>";
        
        // Store receipt data in session
        $_SESSION['receipt_data'][] = [
            'pro_name' => $drink['name'] . " size " . $item['size'] . " x " . $item['quantity'] . " x (" . $price . " บาท)",
            'price' => $price * $item['quantity']
        ];
        
        // Calculate total price
        
    }
  
    $o_datetime = date("Y-m-d H:i:s");
    

    
    $_SESSION['receipt_data']['totalPrice'] = $totalPrice;
    $_SESSION['receipt_data']['customerMoney'] = $customerMoney;
    $_SESSION['receipt_data']['withdrawal'] = $withdrawal;
    $_SESSION['receipt_data']['em_name'] = $em_name;
    $_SESSION['receipt_data']['o_datetime'] = $o_datetime;
    $_SESSION['receipt_data']['qid'] = $order_id;
    echo "ราคาสุทธิ: ".$totalPrice ;
    echo "<br>";
    echo "เงินรับจากลูกค้า: ".$customerMoney ;
    echo "<br>";
    echo "เงินทอน: " . $withdrawal;
}
?>
<br> 

   
</form>
<br>
<a href="confirm_order.php?mem_id=<?php echo $mem_id ?>" class="btn btn-primary">สั่งพิมพ์ใบเสร็จ</a><br><br>
    
</div>
    </div>
</div>
</body>
</html>
<script>
    function confirmDelete() {
      return confirm("ยืนยันการลบรายการนี้?");
    }
  </script>
  <script>
    function confirmAction() {
      return confirm("ยืนยันการทำรายการ?");
    }
  </script>