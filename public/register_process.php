<?php

// Process register form

include '../db_connect.php';

// Validate user input and insert into database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $passord = password_hash($_POST['passord'], PASSWORD_DEFAULT);
    $epost = $_POST['epost'];


    if (empty($fornavn)) {
        header("Location: register.php?error=Username is required!");
        exit();
    } else if (empty($etternavn)) {
        header("Location: register.php?error=Username is required!");
        exit();
    } else if (empty($passord)) {
        header("Location: register.php?error=Password is required!");
        exit();
    } else if (empty($epost)) {
        header("Location: register.php?error=Epost is required!");
        exit();
    }

    $sql = "INSERT INTO bruker (fornavn, etternavn, passord, epost, rolle) VALUES ('$fornavn', '$etternavn', '$passord', '$epost', '1')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
