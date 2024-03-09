<?php

include("navbar_owner.php");
include("../connection.php");

date_default_timezone_set('Asia/Bangkok');

$this_day = date("Y-m-d");

$this_month = date("Y-m");
$this_year = date("Y");

$sql_time = "";
if(isset($_GET['option'])){
    $select = $_GET['option'] ;
}else{
    $select = '' ;
}

$sql4 = "SELECT * FROM `product` where `type` = 'drink'";
$result4 = $conn->query($sql4);
$count_drink = $result4->num_rows;

$sql5 = "SELECT * FROM `member` where `status` = 'active'";
$result5 = $conn->query($sql5);
$count_member = $result5->num_rows;
if($select == 'day'){
    $sql_time = $this_day;
} else if($select == 'month') {
    $sql_time = $this_month;
} else if($select == 'year') {
    $sql_time = $this_year;
} else {
    // If 'all' or any other value is selected, set $sql_time to an empty string
    $sql_time = "";
}
$total_sale = 0 ;
$sql6 = "SELECT * FROM `order_detail` od
        INNER JOIN `order` o ON od.order_id = o.order_id 
        where  o.datetime like '$sql_time%'";
        $result6 = $conn->query($sql6);
while($row6 = $result6->fetch_assoc()){
    if($row6['size']=='S'){$total_sale+=30;}
    
    else if($row6['size']=='M'){$total_sale+=40;}
    else if($row6['size']=='L'){$total_sale+=50;}
}
$max_pro_id = "";
$name_popular = "";
$max_count = 0;
$sql7 = "SELECT COUNT(pro_id) AS count, pro_id 
         FROM `order_detail` od
         INNER JOIN `order` o ON od.order_id = o.order_id
         WHERE o.datetime LIKE '$sql_time%'
         GROUP BY pro_id;";
    $result7 = $conn->query($sql7);
    while($row7 = $result7->fetch_assoc()){
 
        if ($row7['count'] > $max_count) {
            $max_count = $row7['count']; // Update the maximum count
            $max_pro_id = $row7['pro_id']; // Update the corresponding product ID
        }
    }

    $sql8 = "SELECT * FROM `product` WHERE pro_id = '$max_pro_id'";
    $result8 = $conn->query($sql8);
    while($row8 = $result8->fetch_assoc()){
    $name_popular = $row8['name'];
    }
while($row6 = $result6->fetch_assoc()){
    if($row6['size']=='S'){$total_sale+=30;}
    
    else if($row6['size']=='M'){$total_sale+=40;}
    else if($row6['size']=='L'){$total_sale+=50;}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>
    <style>
        /* Basic styles for the dashboard */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .card {
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container-xxl">
        <h1>Welcome to Yocha bubble tea Dashboard</h1>
        <br>
        <div class="row" name="Label_info" style="gap: 10px;">
            <div class="card mb-3" style="max-width: 300px; background-color:#7BD3EA">
                <div class="row g-0">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Menu</h5>
                            <p class="card-text"><?php echo $count_drink ; ?> รายการ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 300px; background-color:#A1EEBD">
                <div class="row g-0">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Member</h5>
                            <p class="card-text"><?php echo $count_member ; ?> คน</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 300px; background-color:#F6F7C4" >
                <div class="row g-0">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Total Sales</h5>
                            <p class="card-text"><?php echo $total_sale ; ?> บาท</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 300px;background-color:#F6D6D6" >
                <div class="row g-0">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Popular Menu</h5>
                            <p class="card-text"><?php echo $name_popular ; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <label for="teaSelection">Select option of report :</label>
<select id="reportSelection" name="report_option">
<option value="all" <?php if($select=='all') echo "selected";?> >All</option>
  <option value="day"  <?php if($select=='day') echo "selected";?>>Day</option>
  <option value="month"  <?php if($select=='month') echo "selected";?>>Month</option>
  <option value="year" <?php if($select=='year') echo "selected";?>>Year </option>
</select>
<div >
        <canvas id="myChart"></canvas>
    </div>


    </div>
    <?php
   


// Output the selected option (for debugging purposes)


// Set SQL time based on selected option


    
    
    
    $sql="SELECT * from `product`";
    $result = $conn->query($sql);
    $productArray = array();
    $product_id = array();
    $values = array();
    // Check if there are any rows returned from the query
    if ($result->num_rows > 0) {
        // Loop through each row of the result set
        while($row = $result->fetch_assoc()) {
            // Add each row to the array
            $productArray[] = $row['name'];
            $product_id[] = $row['pro_id'];
        }
    } else {
        // If there are no rows returned, you can handle it here
        echo "No products found.";
    }
    foreach($product_id as $item){
       
        if($select == 'day'){
            $sql_time = $this_day;
        } else if($select == 'month') {
            $sql_time = $this_month;
        } else if($select == 'year') {
            $sql_time = $this_year;
        } else {
            // If 'all' or any other value is selected, set $sql_time to an empty string
            $sql_time = "";
        }
        
        $sql2 = "SELECT * FROM `order_detail` od
        INNER JOIN `order` o ON od.order_id = o.order_id 
        where (pro_id = $item or topping_id = $item) and o.datetime like '$sql_time%'";
        $result2 = $conn->query($sql2);
        $values[] = $result2->num_rows;
    }
    foreach($values as $item2){
        
        
    }
    $valuesJSON = json_encode($values);
    $labelsJSON = json_encode($productArray);

    ?>
    
    <script>
        // Data for the horizontal bar chart
        const labels = <?php echo $labelsJSON ;?>;
        const data = {
            labels: labels,
            datasets: [{
                label: '# of Votes',
                data: <?php echo $valuesJSON ;?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        // Configuration options
        const config = {
            type: 'bar',
            data: data,
            options: {
                indexAxis: 'y', // Display data on the y-axis
                scales: {
                    x: {
                        beginAtZero: true // Start x-axis from zero
                    }
                }
            }
        };

        // Get the canvas element
        const ctx = document.getElementById('myChart').getContext('2d');

        // Create the horizontal bar chart
        const myChart = new Chart(ctx, config);

    // Get the select element
    document.getElementById("reportSelection").addEventListener("change", function() {
        var selectedOption = this.value;
        console.log(selectedOption);
        
        window.location.href = "report.php?option=" + selectedOption ;
        
        
        
    });
    </script>
</body>
</html>
