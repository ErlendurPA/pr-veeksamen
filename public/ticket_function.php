<?php

// Process register form

include '../db_connect.php';

// Validate user input and insert into database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bruker_id = $_SESSION['id'];
    $kategori = $_POST['kategori'];
    $problem = $_POST['problem'];

    $sql = "INSERT INTO ticket (bruker_id, kategori, beskrivelse) VALUES ('$bruker_id', '$kategori', '$beskrivelse')";

    if ($conn->query($sql) === TRUE) {
        header("Location: tracking.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
