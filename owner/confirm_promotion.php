<?php 

session_start();

include("../connection.php");
$count_cart = 0;
foreach ($_SESSION['cart2'] as $index => $order) {
    $count_cart++;
    
};
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
$point = $row8['point'];
$point_need = $count_cart*10;
echo $point ;
echo $point_need ;

$point = (int)$row8['point'];
$point_need = (int)($count_cart * 10);
if($point<$point_need){
    ?>
            <script type="text/javascript" >
                alert("แต้มสะสมไม่เพียงพอ");
                window.location.href = "promotion.php";
            </script>
            <?php
             exit();
}
} else {
    // Your else block code
    echo "<br>";
    $mem_id = '';
}

date_default_timezone_set('Asia/Bangkok');
$current_time = date("Y-m-d H:i:s");
echo $current_time;




    
    
   



        
        // For simplicity, let's check if the username is "demo" and password is "password"



// Close database connection
$str = "incomplete";
$count = 0;
foreach ($_SESSION['cart2'] as $index => $order) {
    $count++;
    echo "Size: " . $order['size'] . "<br>";
    echo "Drink: ". $order['drink']['pro_id'].'/'.$order['drink']['name'].'/'.$order['drink']['type'].'/'.$order['drink']['image']."<br>";
    echo "Topping: " . $order['topping']['pro_id'].'/'.$order['topping']['name'].'/'.$order['topping']['type'].'/'.$order['topping']['image']."<br>";
    echo "Price: " . $order['price'] . "<br><br>";
   
    $sql3 = "INSERT into promotion (`mem_id`, `pro_id`, `datetime`, `status`,`employee_id`,`topping_id`) VALUES (?,?,?,?,?,?)";
    $query = $conn->prepare($sql3);
    $query->bind_param("isssis", $mem_id, $order['drink']['pro_id'], $current_time,$str,$_SESSION['employee_id'],$order['topping']['pro_id']);
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
 $new_point = $row4['point']-$point_need;
 $query5 = $conn->prepare($sql5);
 $query5->bind_param("ss", $new_point,$mem_id);
 $query5->execute();
 $result5 = $query5->get_result();


}
header("Location: ./clear_cart2.php");


?>