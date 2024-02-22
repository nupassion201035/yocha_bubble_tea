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
if (isset($_POST['mem_id'])){

$mem_id = $_POST['mem_id'];
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

foreach ($_SESSION['cart'] as $index => $order) {
    echo "Size: " . $order['size'] . "<br>";
    echo "Drink: ". $order['drink']['pro_id'].'/'.$order['drink']['name'].'/'.$order['drink']['type'].'/'.$order['drink']['image']."<br>";
    echo "Topping: " . $order['topping']['pro_id'].'/'.$order['topping']['name'].'/'.$order['topping']['type'].'/'.$order['topping']['image']."<br>";
    echo "Price: " . $order['price'] . "<br><br>";
    $sql3 = "INSERT into order_detail (`pro_id`, `size`, `topping_id`, `order_id`) VALUES (?, ?, ?, ?)";
    $query = $conn->prepare($sql3);
    $query->bind_param("issi", $order['drink']['pro_id'], $order['size'], $order['topping']['pro_id'],$row['order_id']);
    $query->execute();
};
header("Location: ./clear_cart.php");
