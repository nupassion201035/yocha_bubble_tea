<?php
include("navbar_owner.php");
include("../connection.php");


$sql = "SELECT * FROM product";
$result = $conn->query($sql);

?>
<html lang="en">
<style>
    /* Full-width input fields */


    button:hover {
        opacity: 0.8;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    /* Center the image and position the close button */
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
    }

    img.img_product {
        width: 40%;
        border-radius: 50%;
    }

    .container_popup {
        padding: 16px 350px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 70%;
        /* Full width */
        height: 70%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 50%;

        /* Could be more or less, depending on screen size */
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 0%;
        }
    }
</style>

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
                <?php while ($row = $result->fetch_assoc()) {
                    echo '<div class="card" style="width: 200px;">';
                    echo '    <img src="../assets/img/product/' . $row['image'] . '" class="card-img-top" alt="...">';
                    echo '    <div class="card-body">';
                    echo '        <p class="card-text">' . $row['name'] . '</p>';
                    echo '        <a href="#" onclick="document.getElementById(\'popup\').style.display=\'block\'" class="btn btn-primary">สั่งซื้อ</a>';
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
    <div id="popup" class="modal">

        <form class="modal-content animate" action="action_page.php" method="post">
            <div class="container_popup">
                <label for="uname"><b>Size</b></label>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Sizeselection" value="S" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <p>Size S 30 บาท</p>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Sizeselection" value="M" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                <p>Size M 40 บาท</p>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Sizeselection" value="L" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                <p>Size L 50 บาท</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="../assets\img\product\นมสด.jpg" alt="img_product" class="img_product" style="width: 30%;">
                    </div>
                </div>
                <label for="uname"><b>Toppings</b></label>
                <div class="row">
                    <div class="col-md-4 form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <p>ไข่มุก</p>
                            <img src="../assets\img\product\ไข่มุก.jpg" alt="img_product" class="img_product" style="width: 25%; align-items: flex-start;">
                        </label>
                    </div>
                    <div class="col-md-4 form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            <p>บุก</p>
                            <img src="../assets\img\product\บุก.jpg" alt="img_product" class="img_product" style="width: 25%;">
                        </label>
                    </div>
                    <div class="col-md-4 form-check">
                        <input class="form-check-input" type="checkbox" value="fruity_jelly" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            <p>ฟรุตตี้สลัด</p>
                            <img src="../assets\img\product\ฟรุตตี้สลัด.jpg" alt="img_product" class="img_product" style="width: 25%;">
                        </label>
                    </div>
                </div>

                <button type="summit" class="btn btn-dark">สั่งซื้อ</button>
            </div>
        </form>
    </div>
</body>

<script>
    var popup = document.getElementById('popup');


    window.onclick = function(event) {
        if (event.target == popup) {
            popup.style.display = "none";
        }
    }
</script>

</html>