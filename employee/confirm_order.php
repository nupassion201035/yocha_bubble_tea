<?php 

session_start();
echo $_SESSION['employee_id'];
include("../connection.php");
// CART ARRAY STRUCTURE
// array(
//     'size' => $size,
//     'topping' => $topping, // row of product
//     'drink' => $drink, // row of prodcut
//     'price' => $prices[$size] + $topping['price']
// );
if (isset($_GET['mem_id'])){

$telephone = $_GET['mem_id'];
$sql8 = "SELECT * FROM `member` where `telephone` = '$telephone'";
$query8 = $conn->prepare($sql8);
$query8->execute();
$result8 = $query8->get_result();

        

$row8 = $result8->fetch_assoc();
$mem_id = $row8['member_id'];
}else{
    $mem_id = '';
}

date_default_timezone_set('Asia/Bangkok');
$current_time = date("Y-m-d H:i:s");
echo $current_time;



    $sql = "INSERT INTO `order` (`datetime`, `status`, `mem_id`, `employee_id`) VALUES (?, 'incomplete', ?, ?)";
    $query = $conn->prepare($sql);
    $query->bind_param("sss", $current_time, $mem_id, $_SESSION['employee_id']);
    $query->execute();
    
   

$sql2 = "SELECT * FROM `order` WHERE `datetime` = ?";
$query2 = $conn->prepare($sql2);
$query2->bind_param("s", $current_time);
$query2->execute();
$result2 = $query2->get_result();

        
        // For simplicity, let's check if the username is "demo" and password is "password"
$row = $result2->fetch_assoc();
$row['order_id'];


// Close database connection
$count = 0;
foreach ($_SESSION['cart'] as $index => $order) {
    $count++;
    echo "Size: " . $order['size'] . "<br>";
    echo "Drink: ". $order['drink']['pro_id'].'/'.$order['drink']['name'].'/'.$order['drink']['type'].'/'.$order['drink']['image']."<br>";
    echo "Topping: " . $order['topping']['pro_id'].'/'.$order['topping']['name'].'/'.$order['topping']['type'].'/'.$order['topping']['image']."<br>";
    echo "Price: " . $order['price'] . "<br><br>";
    $order['quantity'] = (int)$order['quantity'];
    

     
    $sql3 = "INSERT into order_detail (`pro_id`, `size`, `topping_id`, `order_id`,`quantity`) VALUES (?, ?, ?, ?, ?)";
    $query = $conn->prepare($sql3);
    $query->bind_param("issii", $order['drink']['pro_id'], $order['size'], $order['topping']['pro_id'],$row['order_id'],$order['quantity']);
    $query->execute();
};

if(!empty($mem_id)){
    $sql4 = "SELECT * FROM `member` where `member_id` = ?";
    $query4 = $conn->prepare($sql4);
$query4->bind_param("s", $mem_id);
$query4->execute();
$result4 = $query4->get_result();

        
        // For simplicity, let's check if the username is "demo" and password is "password"
$row4 = $result4->fetch_assoc();

 $sql5="UPDATE member SET `point` = ? where `member_id` = ?";
 $new_point = $row4['point']+$count;
 $query5 = $conn->prepare($sql5);
 $query5->bind_param("ss", $new_point,$mem_id);
 $query5->execute();
 $result5 = $query5->get_result();



}

 header("Location: ./clear_cart.php");

