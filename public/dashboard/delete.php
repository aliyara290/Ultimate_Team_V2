<?php
include "../../src/php/database.php";

// Check if ID is provided
if (!isset($_GET['id'])) {
    header('location: /Ultimate_Team_V2/public/dashboard/tables.php');
    exit();
}

$id = $_GET['id'];

$sql1 = "DELETE FROM outfield_player_stats WHERE player_id = ?";
$stmt1 = mysqli_prepare($conn, $sql1);
mysqli_stmt_bind_param($stmt1, 'i', $id);
mysqli_stmt_execute($stmt1);

$sql2 = "DELETE FROM goalkeeper_stats WHERE player_id = ?";
$stmt2 = mysqli_prepare($conn, $sql2);
mysqli_stmt_bind_param($stmt2, 'i', $id);
mysqli_stmt_execute($stmt2);

$sql3 = "DELETE FROM player WHERE player_id = ?";
$stmt3 = mysqli_prepare($conn, $sql3);
mysqli_stmt_bind_param($stmt3, 'i', $id);

if (mysqli_stmt_execute($stmt3)) {
    header('location: /Ultimate_Team_V2/public/dashboard/tables.php');
    exit();
} else {
    echo "Failed to delete player.";
    exit();
}

$conn->close();
