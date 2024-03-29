<?php
include("navbar_owner.php");
include("../connection.php");

date_default_timezone_set('Asia/Bangkok');

// Get current day, month, year
$this_day = date("Y-m-d");
$this_month = date("Y-m");
$this_year = date("Y");

// Initialize selection
$select = isset($_GET['option']) ? $_GET['option'] : 'all';
$dateStart = isset($_GET['dateStart']) ? $_GET['dateStart'] : '';
$dateEnd = isset($_GET['dateEnd']) ? $_GET['dateEnd'] : '';

// Default SQL time condition to empty
$sql_time_condition = "";

// Adjust SQL time condition or create a new variable for date filtering based on selection
if ($select == 'day') {
    $dateStart = $this_day;
    $dateEnd = $this_day;
} elseif ($select == 'month') {
    $dateStart = date("Y-m-01"); // First day of the month
    $dateEnd = date("Y-m-t"); // Last day of the month
} elseif ($select == 'year') {
    $dateStart = date("Y-01-01"); // First day of the year
    $dateEnd = date("Y-12-31"); // Last day of the year
}

// Check if dateStart and dateEnd are set for custom date range
if (!empty($dateStart) && !empty($dateEnd)) {
    $sql_time_condition = " AND o.datetime BETWEEN ? AND ?";
}

// Prepare SQL statements
// Example for getting total sales, adjust accordingly for your use case
$stmt = $conn->prepare("SELECT * FROM `order_detail` od INNER JOIN `order` o ON od.order_id = o.order_id WHERE 1=1" . $sql_time_condition);
if (!empty($sql_time_condition)) {
    $dateEndFormatted = $dateEnd . " 23:59:59";
    $stmt->bind_param("ss", $dateStart, $dateEndFormatted);
}
$stmt->execute();
$result6 = $stmt->get_result();

$total_sale = 0;
while ($row6 = $result6->fetch_assoc()) {
    if ($row6['size'] == 'S') {
        $total_sale += 30;
    } elseif ($row6['size'] == 'M') {
        $total_sale += 40;
    } elseif ($row6['size'] == 'L') {
        $total_sale += 50;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .card { background-color: #f9f9f9; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 20px; margin-bottom: 20px; }
        h2 { margin-top: 0; }
    </style>
</head>
<body>
    <div class="container-xxl">
        <h1>Welcome to Yocha bubble tea Dashboard</h1>
        <form action="" method="get">
            <label for="reportSelection">Select option of report:</label>
            <select id="reportSelection" name="option">
                <option value="all" <?php if ($select == 'all') echo "selected"; ?>>All</option>
                <option value="day" <?php if ($select == 'day') echo "selected"; ?>>Day</option>
                <option value="month" <?php if ($select == 'month') echo "selected"; ?>>Month</option>
                <option value="year" <?php if ($select == 'year') echo "selected"; ?>>Year</option>
            </select>
            <br>
            Date Start: 
            <input type="date" name="dateStart" id="dateStart" value="<?php echo $dateStart; ?>">
            Date End:
            <input type="date" name="dateEnd" id="dateEnd" value="<?php echo $dateEnd; ?>">
            <input type="submit" value="Filter">
        </form>
        <!-- Display Total Sales -->
        <div>Total Sales: <?php echo $total_sale; ?> บาท</div>
        <!-- Additional content here -->
    </div>



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
