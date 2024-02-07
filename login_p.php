<?php
session_start();
include ("connection.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username and password are set
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        echo $username;
        echo $password;
        // Here you can perform the login authentication, e.g., checking against a database
        $sql ="SELECT username, password,status from employees where username = '$username' and password = '$password'";
        $query = $conn->prepare($sql);
        $query->execute();
        $result = $query->get_result();
        
        // For simplicity, let's check if the username is "demo" and password is "password"
        $row = $result->fetch_assoc();
        if ( $row['status'] == "employee") {
            // Redirect to a success page or perform other actions
            $_SESSION['username'] = $username;
            $_SESSION['status'] = $row['status'];
            echo "Successfully logged";
            header("Location: employee/home.php");
            exit();
        }  elseif ($row['status'] == "owner") {
            // Redirect to a success page or perform other actions
            $_SESSION['username'] = $username;
            $_SESSION['status'] = $row['status'];
            echo "Successfully logged";
            header("Location: owner/home.php");
            exit();
        }
        else {
            // Display an error message
            $error_message = "Invalid username or password.";
        }
    } else {
        // Display an error message if username or password is not set
        $error_message = "Username and password are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Error</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                <?php echo isset($error_message) ? $error_message : "An error occurred."; ?>
            </div>
            <a href="index.php" class="btn btn-primary">Back to Login</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>