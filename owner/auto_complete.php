<?php
// Establish database connection
include("../connection.php");
// Fetch suggestions from the database
if (isset($_GET['query'])) {
    $search_query = $_GET['query'];
    $sql = "SELECT * FROM `member` WHERE `telephone` LIKE '%$search_query%' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output suggestions
        while($row = $result->fetch_assoc()) {
            echo "<p> name :"  . $row['telephone'] ."</p>";
        }
    } else {
        echo "<p>ไม่พบที่เลือกไว้</p>";
    }
}

$conn->close();
?>
