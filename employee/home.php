<?php include("navbar_em.php");
$products = [
    ['name' => 'ชานมไข่มุก', 'image' => 'src\tea.jpg'],
    ['name' => 'ชานมไข่มุก', 'image' => 'src\tea.jpg'],
    ['name' => 'ชานมไข่มุก', 'image' => 'src\tea.jpg'],
    ['name' => 'ชานมไข่มุก', 'image' => 'src\tea.jpg'],
    ['name' => 'ชานมไข่มุก', 'image' => 'src\tea.jpg'],
    ['name' => 'ชานมไข่มุก', 'image' => 'src\tea.jpg'],
];

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link id="theme" rel="stylesheet" href="home.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="container-order-list col-md-8">
                <?php foreach ($products as $product) {
                    echo '<div class="card" style="width: 200px;">';
                    echo '    <img src="' . $product['image'] . '" class="card-img-top" alt="...">';
                    echo '    <div class="card-body">';
                    echo '        <p class="card-text">' . $product['name'] . '</p>';
                    echo '        <a href="#" class="btn btn-primary">สั่งซื้อ</a>';
                    echo '    </div>';
                    echo '</div>';
                } ?>
            </div>
            <div class="container-order col-md-4">
                <h4>รายการสั่งซื้อ</h4>
                <div class="row">
                    <div class="col">
                        รายการ
                    </div>
                    <div class="col">
                        จำนวน
                    </div>
                    <div class="col">
                        ราคา
                    </div>
                </div>
                <button type="button" class="btn btn-dark">สั่งซื้อ</button>
            </div>

        </div>
    </div>
</body>


</html>