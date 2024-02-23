<?php include("navbar_owner.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container-xxl">
        <div class="row" name="Label_info" style="gap: 10px;">
            <div class="card mb-3" style="max-width: 300px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Menu</h5>
                            <p class="card-text">15 รายการ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 300px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Member</h5>
                            <p class="card-text">100 คน</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 300px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Total Sales</h5>
                            <p class="card-text">1000 บาท</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 300px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Popular Menu</h5>
                            <p class="card-text">ชานมไข่มุก</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" name="row_chart">
            <h4>ยอดขายแต่ละเมนู</h4>
            <canvas id="salesChart" width="500" height="150"></canvas>
        </div>







</body>
<script>
    // Data for the chart
    var menuSalesData = {
        labels: ['กาแฟเย็น', 'โกโก้', 'ชาเขียวนม', 'ชาเขียวมะลิ', 'ชาไทย' , 'นมชมพู' , 'นมสด' , 'ชานมไต้หวัน'], // Menu names
        datasets: [{
            label: 'ยอดขาย',
            data: [10 , 20 , 10 ,15 ,20 ,30 ,15], // Sales data for each menu
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Get the canvas element
    var ctx = document.getElementById('salesChart').getContext('2d');

    // Initialize Chart.js
    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: menuSalesData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</html>