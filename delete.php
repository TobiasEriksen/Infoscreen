<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$conn = mysqli_connect("localhost", "root", "", "infoscreendb");
$query = "SELECT p_id, p_date, p_item, p_qty, p_qty_type FROM purchaselist";

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
        $p_id = $row['p_id'];
        echo "<li>" . $row['p_item'] . " - " . $row['p_qty'] . " " . $row['p_qty_type'] . " <a href='delete.php?action=" . $p_id . "'>" . "X</a></li>";
    }
    echo "</ul>";
} else {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['action'])) {
    delete($p_id);
}

$conn->close();

function delete($p_id) {
    $con = mysqli_connect("localhost", "root", "", "infoscreendb");
// Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    mysqli_query($con, "DELETE FROM purchaselist WHERE p_id='$p_id'");
    mysqli_close($con);
    header("location:delete.php");
}