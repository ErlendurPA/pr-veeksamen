<?php
if (!isset($_SESSION)) {
    session_start();
}
// Process register form

include '../db_connect.php';

// Validate user input and insert into database

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id'])) {
    $bruker_id = $_SESSION['id'];

    $sql2 = "SELECT rolle FROM bruker WHERE id='$bruker_id'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $rolle = $row2['rolle'];

    if ($rolle == 2) {
        if (isset($_POST['ticket_id'], $_POST['status'])) {
            $ticket_id = $_POST['ticket_id'];
            $status = $_POST['status'];
            $svar = $_POST['answer'];

            // Update ticket status
            $sql_update = "UPDATE ticket SET status='$status', svar='$svar' WHERE id='$ticket_id'";
            if (mysqli_query($conn, $sql_update)) {
                echo "Ticket status updated successfully";
                header("Location: tracking.php");
            } else {
                echo "Error updating ticket status: " . mysqli_error($conn);
            }
        }
    }
}

$conn->close();
