<?php
include("navbar_em.php");
include("../connection.php");
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
        .container {
            padding: 20px;
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
    <div class="container">
        <h1>Welcome to Yocha bubble tea Dashboard</h1>
        <label for="teaSelection">Select option of report :</label>
<select id="reportSelection" name="report_option">
  <option value="day">Day</option>
  <option value="month">Month</option>
  <option value="year">Year </option>
</select>
<div >
        <canvas id="myChart"></canvas>
    </div>


    </div>
    <?php
    $sql="SELECT * from `product`";
    $result = $conn->query($sql);
    $productArray = array();

    // Check if there are any rows returned from the query
    if ($result->num_rows > 0) {
        // Loop through each row of the result set
        while($row = $result->fetch_assoc()) {
            // Add each row to the array
            $productArray[] = $row['name'];
        }
    } else {
        // If there are no rows returned, you can handle it here
        echo "No products found.";
    }
    
    $labelsJSON = json_encode($productArray);
    echo $labelsJSON;
    ?>
    
    <script>
        // Data for the horizontal bar chart
        const labels = <?php echo $labelsJSON ;?>;
        const data = {
            labels: labels,
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
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
    </script>
</body>
</html>
