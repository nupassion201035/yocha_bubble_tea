<?php
include("navbar_owner.php");
include("../connection.php");

date_default_timezone_set('Asia/Bangkok');

$this_day = date("Y-m-d");
$this_month = date("Y-m");
$this_year = date("Y");

// Initialize variables
$select = isset($_GET['option']) ? $_GET['option'] : '';
$dateStart = isset($_GET['dateStart']) ? $_GET['dateStart'] : '';
$dateEnd = isset($_GET['dateEnd']) ? $_GET['dateEnd'] : '';
$total_sale = 0;
$max_pro_id = "";
$name_popular = "";
$max_count = 0;

// Fetch product and member counts
$sql4 = "SELECT * FROM `product` WHERE `type` = 'drink'";
$count_drink = $conn->query($sql4)->num_rows;

$sql5 = "SELECT * FROM `member`";
$count_member = $conn->query($sql5)->num_rows;

// Set SQL time condition based on selection
$sql_time_condition = "";
if ($select == 'day') {
    $sql_time_condition = " AND o.datetime LIKE '{$this_day}%'";
} elseif ($select == 'month') {
    $sql_time_condition = " AND o.datetime LIKE '{$this_month}%'";
} elseif ($select == 'year') {
    $sql_time_condition = " AND o.datetime LIKE '{$this_year}%'";
} elseif (!empty($dateStart) && !empty($dateEnd)) {
    $sql_time_condition = " AND o.datetime BETWEEN '$dateStart' AND '$dateEnd 23:59:59'";
}

// Calculate total sales
$sql6 = "SELECT size FROM `order_detail` od INNER JOIN `order` o ON od.order_id = o.order_id WHERE 1=1 {$sql_time_condition}";
$result6 = $conn->query($sql6);
while ($row6 = $result6->fetch_assoc()) {
    switch ($row6['size']) {
        case 'S':
            $total_sale += 30;
            break;
        case 'M':
            $total_sale += 40;
            break;
        case 'L':
            $total_sale += 50;
            break;
    }
}

// Find most popular product
$sql7 = "SELECT COUNT(pro_id) AS count, pro_id FROM `order_detail` od INNER JOIN `order` o ON od.order_id = o.order_id WHERE 1=1 {$sql_time_condition} GROUP BY pro_id";
$result7 = $conn->query($sql7);
while ($row7 = $result7->fetch_assoc()) {
    if ($row7['count'] > $max_count) {
        $max_count = $row7['count'];
        $max_pro_id = $row7['pro_id'];
    }
}

if ($max_pro_id) {
    $sql8 = "SELECT name FROM `product` WHERE pro_id = '$max_pro_id'";
    $name_popular = $conn->query($sql8)->fetch_object()->name;
}

// Render the HTML below...

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
        <br>
        <div class="row" name="Label_info" style="gap: 10px;">
            <div class="card mb-3" style="max-width: 300px; background-color:#7BD3EA">
                <div class="row g-0">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">เมนู</h5>
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
                            <h5 class="card-title">สมาชิก</h5>
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
                            <h5 class="card-title">ยอดขายทั้งหมด</h5>
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
                            <h5 class="card-title">เมนูขายดี</h5>
                            <p class="card-text"><?php echo $name_popular ; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="" method="get">
    <label for="reportSelection">เลือกการแสดง:</label>
    <select id="reportSelection" name="option">
        <option value="all" <?php if($select=='all') echo "selected";?> >ทั้งหมด</option>
        <option value="day" <?php if($select=='day') echo "selected";?>>วัน</option>
        <option value="month" <?php if($select=='month') echo "selected";?>>เดือน</option>
        <option value="year" <?php if($select=='year') echo "selected";?>>ปี</option>
    </select>
    <br>
    วันที่เริ่มต้น: 
    <input type="date" name="dateStart" id="dateStart" value="<?php echo $dateStart; ?>">
    วันที่สิ้นสุด:
    <input type="date" name="dateEnd" id="dateEnd" value="<?php echo $dateEnd; ?>">
    <input type="submit" value="Filter">
</form>


<div >
        <canvas id="myChart"></canvas>
    </div>


    </div>
    <?php
   


// Output the selected option (for debugging purposes)


// Set SQL time based on selected option


$select = isset($_GET['option']) ? $_GET['option'] : 'all';
$dateStart = isset($_GET['dateStart']) ? $_GET['dateStart'] : '';
$dateEnd = isset($_GET['dateEnd']) ? $_GET['dateEnd'] : '';
    
$productArray = array();
$product_id = array();
$values = array();

// Fetch all products
$sql = "SELECT * FROM `product`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $productArray[] = $row['name'];
        $product_id[] = $row['pro_id'];
    }
} else {
    echo "No products found.";
    // Potentially exit or handle the no products found scenario
}

// Loop through each product to count orders
foreach($product_id as $item) {
    $sql2 = "SELECT COUNT(*) as order_count FROM `order_detail` od
             INNER JOIN `order` o ON od.order_id = o.order_id
             WHERE (od.pro_id = $item OR od.topping_id = $item)";

    // Modify SQL based on time selection
    if ($select == 'day') {
        $sql2 .= " AND o.datetime LIKE '{$this_day}%'";
    } elseif ($select == 'month') {
        $sql2 .= " AND o.datetime LIKE '{$this_month}%'";
    } elseif ($select == 'year') {
        $sql2 .= " AND o.datetime LIKE '{$this_year}%'";
    } elseif ($select == 'all') {
        // No additional SQL condition needed for 'all'
    } if (!empty($dateStart) && !empty($dateEnd)) {
        // Handle custom date range
        $dateEndFormatted = $dateEnd . ' 23:59:59';
        $sql2 .= " AND o.datetime BETWEEN '$dateStart' AND '$dateEnd 23:59:59'";
    }

    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $values[] = $row2 ? $row2['order_count'] : 0; // Add the count to values, defaulting to 0 if no result
}

$valuesJSON = json_encode($values);
$labelsJSON = json_encode($productArray);

    ?>
    
    <script>
        document.getElementById("dateStart").addEventListener("change", fetchData);
document.getElementById("dateEnd").addEventListener("change", fetchData);

function fetchData() {
    // Extract the values from your date inputs
    var dateStart = document.getElementById("dateStart").value;
    var dateEnd = document.getElementById("dateEnd").value;
    var option = document.getElementById("reportSelection").value;

    // Use fetch to send the request to your server-side PHP script
    fetch('path_to_your_php_script.php?dateStart=' + dateStart + '&dateEnd=' + dateEnd + '&option=' + option)
        .then(response => response.json())
        .then(data => {
            // Assuming the response data is the new set of values for the chart
            updateChart(data);
        })
        .catch(error => console.error('Error:', error));
}

function updateChart(data) {
    // Assuming 'myChart' is a global variable that holds your chart instance
    myChart.data.labels = data.labels;
    myChart.data.datasets.forEach((dataset) => {
        dataset.data = data.values;
    });
    myChart.update();
}
        const labels = <?php echo $labelsJSON ;?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'จำนวนการสั่งซื้อ',
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
