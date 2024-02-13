
<?php 



include("navbar_em.php");
$products = [
    ['id' => '1','name' => 'กาแฟเย็น', 'image' => '../src\กาแฟเย็น.jpg'],
    ['id' => '2','name' => 'โกโก้', 'image' => '../src\โกโก้.jpg'],
    ['id' => '3','name' => 'ชาเขียวนม', 'image' => '../src\ชาเขียวนม.jpg'],
    ['id' => '4','name' => 'ชาเขียวมะลิ', 'image' => '../src\ชาเขียวมะลิ.jpg'],
    ['id' => '5','name' => 'ชาไทย', 'image' => '../src\ชาไทย.jpg'],
    ['id' => '6','name' => 'ชานมไต้หวัน', 'image' => '../src/ชานมไต้หวัน.jpg'],
    ['id' => '7','name' => 'นมชมพู', 'image' => '../src/นมชมพู.jpg'],
    ['id' => '8','name' => 'นมสด', 'image' => '../src/นมสด.jpg'],
    ['id' => '9','name' => 'โอวัลติน', 'image' => '../src/โอวัลติน.jpg'],
];

$cart =[
    ['id' => '1','name' => 'ชานมไข่มุก', 'quantity' => 1, 'price' => 30],
    ['id' => '1','name' => 'ชานมไข่มุก', 'quantity' => 1, 'price' => 30]

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
                    echo '        <a href="#" class="btn btn-primary order-btn">สั่งซื้อ</a>';
                    echo '    </div>';
                    echo '</div>';
                } ?>
            </div>
            <div class="container-order col-md-4">
                <h4>รายการสั่งซื้อ</h4>
                <div class="row" >
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
                <?php foreach ($cart as $product) {
                    echo '<div class="row" >';
                    echo '    <div class="col">';
                    echo $product['name'];
                    echo '    </div>';
                    echo '    <div class="col">';
                    echo $product['quantity'];
                    echo '    </div>';
                    echo '    <div class="col">';
                    echo $product['price'];
                    echo '    </div>';
                    echo '</div>';
                } ?>
                <button type="button" class="btn btn-dark">สั่งซื้อ</button>
            </div>

        </div>
    </div>
</body>
<script>
</script>
</html>