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
        $sql ="SELECT username, password,status,employee_id from employees where username = '$username' and password = '$password'";
        $query = $conn->prepare($sql);
        $query->execute();
        $result = $query->get_result();
        
        // For simplicity, let's check if the username is "demo" and password is "password"
        $row = $result->fetch_assoc();
        if ( $row['status'] == "employee") {
            // Redirect to a success page or perform other actions
            $_SESSION['username'] = $username;
            $_SESSION['status'] = $row['status'];
            $_SESSION['employee_id'] = $row['employee_id'];
            echo "Successfully logged";
            header("Location: employee/home.php");
            exit();
        }  elseif ($row['status'] == "owner") {
            // Redirect to a success page or perform other actions
            $_SESSION['username'] = $username;
            $_SESSION['status'] = $row['status'];
            $_SESSION['employee_id'] = $row['employee_id'];
            echo "Successfully logged";
            header("Location: owner/home.php");
            exit();
        }
        else {
            // Display an error message
            
            ?>
            <script type="text/javascript">
                alert("Invalid username or password.");
                window.location.href = "index.php";

            </script>
            <?php
        }
    } else {
        // Display an error message if username or password is not set
        $error_message = "Username and password are required.";
    }
}
?>

