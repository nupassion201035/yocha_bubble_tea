<?php include("navbar_em.php"); 
include("../connection.php");
$total = 0;
$qid = $_GET["id"];
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
$sql = "SELECT 
o.order_id,
de.size as item,
pro.name as pro_name,
o.datetime as o_datetime,
em.name as em_name,
topp.name as top_name,
de.quantity as quantity

FROM `order` o
INNER JOIN `employees` em ON o.employee_id = em.employee_id
INNER JOIN `order_detail` de ON o.order_id = de.order_id
INNER JOIN `product` pro ON de.pro_id = pro.pro_id
INNER JOIN `product` topp ON de.topping_id = topp.pro_id
WHERE o.order_id = '$qid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row
    
    echo "<br>";
    
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>เมนู</th><th>Size</th><th>จำนวน</th><th>ท็อปปิ้ง</th><th>ราคา</th></tr></thead>";
echo "<tbody>";
while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["pro_name"]."</td><td>".$row["item"]."</td><td>".$row["quantity"]."</td><td>";
    echo $row["top_name"];
    
    echo "</td><td>";
    if($row["item"]=="S"){
        echo 30*(int)$row["quantity"] ;
        $total+=(30*(int)$row["quantity"]);
    }else if($row["item"]=="M"){
        echo 40*(int)$row["quantity"] ;
        $total+=(40*(int)$row["quantity"]);
    }else{
        echo 50*(int)$row["quantity"] ;
        $total+=(50*(int)$row["quantity"]);
    }
    echo "</td></tr>";
}
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
if(isset($_POST['totalPrice'], $_POST['customerMoney'])) {
    $totalPrice = $_POST['totalPrice'];
    $customerMoney = $_POST['customerMoney'];

    $withdrawal = calculateWithdrawal($totalPrice, $customerMoney);
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $em_name = $row['em_name'];
        $o_datetime = $row['o_datetime'];
        if($row["item"]=="S"){
            $price = 30 ;
            
        }else if($row["item"]=="M"){
            $price = 40 ;
            
        }else{
            $price = 50 ;

        }
    echo $row['pro_name']." : ".$price*$row['quantity'];
    echo "<br>";
    $_SESSION['receipt_data'][] = [
        'pro_name' => $row['pro_name']." size ".$row['item']." x ".$row['quantity'],
        'price' => $price*$row['quantity']
    ];
    }
    $_SESSION['receipt_data']['totalPrice'] = $totalPrice;
    $_SESSION['receipt_data']['customerMoney'] = $customerMoney;
    $_SESSION['receipt_data']['withdrawal'] = $withdrawal;
    $_SESSION['receipt_data']['em_name'] = $em_name;
    $_SESSION['receipt_data']['o_datetime'] = $o_datetime;
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
<a href="print.php?id=<?php echo $qid ;?>" class="btn btn-primary">สั่งพิ่มใบเสร็จ</a><br><br>
    
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