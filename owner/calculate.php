<?php include("navbar_owner.php"); 
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
o.datetime,
em.name as em_name,
topp.name as top_name
FROM `order` o
INNER JOIN `employees` em ON o.employee_id = em.employee_id
INNER JOIN `order_detail` de ON o.order_id = de.order_id
INNER JOIN `product` pro ON de.pro_id = pro.pro_id
INNER JOIN `product` topp ON de.topping_id = topp.pro_id
WHERE o.order_id = '60'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row
    
    echo "<br>";
    
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>Date Time</th><th>Employee Name</th><th>Detail</th><th>Action</th></tr></thead>";
echo "<tbody>";
while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["pro_name"]."</td><td>".$row["item"]."</td><td>";
    echo $row["top_name"];
    
    echo "</td><td>";
    if($row["item"]=="S"){
        echo "30" ;
        $total+=30;
    }else if($row["item"]=="M"){
        echo "40" ;
        $total+=40;
    }else{
        echo "50" ;
        $total+=50;
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
    Customer's Money: <input type="number" name="customerMoney" class="form-control"> <br>
   
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
        if($row["item"]=="S"){
            $price = 30 ;
            
        }else if($row["item"]=="M"){
            $price = 40 ;
            
        }else{
            $price = 50 ;

        }
    echo $row['pro_name']." : ".$price;
    echo "<br>";
    $_SESSION['receipt_data'][] = [
        'pro_name' => $row['pro_name'],
        'price' => $price
    ];
    }
    $_SESSION['receipt_data']['totalPrice'] = $totalPrice;
    $_SESSION['receipt_data']['customerMoney'] = $customerMoney;
    $_SESSION['receipt_data']['withdrawal'] = $withdrawal;
    echo "Total Price: ".$totalPrice ;
    echo "<br>";
    echo "Customer's Money: ".$customerMoney ;
    echo "<br>";
    echo "Withdrawal (Change): " . $withdrawal;
}
?>
<br> 

   
</form>
<br>
<a href="print.php" class="btn btn-primary">Print</a><br><br>
    
</div>
        </div>
        
    </div>

    
        
    
</body>
</html>
<script>
    function confirmDelete() {
      return confirm("Are you sure you want to delete this?");
    }
  </script>
  <script>
    function confirmAction() {
      return confirm("Are you sure you want to complete this?");
    }
  </script>