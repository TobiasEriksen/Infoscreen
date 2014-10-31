<?php

/*
 * Prints list of purchases needed for today.
 */

function makelist() {
    $today = date("d-m-Y");
    $date1 = str_replace('-', '-', $today);
    $tomorrow = date('d-m-Y', strtotime($date1 . "+1 days"));
    $conn = mysqli_connect("localhost", "root", "", "infoscreendb");
    $query = "SELECT p_date, p_item, p_qty, p_qty_type FROM purchaselist WHERE p_date='$today' OR p_date='$tomorrow'";

    $result = mysqli_query($conn, $query) or die("Error");

    $ready;

    if (mysqli_connect_errno()) {
        $ready = false;
    } else {
        $ready = true;
    }

    if ($ready) {
        echo "<ul class='purchaselist'>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<li>" . $row['p_item'] . " - " . $row['p_qty'] . " " . $row['p_qty_type'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// echo '<li><a href="add.php">Add+</a></li>';

    $conn->close();
}

function add($p_date, $p_item, $p_qty, $p_qty_type) {
// Create connection
    $conn = mysqli_connect("localhost", "root", "", "infoscreendb");
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO purchaselist (p_date, p_item, p_qty, p_qty_type) VALUES ('$p_date', '$p_item', '$p_qty', '$p_qty_type')";

    if ($conn->query($sql) === TRUE) {
        echo "Stuff was inserted! :-)<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}