<?php
if (!isset($_SESSION)) {
    session_start();
}
// Process register form

include '../db_connect.php';

// Validate user input and insert into database

if (isset($_SESSION['id'])) {
    $bruker_id = $_SESSION['id'];
    $kategori = $_POST['kategori'];
    $problem = $_POST['problem'];

    $sql = "INSERT INTO ticket (bruker_id, kategori, beskrivelse, status) VALUES ('$bruker_id', '$kategori', '$problem', 'aktiv')";
    $stmt = $conn->prepare($sql);

    echo $sql;

    if ($stmt->execute()) {
        header("Location: tracking.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
